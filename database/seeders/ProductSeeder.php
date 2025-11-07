<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buscar categorias
        $limpeza = Category::where('slug', 'limpeza-facial')->first();
        $hidratacao = Category::where('slug', 'hidratacao')->first();
        $antiIdade = Category::where('slug', 'anti-idade')->first();
        $protecao = Category::where('slug', 'protecao-solar')->first();
        $esfoliacao = Category::where('slug', 'esfoliacao')->first();

        $products = [
            // Produtos de Limpeza
            [
                'name' => 'Gel de Limpeza Facial',
                'slug' => 'gel-de-limpeza-facial',
                'description' => 'Gel de limpeza suave e eficaz que remove impurezas sem ressecar a pele. Formulado com ingredientes naturais para uma limpeza profunda e delicada.',
                'short_description' => 'Limpeza profunda sem ressecar',
                'price' => 79.90,
                'sale_price' => 67.90,
                'sku' => 'LIMP-001',
                'quantity' => 50,
                'is_featured' => true,
                'is_active' => true,
                'category_id' => $limpeza->id,
            ],
            [
                'name' => 'Espuma de Limpeza Facial',
                'slug' => 'espuma-de-limpeza-facial',
                'description' => 'Espuma cremosa que proporciona limpeza profunda e suave. Remove maquiagem e impurezas mantendo a hidratação natural da pele.',
                'short_description' => 'Limpeza suave com espuma cremosa',
                'price' => 69.90,
                'sale_price' => null,
                'sku' => 'LIMP-002',
                'quantity' => 35,
                'is_featured' => false,
                'is_active' => true,
                'category_id' => $limpeza->id,
            ],

            // Produtos de Hidratação
            [
                'name' => 'Creme Hidratante Facial',
                'slug' => 'creme-hidratante-facial',
                'description' => 'Creme hidratante de textura leve que proporciona 24 horas de hidratação. Enriquecido com ácido hialurônico e vitamina E para pele macia e nutrida.',
                'short_description' => 'Hidratação intensa 24h',
                'price' => 89.90,
                'sale_price' => null,
                'sku' => 'HIDR-001',
                'quantity' => 60,
                'is_featured' => true,
                'is_active' => true,
                'category_id' => $hidratacao->id,
            ],
            [
                'name' => 'Sérum Hidratante',
                'slug' => 'serum-hidratante',
                'description' => 'Sérum ultra hidratante com ácido hialurônico de baixo peso molecular. Penetra profundamente na pele proporcionando hidratação intensa e duradoura.',
                'short_description' => 'Hidratação profunda com ácido hialurônico',
                'price' => 129.90,
                'sale_price' => 109.90,
                'sku' => 'HIDR-002',
                'quantity' => 40,
                'is_featured' => true,
                'is_active' => true,
                'category_id' => $hidratacao->id,
            ],

            // Produtos Anti-Idade
            [
                'name' => 'Sérum Anti-Idade Vitamina C',
                'slug' => 'serum-anti-idade-vitamina-c',
                'description' => 'Sérum potente com vitamina C estabilizada que combate os sinais do envelhecimento. Uniformiza o tom da pele, reduz manchas e promove luminosidade.',
                'short_description' => 'Combate sinais de envelhecimento',
                'price' => 149.90,
                'sale_price' => null,
                'sku' => 'ANTI-001',
                'quantity' => 45,
                'is_featured' => true,
                'is_active' => true,
                'category_id' => $antiIdade->id,
            ],
            [
                'name' => 'Creme Noturno Anti-Idade',
                'slug' => 'creme-noturno-anti-idade',
                'description' => 'Creme noturno enriquecido com retinol e peptídeos que trabalham durante o sono para renovar e rejuvenescer a pele.',
                'short_description' => 'Renovação celular noturna',
                'price' => 109.90,
                'sale_price' => null,
                'sku' => 'ANTI-002',
                'quantity' => 30,
                'is_featured' => false,
                'is_active' => true,
                'category_id' => $antiIdade->id,
            ],
            [
                'name' => 'Creme para Olhos',
                'slug' => 'creme-para-olhos',
                'description' => 'Creme específico para a região dos olhos que reduz olheiras, linhas finas e bolsas. Fórmula suave e eficaz.',
                'short_description' => 'Reduz olheiras e linhas finas',
                'price' => 79.90,
                'sale_price' => null,
                'sku' => 'ANTI-003',
                'quantity' => 55,
                'is_featured' => true,
                'is_active' => true,
                'category_id' => $antiIdade->id,
            ],

            // Proteção Solar
            [
                'name' => 'Protetor Solar FPS 60',
                'slug' => 'protetor-solar-fps-60',
                'description' => 'Protetor solar de alta proteção contra raios UVA e UVB. Textura leve e não oleosa, ideal para uso diário.',
                'short_description' => 'Proteção UVA/UVB FPS 60',
                'price' => 69.90,
                'sale_price' => null,
                'sku' => 'PROT-001',
                'quantity' => 70,
                'is_featured' => true,
                'is_active' => true,
                'category_id' => $protecao->id,
            ],
            [
                'name' => 'Protetor Solar com Cor FPS 50',
                'slug' => 'protetor-solar-com-cor-fps-50',
                'description' => 'Protetor solar com cor que unifica o tom da pele enquanto protege. Acabamento natural e duradouro.',
                'short_description' => 'Proteção com cobertura natural',
                'price' => 84.90,
                'sale_price' => 74.90,
                'sku' => 'PROT-002',
                'quantity' => 38,
                'is_featured' => false,
                'is_active' => true,
                'category_id' => $protecao->id,
            ],

            // Esfoliação
            [
                'name' => 'Esfoliante Facial Suave',
                'slug' => 'esfoliante-facial-suave',
                'description' => 'Esfoliante com micropartículas suaves que remove células mortas sem agredir a pele. Deixa a pele renovada e luminosa.',
                'short_description' => 'Renovação celular suave',
                'price' => 54.90,
                'sale_price' => 43.90,
                'sku' => 'ESFO-001',
                'quantity' => 42,
                'is_featured' => false,
                'is_active' => true,
                'category_id' => $esfoliacao->id,
            ],
            [
                'name' => 'Máscara Facial Detox',
                'slug' => 'mascara-facial-detox',
                'description' => 'Máscara de argila que purifica e desintoxica a pele. Remove impurezas dos poros e controla a oleosidade.',
                'short_description' => 'Purificação profunda com argila',
                'price' => 59.90,
                'sale_price' => null,
                'sku' => 'ESFO-002',
                'quantity' => 48,
                'is_featured' => true,
                'is_active' => true,
                'category_id' => $esfoliacao->id,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }

        $this->command->info('Produtos criados com sucesso!');
    }
}