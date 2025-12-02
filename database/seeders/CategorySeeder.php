<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            // Categorias de Produtos
            [
                'name' => 'Limpeza Facial',
                'slug' => 'limpeza-facial',
                'description' => 'Produtos para limpeza profunda da pele',
                'is_active' => true,
            ],
            [
                'name' => 'Hidratação',
                'slug' => 'hidratacao',
                'description' => 'Produtos hidratantes para todos os tipos de pele',
                'is_active' => true,
            ],
            [
                'name' => 'Anti-Idade',
                'slug' => 'anti-idade',
                'description' => 'Tratamento antienvelhecimento e rejuvenescimento',
                'is_active' => true,
            ],
            [
                'name' => 'Proteção Solar',
                'slug' => 'protecao-solar',
                'description' => 'Protetores solares de alta qualidade',
                'is_active' => true,
            ],
            [
                'name' => 'Esfoliação',
                'slug' => 'esfoliacao',
                'description' => 'Esfoliantes e peelings suaves',
                'is_active' => true,
            ],
            
            // Categorias de Serviços
            [
                'name' => 'Tratamentos Faciais',
                'slug' => 'tratamentos-faciais',
                'description' => 'Tratamentos profissionais para o rosto',
                'is_active' => true,
            ],
            [
                'name' => 'Tratamentos Corporais',
                'slug' => 'tratamentos-corporais',
                'description' => 'Tratamentos estéticos para o corpo',
                'is_active' => true,
            ],
            [
                'name' => 'Estética Avançada',
                'slug' => 'estetica-avancada',
                'description' => 'Procedimentos estéticos avançados',
                'is_active' => true,
            ],
            [
                'name' => 'Massagens',
                'slug' => 'massagens',
                'description' => 'Massagens terapêuticas e relaxantes',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        $this->command->info('Categorias criadas com sucesso!');
    }
}