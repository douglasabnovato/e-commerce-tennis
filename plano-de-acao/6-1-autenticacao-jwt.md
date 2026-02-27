🔵 ETAPA 6 — AUTENTICAÇÃO JWT

Objetivo:

Usuário se registrar

Usuário fazer login

Receber token

Proteger rotas com esse token

Sem token → acesso negado.

✅ PASSO 1 — Instalar JWT

No terminal:

composer require tymon/jwt-auth

Se der erro, me manda o erro.

✅ PASSO 2 — Publicar Configuração

Depois da instalação:

php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"

Isso cria:

config/jwt.php
✅ PASSO 3 — Gerar Secret Key

Agora:

php artisan jwt:secret

Isso vai adicionar no seu .env algo assim:

JWT_SECRET=alguma_chave_grande_aqui

Se não gerar, me fala.

✅ PASSO 4 — Configurar Model User

Abra:

app/Models/User.php

Implemente a interface:

use Tymon\JWTAuth\Contracts\JWTSubject;

E altere a classe:

class User extends Authenticatable implements JWTSubject

Agora adicione estes métodos dentro da classe:

public function getJWTIdentifier()
{
    return $this->getKey();
}

public function getJWTCustomClaims()
{
    return [];
}

Sem isso não funciona.

✅ PASSO 5 — Ajustar Auth Guard

Abra:

config/auth.php

No guard api, altere para:

'guards' => [
    'api' => [
        'driver' => 'jwt',
        'provider' => 'users',
    ],
],
✅ PASSO 6 — Criar AuthController

No terminal:

php artisan make:controller Api/AuthController

Abra:

app/Http/Controllers/Api/AuthController.php

Coloque:

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'user' => $user,
            'token' => $token
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json([
                'error' => 'Credenciais inválidas'
            ], 401);
        }

        return response()->json([
            'token' => $token
        ]);
    }
}
✅ PASSO 7 — Criar Rotas

Abra:

routes/api.php

Adicione:

use App\Http\Controllers\Api\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
✅ PASSO 8 — Proteger Rotas

Exemplo: proteger pedidos.

No api.php:

Route::middleware('auth:api')->group(function () {
    Route::post('/orders', [OrderController::class, 'store']);
});

Sem token → 401.

✅ PASSO 9 — Testar no Postman
1️⃣ Registrar

POST

http://127.0.0.1:8000/api/register

Body (JSON):

{
  "name": "Douglas",
  "email": "douglas@email.com",
  "password": "123456"
}

Você deve receber:

token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9...
2️⃣ Login

POST

/api/login
3️⃣ Testar rota protegida

Header:

Authorization: Bearer SEU_TOKEN_AQUI

Se funcionar → está seguro.

🎯 Resultado da Etapa 6

Você terá:

✔ API com autenticação stateless
✔ Token JWT
✔ Rotas protegidas
✔ Base pronta para carrinho e pedidos

Confirma:

Instalou o pacote?

Gerou jwt:secret?

Ajustou auth.php?

Me fala onde você está que eu te conduzo até fechar essa etapa.
