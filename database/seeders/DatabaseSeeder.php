<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->command->info('🌱 Iniciando seeders...');
        $this->command->newLine();

        // Ordem de execução é importante devido aos relacionamentos
        $this->call([
            //UserSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            ServiceSeeder::class,
        ]);

        $this->command->newLine();
        $this->command->info('✅ Todos os seeders foram executados com sucesso!');
        $this->command->newLine();
        
        // Mostrar informações úteis
        $this->command->info('📝 Credenciais de acesso:');
        $this->command->info('   Admin: admin@clinica.com | Senha: password123');
        $this->command->info('   Cliente: maria@example.com | Senha: password123');
        $this->command->newLine();
        
        $this->command->info('🔗 Acesse: http://localhost:8000');
    }
}