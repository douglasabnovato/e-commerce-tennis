🔵 ETAPA 4 — SEEDERS (EXECUÇÃO GUIADA)

✅ PASSO 1 — Criar os Seeders ✅

No terminal:

php artisan make:seeder ProductSeeder
php artisan make:seeder ProductSizeSeeder

Se aparecer created successfully, seguimos.

✅ PASSO 2 — Implementar ProductSeeder ✅

Abra:

database/seeders/ProductSeeder.php

Substitua o método run() por isso:

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::insert([
            [
                'name' => 'Tatum 3',
                'brand' => 'Jordan',
                'category' => 'Performance / Pro',
                'price' => 1299.90,
                'stock' => 20,
                'technology' => 'Zoom Air',
                'usage_type' => 'Quadra',
                'release_year' => 2024,
                'sku' => 'JORDAN-TATUM3-001',
                'description' => 'Amortecimento Zoom Air, leveza extrema.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Giannis Immortality 4',
                'brand' => 'Nike',
                'category' => 'Performance / Entrada',
                'price' => 649.90,
                'stock' => 25,
                'technology' => 'Tração Multidirecional',
                'usage_type' => 'Quadra',
                'release_year' => 2024,
                'sku' => 'NIKE-GIANNIS4-001',
                'description' => 'Ótima tração para cortes rápidos.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'MB.04 (LaMelo Ball)',
                'brand' => 'Puma',
                'category' => 'Estilo / Performance',
                'price' => 1100.00,
                'stock' => 15,
                'technology' => 'Espuma Nitro',
                'usage_type' => 'Lifestyle',
                'release_year' => 2024,
                'sku' => 'PUMA-MB04-001',
                'description' => 'Design disruptivo com espuma Nitro.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nike Street Flare',
                'brand' => 'Nike',
                'category' => 'Outdoor / Resistência',
                'price' => 549.90,
                'stock' => 18,
                'technology' => 'Solado Reforçado',
                'usage_type' => 'Outdoor',
                'release_year' => 2023,
                'sku' => 'NIKE-STREET-001',
                'description' => 'Solado de borracha extra rígida.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'LeBron 21',
                'brand' => 'Nike',
                'category' => 'Performance / Premium',
                'price' => 1499.90,
                'stock' => 12,
                'technology' => 'Máximo Amortecimento',
                'usage_type' => 'Quadra',
                'release_year' => 2024,
                'sku' => 'NIKE-LEBRON21-001',
                'description' => 'Estabilidade e amortecimento premium.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nike Precision 7',
                'brand' => 'Nike',
                'category' => 'Custo-benefício',
                'price' => 499.90,
                'stock' => 30,
                'technology' => 'Responsivo',
                'usage_type' => 'Quadra',
                'release_year' => 2023,
                'sku' => 'NIKE-PREC7-001',
                'description' => 'Minimalista e focado em quadra.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Adidas Own The Game',
                'brand' => 'Adidas',
                'category' => 'Iniciante / Conforto',
                'price' => 399.90,
                'stock' => 40,
                'technology' => 'Cloudfoam',
                'usage_type' => 'Quadra',
                'release_year' => 2023,
                'sku' => 'ADIDAS-OTG-001',
                'description' => 'Conforto com Cloudfoam.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Asics Upcourt 6',
                'brand' => 'Asics',
                'category' => 'Multiquadra',
                'price' => 349.90,
                'stock' => 35,
                'technology' => 'Estabilidade Lateral',
                'usage_type' => 'Multiquadra',
                'release_year' => 2023,
                'sku' => 'ASICS-UP6-001',
                'description' => 'Excelente estabilidade lateral.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Olympikus Quadra BR 1',
                'brand' => 'Olympikus',
                'category' => 'Nacional / Resistente',
                'price' => 299.90,
                'stock' => 50,
                'technology' => 'Alta Durabilidade',
                'usage_type' => 'Cimento',
                'release_year' => 2023,
                'sku' => 'OLYMPIKUS-BR1-001',
                'description' => 'Focado em quadras de cimento.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nike GT Cut Academy 3',
                'brand' => 'Nike',
                'category' => 'Agilidade / Corte',
                'price' => 899.90,
                'stock' => 22,
                'technology' => 'Perfil Baixo',
                'usage_type' => 'Quadra',
                'release_year' => 2024,
                'sku' => 'NIKE-GTCUT3-001',
                'description' => 'Trocas rápidas de direção.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

✅ PASSO 3 — Registrar no DatabaseSeeder ✅

Abra:

database/seeders/DatabaseSeeder.php

Adicione dentro do run():

$this->call([
    ProductSeeder::class,
]);

✅ PASSO 4 — Rodar Tudo Limpo ✅

No terminal:

php artisan migrate:fresh --seed

Isso:

Apaga banco

Recria tabelas

Insere os 10 produtos

✅ PASSO 5 — Verificar

Entre no Tinker:

php artisan tinker

Digite:

App\Models\Product::count();

Se retornar:

10

Estamos prontos.

Depois disso, vamos:

Criar o ProductSizeSeeder

Implementar paginação + filtros na API

Testar no Postman

Confirma quando rodar o migrate:fresh --seed.
