🔵 ETAPA 4 — API REST PROFISSIONAL

Agora vamos transformar sua modelagem em endpoints reais.

🎯 Objetivo desta etapa

Construir:

GET /api/products

GET /api/products/{id}

Filtro por marca

Paginação

Estrutura de resposta organizada

Controller limpo

Código com padrão profissional

🟢 PASSO 1 — Criar ProductController (API) ✅

No terminal:

php artisan make:controller Api/ProductController

Isso cria:

app/Http/Controllers/Api/ProductController.php

🟢 PASSO 2 — Criar Rotas ✅

Abra:

routes/api.php

Adicione:

use App\Http\Controllers\Api\ProductController;

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);

🟢 PASSO 3 — Implementar index() ✅

Dentro de ProductController:

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Filtro por marca
        if ($request->has('brand')) {
            $query->where('brand', $request->brand);
        }

        $products = $query->paginate(10);

        return response()->json($products);
    }

    public function show($id)
    {
        $product = Product::with('sizes')->findOrFail($id);

        return response()->json($product);
    }
}

🟢 PASSO 4 — Testar no Postman ✅

Inicie o servidor:

php artisan serve

Depois teste:

Listar produtos
GET http://127.0.0.1:8000/api/products
Filtrar por marca
GET http://127.0.0.1:8000/api/products?brand=Nike
Buscar por ID
GET http://127.0.0.1:8000/api/products/1

🧠 O que isso já demonstra para recrutador

✔ Você sabe estruturar API REST
✔ Você usa paginação
✔ Você aplica filtros dinâmicos
✔ Você usa eager loading
✔ Você organiza controllers
✔ Você separa API routes

Isso já começa a te diferenciar.

🔥 Próxima decisão estratégica

Depois disso, temos dois caminhos:

Criar endpoints de criação de pedidos

Implementar autenticação (Sanctum + JWT style)

Minha recomendação profissional?

👉 Primeiro finalizar toda API pública de produtos.

Depois implementar autenticação.

Agora execute:

Criar controller

Criar rotas

Implementar index()

Testar no Postman

Me manda o resultado do GET /api/products.
