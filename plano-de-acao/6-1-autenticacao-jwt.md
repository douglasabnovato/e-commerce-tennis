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

🛠️ SOLUÇÃO DEFINITIVA (CORRETA)

Vamos resolver do jeito profissional.

✅ PASSO 1 — Baixar arquivo de certificados ✅

Baixe o arquivo oficial da Mozilla:

👉 https://curl.se/ca/cacert.pem

Salve como:

cacert.pem

Agora coloque dentro da pasta:

C:\xampp\php\

✅ PASSO 2 — Configurar php.ini ✅

Abra:

C:\xampp\php\php.ini

Procure por:

⚠ Remova o ; se tiver.

;curl.cainfo=

E altere para:

de
curl.cainfo="\xampp\apache\bin\curl-ca-bundle.crt"
para
curl.cainfo = "C:\xampp\php\cacert.pem"

Depois procure por:

;openssl.cafile=

E altere para:

de
openssl.cafile="\xampp\apache\bin\curl-ca-bundle.crt"
para
openssl.cafile = "C:\xampp\php\cacert.pem"

✅ PASSO 3 — Reiniciar Apache ✅

No XAMPP:

Stop Apache

Start Apache

✅ PASSO 4 — Testar ✅

No Git Bash:

composer clear-cache

Depois:

composer require tymon/jwt-auth

⚠️ NÃO FAÇA ISSO

Alguns tutoriais mandam rodar:

composer config -g secure-http false

ou desativar SSL.

Isso é gambiarra.
Não faça.

🎯 O que está acontecendo aqui é ótimo

Você está saindo do nível “dev que só copia código”
e entrando no nível:

👉 Dev que resolve ambiente
👉 Dev que entende infraestrutura
👉 Dev que sabe depurar erro real

Isso é evolução.

Agora me responde:

Você está usando XAMPP mesmo?
Confirma o caminho do seu PHP para eu garantir que estamos editando o php.ini correto.

concluida a correção de 🛠️ SOLUÇÃO DEFINITIVA (CORRETA)

🔴 ✅ REINSTALAR O COMPOSER (Windows + XAMPP)
✅ PASSO A PASSO — 
 1️⃣ Remover versão atual

Pressione Win + R

Digite:

appwiz.cpl

Desinstale Composer

Se não aparecer, delete manualmente:

C:\ProgramData\ComposerSetup

🟢 2️⃣ Baixar versão oficial

Baixe do site oficial:

👉 https://getcomposer.org/Composer-Setup.exe

(Não baixe de outro lugar.)

🟢 3️⃣ Durante a instalação

Quando o instalador pedir o caminho do PHP:

Escolha:

C:\xampp\php\php.exe

⚠️ Muito importante: usar o PHP do XAMPP.

🟢 4️⃣ Após instalar, teste

Abra um novo CMD (feche o antigo).

Digite:

composer -V

Se aparecer a versão, ok.

🟢 5️⃣ Verificar OpenSSL

Digite:

php -m

Confirme se aparece:

openssl

Se não aparecer, aí temos outro problema.

🟢 6️⃣ Testar conexão

Digite:

composer diagnose

Se aparecer algo sobre SSL novamente, me mande o resultado.

🎯 Por que isso está acontecendo?

Esse erro:

curl error 60
unable to get local issuer certificate

Significa:

O PHP não está encontrando o arquivo cacert.pem
ou

A versão do Composer ficou mal configurada

Isso é comum no Windows + XAMPP.

❗ NÃO FAÇA

Não desative SSL.
Não use --ignore-platform-reqs.
Não use hacks.

Vamos resolver direito.

Agora faça a reinstalação.

Quando terminar, me manda:

Resultado de composer -V

Resultado de composer diagnose

Vamos eliminar isso de vez.

Final 🔴 ✅ REINSTALAR O COMPOSER (Windows + XAMPP)

🛠️ Decisão Estratégica: Vamos usar Laravel Sanctum 

É oficial do Laravel.
É mais simples.
É mais moderno.
Não depende de pacote problemático.
Resolve API + token tranquilamente.

E para recrutador, isso é até melhor.

🔵 NOVA ETAPA 6 — Autenticação com Sanctum

🟢 PASSO 1 — Instalar Sanctum

Dentro da pasta do projeto:

composer require laravel/sanctum

Se isso der erro de SSL também, me avisa — aí o problema é global do Composer, não do pacote.

🟢 PASSO 2 — Publicar Configuração
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"

🟢 PASSO 3 — Rodar Migration
php artisan migrate

Vai criar a tabela:

personal_access_tokens
🟢 PASSO 4 — Configurar User Model

Abra:

app/Models/User.php

Adicione no topo:

use Laravel\Sanctum\HasApiTokens;

E altere a classe:

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

Isso habilita geração de token.

🟢 PASSO 5 — Criar AuthController
php artisan make:controller Api/AuthController

Depois vamos implementar:

register

login

logout

🎯 Por que isso é melhor?

JWT tradicional:

Complexo

Mais manutenção

Configuração chata

Sanctum:

Token simples

Integra com Laravel nativamente

Mais rápido de implementar

Mais profissional hoje

Me diga:

O composer require laravel/sanctum funcionou?

Se sim, seguimos imediatamente para criar o AuthController.

Agora a gente volta para ritmo alto.

concluida a correção de 🛠️ Decisão Estratégica: Vamos usar Laravel Sanctum 

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
