# 🔵 Etapa 2 — Iniciar Backend (Laravel API)

**Objetivo desta etapa:**

- Criar projeto Laravel ✅  
- Conectar ao banco de dados ✅
- Validar ambiente de desenvolvimento ✅
- Preparar estrutura base da API ✅

---

## ✅ Passo 1 — Criar projeto Laravel

No diretório onde deseja trabalhar, execute:

```bash
composer create-project laravel/laravel ecommerce-tennis
```

⏱ *Tempo estimado:* 10‑15 minutos

Quando terminar:

```bash
cd ecommerce-tennis
```

---

## ✅ Passo 2 — Configurar banco no `.env`

1. Abra o projeto no VS Code:

   ```bash
   code .
   ```

2. Edite o arquivo `.env` com as credenciais do banco:

   ```dotenv
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=ecommerce_tennis
   DB_USERNAME=root
   DB_PASSWORD=
   ```

3. Salve o arquivo.

---

## ✅ Passo 3 — Testar conexão com o banco

Execute:

```bash
php artisan migrate
```

- Se a migração rodar sem erros → conexão validada.
- Caso contrário, investigue a mensagem e corrija antes de prosseguir.

⏱ *Tempo estimado:* 5 minutos

---

## ✅ Passo 4 — Rodar servidor local

```bash
php artisan serve
```

Acesse `http://127.0.0.1:8000` no navegador.  
Se aparecer a tela padrão do Laravel, o ambiente está pronto.

---

## 🎯 Resultado esperado desta etapa

Ao final você terá:

- ✔ Projeto Laravel criado
- ✔ Banco conectado e migrations aplicadas
- ✔ Servidor local em funcionamento
- ✔ Estrutura da API pronta para começar a modelagem de dados

---

🔥 **Próxima etapa:** modelagem real do banco (migrations, models e relacionamentos).
