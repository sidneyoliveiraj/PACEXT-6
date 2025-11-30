<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buscar categorias de serviços
        $faciais = Category::where('slug', 'tratamentos-faciais')->first();
        $corporais = Category::where('slug', 'tratamentos-corporais')->first();
        $avancada = Category::where('slug', 'estetica-avancada')->first();
        $massagens = Category::where('slug', 'massagens')->first();

        $services = [
            // Tratamentos Faciais
            [
                'name' => 'Limpeza de Pele Profunda',
                'slug' => 'limpeza-de-pele-profunda',
                'description' => 'Limpeza profunda que remove impurezas, cravos e células mortas. O tratamento inclui: análise de pele, higienização, esfoliação, extração de comedões, tonificação, máscara específica para o tipo de pele e hidratação final. Ideal para todos os tipos de pele.',
                'short_description' => 'Remove impurezas e renova a pele',
                'price' => 120.00,
                'duration' => 60,
                'is_featured' => true,
                'is_active' => true,
                'category_id' => $faciais->id,
            ],
            [
                'name' => 'Peeling Químico',
                'slug' => 'peeling-quimico',
                'description' => 'Renovação celular através de ácidos específicos escolhidos de acordo com seu tipo de pele. Indicado para tratamento de manchas, acne, cicatrizes e rejuvenescimento. Requer avaliação prévia e pode necessitar de várias sessões para resultados ótimos.',
                'short_description' => 'Renovação profunda da pele',
                'price' => 200.00,
                'duration' => 45,
                'is_featured' => true,
                'is_active' => true,
                'category_id' => $faciais->id,
            ],
            [
                'name' => 'Hidratação Profunda',
                'slug' => 'hidratacao-profunda',
                'description' => 'Tratamento intensivo de hidratação com ativos de alta performance como ácido hialurônico, vitaminas e ceramidas. Ideal para peles desidratadas, sensíveis ou danificadas pelo sol. Proporciona maciez, luminosidade e recuperação da barreira cutânea.',
                'short_description' => 'Hidratação intensa e duradoura',
                'price' => 180.00,
                'duration' => 75,
                'is_featured' => true,
                'is_active' => true,
                'category_id' => $faciais->id,
            ],
            [
                'name' => 'Microagulhamento',
                'slug' => 'microagulhamento',
                'description' => 'Técnica que estimula a produção de colágeno através de microlesões controladas. Indicado para tratamento de cicatrizes de acne, estrias, rugas e flacidez. Proporciona rejuvenescimento natural e melhora significativa na textura da pele.',
                'short_description' => 'Estimula colágeno e rejuvenesce',
                'price' => 350.00,
                'duration' => 90,
                'is_featured' => false,
                'is_active' => true,
                'category_id' => $faciais->id,
            ],

            // Estética Avançada
            [
                'name' => 'Aplicação de Botox',
                'slug' => 'aplicacao-de-botox',
                'description' => 'Aplicação de toxina botulínica para redução de rugas e linhas de expressão. Realizada por médico especialista, proporciona resultados naturais e duradouros. Principais áreas: testa, glabela (entre sobrancelhas) e pés de galinha.',
                'short_description' => 'Reduz rugas e linhas de expressão',
                'price' => 800.00,
                'duration' => 30,
                'is_featured' => true,
                'is_active' => true,
                'category_id' => $avancada->id,
            ],
            [
                'name' => 'Preenchimento com Ácido Hialurônico',
                'slug' => 'preenchimento-acido-hialuronico',
                'description' => 'Preenchimento facial com ácido hialurônico para restaurar volume perdido, suavizar rugas profundas e realçar contornos faciais. Resultados imediatos e naturais. Áreas: sulco nasogeniano, lábios, maçãs do rosto, queixo.',
                'short_description' => 'Restaura volume e suaviza rugas',
                'price' => 1200.00,
                'duration' => 45,
                'is_featured' => false,
                'is_active' => true,
                'category_id' => $avancada->id,
            ],
            [
                'name' => 'Harmonização Facial',
                'slug' => 'harmonizacao-facial',
                'description' => 'Conjunto de procedimentos estéticos que visam equilibrar as proporções faciais e realçar a beleza natural. Pode incluir preenchimentos, bioestimuladores e toxina botulínica. Avaliação médica completa e plano personalizado.',
                'short_description' => 'Equilíbrio e harmonia facial',
                'price' => 2500.00,
                'duration' => 120,
                'is_featured' => false,
                'is_active' => true,
                'category_id' => $avancada->id,
            ],

            // Tratamentos Corporais
            [
                'name' => 'Drenagem Linfática',
                'slug' => 'drenagem-linfatica',
                'description' => 'Massagem terapêutica que estimula o sistema linfático, promovendo a eliminação de toxinas e líquidos retidos. Reduz inchaços, celulite e proporciona sensação de bem-estar. Indicada no pós-operatório e para retenção de líquidos.',
                'short_description' => 'Reduz inchaço e toxinas',
                'price' => 150.00,
                'duration' => 90,
                'is_featured' => true,
                'is_active' => true,
                'category_id' => $corporais->id,
            ],
            [
                'name' => 'Massagem Modeladora',
                'slug' => 'massagem-modeladora',
                'description' => 'Massagem vigorosa que auxilia na redução de medidas e gordura localizada. Melhora a circulação, combate a celulite e proporciona contorno corporal. Pode ser combinada com outros tratamentos para melhores resultados.',
                'short_description' => 'Reduz medidas e celulite',
                'price' => 140.00,
                'duration' => 60,
                'is_featured' => false,
                'is_active' => true,
                'category_id' => $corporais->id,
            ],

            // Massagens
            [
                'name' => 'Massagem Facial Relaxante',
                'slug' => 'massagem-facial-relaxante',
                'description' => 'Massagem suave e relaxante que estimula a circulação sanguínea, alivia tensões musculares e promove o rejuvenescimento natural da pele. Proporciona relaxamento profundo e melhora na oxigenação celular.',
                'short_description' => 'Relaxamento e rejuvenescimento',
                'price' => 90.00,
                'duration' => 45,
                'is_featured' => true,
                'is_active' => true,
                'category_id' => $massagens->id,
            ],
            [
                'name' => 'Massagem Relaxante Corporal',
                'slug' => 'massagem-relaxante-corporal',
                'description' => 'Massagem completa que proporciona relaxamento profundo, alivia dores musculares e reduz o estresse. Movimentos suaves e ritmados que promovem bem-estar físico e mental. Ideal para quem busca momento de autocuidado.',
                'short_description' => 'Relaxamento completo do corpo',
                'price' => 180.00,
                'duration' => 90,
                'is_featured' => false,
                'is_active' => true,
                'category_id' => $massagens->id,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        $this->command->info('Serviços criados com sucesso!');
    }
}