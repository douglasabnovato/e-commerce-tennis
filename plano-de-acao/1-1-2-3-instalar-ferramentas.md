# 🔵 Etapa 1.1 — Instalar Ferramentas

**Objetivo:** deixar a máquina preparada para rodar Laravel localmente.

## ✅ Ferramentas essenciais

- PHP 8.2+ ✅
- Composer ✅
- MySQL ✅
- Node.js ✅
- Git ✅
- Visual Studio Code ✅
- Postman ✅
- Docker (opcional, mas recomendado para ambientes profissionais)

## 🔍 Verificar instalações existentes

Abra um terminal e execute:

```bash
php -v          # versão do PHP
composer -v     # versão do Composer
mysql --version # versão do MySQL (MariaDB)
node -v         # versão do Node.js
git --version   # versão do Git
```

> **Exemplo de saídas obtidas na máquina atual:**
>
> ```bash
> $ php -v
> PHP 8.1.12 (cli) (built: Oct 25 2022 18:16:21) (ZTS Visual C++ 2019 x64)
> Copyright (c) The PHP Group
> Zend Engine v4.1.12, Copyright (c) Zend Technologies
>
> $ composer -v
> Composer version 2.5.4 2023-02-15 13:10:06
>
> $ mysql --version
> MySQL (MariaDB) 10.4.27
>
> $ node -v
> v18.20.4
>
> $ git --version
> git version 2.46.2.windows.1
> ```
>
> (VS Code pode ser verificado via `code --version` ou consultando o menu Ajuda → Sobre.)

Se algum comando retornar “command not found” ou versão insuficiente, siga as instruções abaixo.

---

## 1️⃣ Instalar PHP 8.2+

No Windows é simples usar o XAMPP ou instalar o PHP standalone.  
Recomendação: **XAMPP** para ter Apache e MySQL juntos.

1. Baixe em: https://www.apachefriends.org/pt_br/index.html  
   escolha a versão com PHP 8.2+.
2. Instale seguindo o assistente.

> Após a instalação, adicione o PHP ao PATH:
>
> - Abra **Variáveis de Ambiente** no Windows.
> - Edite o `Path` e inclua `C:\xampp\php` (ou o caminho da sua instalação).
> - Salve e abra um novo terminal.
> - Verifique com `php -v` — deve exibir `8.2.x`.

---

## 2️⃣ Instalar Composer

1. Baixe o instalador Windows em https://getcomposer.org/  
2. Durante a instalação, aponte para o executável PHP (`C:\xampp\php\php.exe`).
3. Finalize e teste:

```bash
composer -v
```

---

## 3️⃣ Instalar MySQL

Se você usar o XAMPP, já terá o MySQL.

1. Abra o painel do XAMPP e inicie o serviço MySQL.
2. No terminal:

```bash
mysql -u root -p
```

- Se pedir senha e você não definiu, aperte Enter.
- Se conseguir acessar, o servidor está funcionando.

---

## 4️⃣ Instalar Node.js

1. Vá em https://nodejs.org/ e baixe a versão **LTS**.
2. Execute o instalador.
3. Verifique:

```bash
node -v
npm -v
```

---

## 5️⃣ Instalar Git

1. Faça download em https://git-scm.com/ e instale.
2. Teste:

```bash
git --version
```

---

## 6️⃣ Instalar Visual Studio Code

1. Baixe em https://code.visualstudio.com/ e instale.
2. Recomendadas extensões:

   - PHP Intelephense
   - Laravel Snippets
   - DotENV
   - GitLens

---

## 7️⃣ Instalar Postman

1. Baixe em https://www.postman.com/downloads/ e instale.
2. Use para testar endpoints da API.

---

## 8️⃣ (Opcional) Docker

Para um ambiente “mais profissional” ou containers:

1. Instale Docker Desktop: https://www.docker.com/products/docker-desktop
2. Requer conta Docker e suporte a WSL2 no Windows.

---

> Após completar essa etapa, sua máquina estará pronta para iniciar o desenvolvimento do e‑commerce.

Mas para esse projeto de 12h, não é obrigatório.

🔎 AGORA TESTE GERAL

Rode tudo isso no terminal:

php -v
composer -v
mysql --version
node -v
git --version

Se tudo retornar versão → máquina pronta.


🔵 ETAPA 1.2 — Criar Contas Necessárias

Vou organizar em ordem inteligente (do essencial ao opcional).

✅ 1️⃣ GitHub (OBRIGATÓRIO)
Verificar se já tem:

Acesse:

https://github.com

Se já tiver conta → apenas confirme login.

Se não tiver:

Criar conta gratuita

Username profissional (sem apelido infantil)

Foto profissional

Bio curta:

Full-Stack Developer | Vue.js | Laravel | REST APIs
Configurar Git no seu PC

Verifique:

git config --global user.name
git config --global user.email

Se estiver vazio:

git config --global user.name "Douglas ..."
git config --global user.email "seuemail"
✅ 2️⃣ Render (Backend Deploy)

Acesse:

https://render.com

Criar conta com GitHub

Plano gratuito já resolve

Não precisa criar serviço ainda

✅ 3️⃣ Railway (Banco na nuvem)

Acesse:

https://railway.app

Login com GitHub

Plano gratuito

Depois criaremos um MySQL lá

✅ 4️⃣ Vercel (Frontend futuro)

Acesse:

https://vercel.com

Login com GitHub

Não precisa configurar nada agora

🟡 5️⃣ AWS (Opcional)

Se quiser diferencial:

https://aws.amazon.com

Criar conta leva mais tempo (cartão, validação).

Se quer fechar o projeto em 12h → deixe AWS para depois.

Minha recomendação:
👉 Foque Render + Railway.
Depois você faz versão AWS como upgrade.

## 🔵 Etapa 1.3 — Criar Banco Local

Agora vamos preparar o ambiente local corretamente.

✅ Criar banco via phpMyAdmin

Entre em:

http://localhost/phpmyadmin

Clique em:

Databases

✅ Create database

Nome:

ecommerce_tennis

Collation:

utf8mb4_unicode_ci

Clique em Create.

✅ Alternativa via SQL

Na aba SQL execute:

CREATE DATABASE ecommerce_tennis 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

### 🔵 Configurar `.env` (quando Laravel existir)

Quando o projeto Laravel estiver criado, ajuste o arquivo de ambiente:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce_tennis
DB_USERNAME=root
DB_PASSWORD=
```

> No XAMPP geralmente o usuário `root` não tem senha.

### 🔎 Testar conexão (quando Laravel existir)

Execute:

```bash
php artisan migrate
```

Se a migração rodar sem erro, a conexão com o banco está funcionando.

### 🎯 Plano imediato agora

Siga a ordem abaixo para não se perder:

1. Confirmar repositório no GitHub
2. Criar serviço no Render (backend)
3. Criar banco no Railway (MySQL gerenciado)
4. Criar banco local (passo atual)
5. Verificar que o banco foi realmente criado

### ⚠️ ERROS COMUNS

Se php não é reconhecido:
→ PATH não foi configurado corretamente.

Se composer não funciona:
→ instalou antes de configurar PHP.

### ⏱ Tempo estimado real

Se tudo correr bem:
1h a 1h30.

Se der erro:
2h.