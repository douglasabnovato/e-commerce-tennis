🔵 ETAPA 3 — MODELAGEM COMPLETA

🟢 PASSO 1 — Criar Migrations ✅

Vamos criar cada tabela separadamente.

No terminal:

php artisan make:migration create_products_table
php artisan make:migration create_product_sizes_table
php artisan make:migration create_orders_table
php artisan make:migration create_order_items_table

ao final de cada comando temos a mensagem: "created successfully"

Isso cria os arquivos em:

database/migrations/

🟢 PASSO 2 — Definir tabela products ✅

Abra a migration create_products_table.

Substitua o conteúdo por:

public function up(): void
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('brand')->index();
        $table->string('category')->nullable();
        $table->decimal('price', 10, 2);
        $table->integer('stock')->default(0);
        $table->string('color')->nullable();
        $table->string('material')->nullable();
        $table->integer('weight')->nullable();
        $table->string('technology')->nullable();
        $table->string('usage_type')->nullable();
        $table->year('release_year')->nullable();
        $table->string('sku')->unique();
        $table->text('description')->nullable();
        $table->string('image')->nullable();
        $table->timestamps();

        $table->index('name');
    });
}

✔ Index em brand
✔ Index em name
✔ SKU unique

Isso já demonstra maturidade.

🟢 PASSO 3 — Definir tabela product_sizes ✅

Abrir migration correspondente:

public function up(): void
{
    Schema::create('product_sizes', function (Blueprint $table) {
        $table->id();
        $table->foreignId('product_id')
              ->constrained()
              ->onDelete('cascade');
        $table->integer('size');
        $table->integer('stock')->default(0);
        $table->timestamps();

        $table->unique(['product_id', 'size']);
    });
}

✔ Relacionamento 1:N
✔ Cascade delete
✔ Unique composto

🟢 PASSO 4 — Definir tabela orders ✅
public function up(): void
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')
              ->constrained()
              ->onDelete('cascade');
        $table->decimal('total', 10, 2);
        $table->string('status')->default('pending');
        $table->timestamps();
    });
}
🟢 PASSO 5 — Definir tabela order_items ✅
public function up(): void
{
    Schema::create('order_items', function (Blueprint $table) {
        $table->id();
        $table->foreignId('order_id')
              ->constrained()
              ->onDelete('cascade');

        $table->foreignId('product_id')
              ->constrained()
              ->onDelete('cascade');

        $table->integer('size');
        $table->integer('quantity');
        $table->decimal('price', 10, 2);
        $table->timestamps();
    });
}
🟢 PASSO 6 — Rodar Migrations ✅

Execute:

php artisan migrate

Se tudo estiver correto → tabelas criadas.

Vá no phpMyAdmin e confirme visualmente.

⏱ Tempo: 5 minutos

🟢 PASSO 7 — Criar Models ✅

Execute:

php artisan make:model Product
php artisan make:model ProductSize
php artisan make:model Order
php artisan make:model OrderItem

🟢 PASSO 8 — Definir Relacionamentos ✅

Product.php
public function sizes()
{
    return $this->hasMany(ProductSize::class);
}

public function orderItems()
{
    return $this->hasMany(OrderItem::class);
}

ProductSize.php
public function product()
{
    return $this->belongsTo(Product::class);
}

Order.php
public function user()
{
    return $this->belongsTo(User::class);
}

public function items()
{
    return $this->hasMany(OrderItem::class);
}

OrderItem.php
public function order()
{
    return $this->belongsTo(Order::class);
}

public function product()
{
    return $this->belongsTo(Product::class);
}

🟢 PASSO 9 — Testar no Tinker ✅  

Execute:

Entrar no Tinker
php artisan tinker

Importar o Model
use App\Models\Product;

Criar o produto:

Product::create([
    'name' => 'Air Zoom Test',
    'brand' => 'Nike',
    'category' => 'Running',
    'price' => 799.90,
    'discount_price' => 699.90,
    'stock' => 20,
    'material' => 'Mesh',
    'weight' => 250,
    'technology' => 'Air Zoom',
    'usage_type' => 'Corrida',
    'release_year' => 2024,
    'sku' => 'NIKE-AIR-TEST-001'
]);

Teste:

Product::first();

Resposta:

= App\Models\Product {#4693
    id: 1,
    name: "Air Zoom Test",
    brand: "Nike",
    category: "Running",
    price: "799.90",
    discount_price: "699.90",
    stock: 20,
    material: "Mesh",
    weight: 250,
    technology: "Air Zoom",
    usage_type: "Corrida",
    release_year: "2024",
    sku: "NIKE-AIR-TEST-001",
    image: null,
    description: null,
    history: null,
    nba_minutes_played: null,
    created_at: "2026-02-27 13:13:40",
    updated_at: "2026-02-27 13:13:40",
  }


✅ O QUE ESTÁ CORRETO

✔ Registro salvo no banco
✔ Auto increment funcionando
✔ Timestamps automáticos funcionando
✔ Campos nullable funcionando
✔ SKU persistido
✔ Estrutura da migration coerente
✔ Model + fillable corretos

🟢 PASSO 10 — Commit Profissional ✅

git add .
git commit -m "feat: create ecommerce core database structure"

🎯 Resultado Final da Etapa 3

Você terá:

✔ Modelagem relacional real
✔ Chaves estrangeiras
✔ Índices
✔ Unique constraints
✔ Relacionamentos Eloquent
✔ Estrutura pronta para API

Confirma quando:

Migrations rodaram

Modelos criados

Tinker funcionou

A próxima etapa é:

Controllers + API REST estruturada.
