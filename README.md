COMO RODAR O PROJETO

Ter o PHP, Composer, Node.js e NPM instalados e o MySQL instalado e em execução 
(utilizei o XAMPP mesmo)

API — pasta "api-agenda-tarefa"

1. Ligar o MySQL e criar o banco de dados "agenda-tarefa"

2. No terminal do VS Code, dentro da pasta "api-agenda-tarefa", 
executar `copy .env.example .env` para criar o arquivo ".env"

3. Executar `code .env` para abrir o arquivo no VS Code

4. No arquivo aberto, deixar o DB_DATABASE como "agenda-tarefa", o 
DB_USERNAME como "root" e o DB_PASSWORD vazio, depois salvar as alterações

5. Executar composer install

6. Executar php artisan key:generate

7. Executar php artisan migrate

8. Executar php artisan serve

Front-end — pasta "lista-tarefa"

1. Executar npm install

2. Executar npm run dev

3. Acessar o endereço disponibilizado no terminal após executar o comando

Acesso ao sistema

Na tela de login, clicar em "Criar conta" para realizar o cadastro
