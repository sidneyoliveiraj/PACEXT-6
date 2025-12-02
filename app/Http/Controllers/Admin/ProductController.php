<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index(Request $request)
    {
        $query = Product::with('category');

        // Filtro por busca
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('sku', 'like', "%{$search}%");
            });
        }

        // Filtro por categoria
        if ($request->has('category_id') && $request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        // Filtro por status
        if ($request->has('status')) {
            if ($request->status === 'active') {
                $query->where('is_active', true);
            } elseif ($request->status === 'inactive') {
                $query->where('is_active', false);
            } elseif ($request->status === 'low_stock') {
                $query->where('quantity', '<', 10);
            }
        }

        // Ordenação
        $query->orderBy('created_at', 'desc');

        $products = $query->paginate(15);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        $categories = Category::where('is_active', true)->get();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'sku' => 'required|string|unique:products,sku',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lt:price',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'thumbnail' => 'required|image|max:2048',
            'images.*' => 'nullable|image|max:2048',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
        ]);

        // Gerar slug
        $validated['slug'] = Str::slug($validated['name']);

        // Upload da imagem principal
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('products', 'public');
        }

        // Criar produto
        $product = Product::create($validated);

        // Upload de galeria de imagens
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('products/gallery', 'public');
                $product->images()->create([
                    'image_path' => $path,
                    'sort_order' => $index + 1
                ]);
            }
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produto criado com sucesso!');
    }

    /**
     * Display the specified product.
     */
    public function show(Product $product)
    {
        $product->load('category', 'images', 'reviews');
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        $categories = Category::where('is_active', true)->get();
        $product->load('images');
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'sku' => 'required|string|unique:products,sku,' . $product->id,
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lt:price',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'thumbnail' => 'nullable|image|max:2048',
            'images.*' => 'nullable|image|max:2048',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
        ]);

        // Atualizar slug se o nome mudou
        if ($validated['name'] !== $product->name) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Upload nova imagem principal
        if ($request->hasFile('thumbnail')) {
            // Deletar imagem antiga
            if ($product->thumbnail) {
                Storage::disk('public')->delete($product->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('products', 'public');
        }

        // Atualizar produto
        $product->update($validated);

        // Upload de novas imagens da galeria
        if ($request->hasFile('images')) {
            $currentCount = $product->images()->count();
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('products/gallery', 'public');
                $product->images()->create([
                    'image_path' => $path,
                    'sort_order' => $currentCount + $index + 1
                ]);
            }
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        // Verificar se o produto tem pedidos
        if ($product->orderItems()->exists()) {
            return redirect()
                ->route('admin.products.index')
                ->with('error', 'Não é possível excluir um produto que possui pedidos associados.');
        }

        // Deletar imagem principal
        if ($product->thumbnail) {
            Storage::disk('public')->delete($product->thumbnail);
        }

        // Deletar imagens da galeria
        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        // Deletar produto
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produto excluído com sucesso!');
    }

    /**
     * Remove image from product gallery.
     */
    public function deleteImage($productId, $imageId)
    {
        $product = Product::findOrFail($productId);
        $image = $product->images()->findOrFail($imageId);

        // Deletar arquivo
        Storage::disk('public')->delete($image->image_path);

        // Deletar registro
        $image->delete();

        return response()->json([
            'success' => true,
            'message' => 'Imagem removida com sucesso!'
        ]);
    }

    /**
     * Toggle product active status.
     */
    public function toggleStatus(Product $product)
    {
        $product->update([
            'is_active' => !$product->is_active
        ]);

        $status = $product->is_active ? 'ativado' : 'desativado';

        return redirect()
            ->route('admin.products.index')
            ->with('success', "Produto {$status} com sucesso!");
    }

    /**
     * Bulk actions for products.
     */
    public function bulkAction(Request $request)
    {
        $validated = $request->validate([
            'action' => 'required|in:activate,deactivate,delete',
            'product_ids' => 'required|array',
            'product_ids.*' => 'exists:products,id'
        ]);

        $products = Product::whereIn('id', $validated['product_ids']);

        switch ($validated['action']) {
            case 'activate':
                $products->update(['is_active' => true]);
                $message = 'Produtos ativados com sucesso!';
                break;

            case 'deactivate':
                $products->update(['is_active' => false]);
                $message = 'Produtos desativados com sucesso!';
                break;

            case 'delete':
                // Verificar se algum produto tem pedidos
                $hasOrders = $products->whereHas('orderItems')->exists();
                
                if ($hasOrders) {
                    return redirect()
                        ->route('admin.products.index')
                        ->with('error', 'Alguns produtos não podem ser excluídos pois possuem pedidos associados.');
                }

                foreach ($products->get() as $product) {
                    // Deletar imagens
                    if ($product->thumbnail) {
                        Storage::disk('public')->delete($product->thumbnail);
                    }
                    foreach ($product->images as $image) {
                        Storage::disk('public')->delete($image->image_path);
                        $image->delete();
                    }
                    $product->delete();
                }
                $message = 'Produtos excluídos com sucesso!';
                break;
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', $message);
    }

    /**
     * Update product stock.
     */
    public function updateStock(Request $request, Product $product)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:0',
            'operation' => 'required|in:add,subtract,set'
        ]);

        switch ($validated['operation']) {
            case 'add':
                $product->increment('quantity', $validated['quantity']);
                break;

            case 'subtract':
                $product->decrement('quantity', $validated['quantity']);
                break;

            case 'set':
                $product->update(['quantity' => $validated['quantity']]);
                break;
        }

        return response()->json([
            'success' => true,
            'message' => 'Estoque atualizado com sucesso!',
            'new_quantity' => $product->quantity
        ]);
    }
}