# 🏀 E-Commerce Tennis de Basquete 

# 📘 PARTE 1 — DOCUMENTAÇÃO

## 1. 📌 Visão Geral

Projeto full-stack de um e-commerce de tênis de basquete desenvolvido com:

    - Backend: Laravel
    - Banco de Dados: MySQL
    - Autenticação: JWT
    - Frontend: Vue 3 (em desenvolvimento)
    - Arquitetura REST
    - Controle de estoque por tamanho
    - Estrutura relacional realista

Objetivo do projeto: Uma plicação ponta a ponta com modelagem relacional, autenticação, controle de estoque e criação de pedidos.
 
## 2. 🧱 Arquitetura da Aplicação

Frontend (Vue 3)
↓
API REST (Laravel)
↓
MySQL

Padrões aplicados:

  - Arquitetura em camadas (Controller → Service → Model)
  - Middleware para autenticação
  - Validação via FormRequest
  - Eloquent ORM com relacionamentos
  - Padrão de resposta JSON padronizado

## 3. 🗄 Modelagem do Banco de Dados

### 3.1 Tabelas Principais

- users
  - id
  - name
  - email
  - password
  - timestamps

- products
  - id
  - name
  - brand
  - category
  - price
  - description
  - weight
  - launch_year
  - sku (unique)
  - image
  - timestamps

- product_sizes
  - id
  - product_id (FK)
  - size
  - stock
  - timestamps

- orders
  - id
  - user_id (FK)
  - total_price
  - status (pending, paid, canceled)
  - timestamps

- order_items
  - id
  - order_id (FK)
  - product_id (FK)
  - size
  - quantity
  - price
  - timestamps

### 3.2 Relacionamentos

- User → hasMany → Orders
- Order → hasMany → OrderItems
- Product → hasMany → ProductSizes
- Product → hasMany → OrderItems

## 4. 🔐 Autenticação

O sistema de autenticação utiliza **JSON Web Tokens (JWT)** para proteger rotas privadas.

### 4.1 Endpoints

- **POST** `/auth/register` – cria um novo usuário.
- **POST** `/auth/login` – gera token para usuário existente.

O middleware `auth:api` (ou equivalente JWT) protege as rotas que exigem login.  
Exemplo:

```http
POST /orders  ← somente usuários autenticados
```

## 5. 📦 Endpoints da API

### 5.1 Produtos

- `GET /products` – lista produtos.
- `GET /products/{id}` – detalhes de um produto.

Suporta:
- paginação (`?page=`),
- filtro por marca (`?brand=`),
- busca por nome (`?search=`).

### 5.2 Pedidos

- `POST /orders` – cria novo pedido.
- `GET /orders` – lista pedidos do usuário autenticado.

Validações automáticas:
- usuário deve estar autenticado;
- disponibilidade de estoque por tamanho;
- atualização de estoque ao finalizar pedido;
- cálculo do total do pedido com base nos itens.

## 6. 🧪 Regras de Negócio Implementadas

- Controle de estoque por tamanho.
- Redução automática de estoque no checkout.
- Armazenamento do preço no momento da compra (histórico).
- Validação robusta de requisições via FormRequest.
- Tratamento de erros padronizado em responses JSON.

## 7. 🚀 Como Executar Localmente

1. Clone o repositório:

   ```bash
   git clone https://github.com/douglasabnovato/e-commerce-tennis.git
   cd e-commerce-tennis
   ```

2. Copie o arquivo de ambiente e configure as variáveis:

   ```bash
   cp .env.example .env
   # ajustar DB, JWT_SECRET, etc.
   ```

3. Instale dependências e prepare o banco:

   ```bash
   composer install
   php artisan migrate
   php artisan db:seed
   php artisan serve
   ```

4. Acesse `http://localhost:8000` e teste com Postman ou frontend.

## 8. 🎯 Decisões Técnicas

- Separação de responsabilidades entre Controller e Service.
- Estoque por tamanho para refletir catálogo realista.
- Relacionamentos Eloquent configurados para evitar N+1.
- Persistência do preço do produto no pedido para manter histórico.
- Respostas JSON padronizadas para facilitar consumo no frontend.

## 9. 📈 Próximas Evoluções

- Integração completa com frontend Vue 3.
- Deploy em AWS (ou outro provedor).
- Adição de testes automatizados (PHPUnit/Pest, Vitest).
- Documentação Swagger/OpenAPI.
- Contêinerização com Docker.

---

# 🚀 PARTE 2 — PLANO DE AÇÃO

- **Tempo total estimado:** ~12h de desenvolvimento
- **Tempo adicional de setup inicial:** variável

## 🔵 ETAPA 1 — Preparação do Ambiente (2h)

1.1 **Instalar ferramentas** ✅

Você precisa ter:

- PHP 8.2+
- Composer
- Node.js
- MySQL
- Git
- VSCode
- Postman
- Docker (opcional)

Verificar versões:

```bash
php -v
composer -v
mysql --version
node -v
```

1.2 **Criar contas necessárias**

- GitHub ✅
- Render (para backend) ✅
- Railway (para MySQL) ✅
- Vercel (frontend futuro) ✅  
- AWS (opcional)

1.3 **Criar banco local**

```sql
CREATE DATABASE ecommerce_tennis;
```

Configurar `.env` com credenciais e testar conexão.

## 🔵 ETAPA 2 — Setup do Projeto Laravel (1h)

```bash
composer create-project laravel/laravel ecommerce-tennis
```

Configurar `.env` e executar:

```bash
php artisan serve
```

Testar se o servidor sobe. Commit inicial.

## 🔵 ETAPA 3 — Modelagem (2h)

- Criar migrations para: `products`, `product_sizes`, `orders`, `order_items`.
- Definir chaves estrangeiras e índices (brand, name).
- Executar:

  ```bash
  php artisan migrate
  ```

- Criar models e relações; testar via `php artisan tinker`. Commit.

## 🔵 ETAPA 4 — Seeders (1h)

- Criar `ProductSeeder` e `ProductSizeSeeder`.
- Inserir 10 produtos e tamanhos realistas.
- Executar:

  ```bash
  php artisan db:seed
  ```

- Verificar no banco. Commit.

## 🔵 ETAPA 5 — API Produtos (2h)

- Criar `ProductController`.
- Implementar:
  - `GET /products` com paginação, filtro por marca, busca por nome.
  - `GET /products/{id}` incluindo tamanhos.
- Testar no Postman. Commit.

## 🔵 ETAPA 6 — Autenticação JWT (1h30)

- Instalar pacote JWT (e.g., `tymon/jwt-auth`).
- Criar `AuthController` com `register` e `login`.
- Criar middleware e proteger rota de pedidos.
- Testar. Commit.

## 🔵 ETAPA 7 — Pedidos (2h)

- Criar `OrderController`.
- Fluxo:
  - Validar usuário autenticado.
  - Verificar estoque por tamanho.
  - Calcular total.
  - Criar `order` e `order_items`.
  - Atualizar estoque.
- Testar cenários: estoque insuficiente, múltiplos itens, usuário não autenticado. Commit.

## 🔵 ETAPA 8 — Padronização Final (30 min)

- Definir resposta JSON padrão.
- Revisar nomes e validações.
- Atualizar README com mudanças.
- Commit final.
