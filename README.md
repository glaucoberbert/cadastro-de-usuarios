# COMO RODAR O PROJETO

Ter o PHP, Composer, Node.js e NPM instalados e o MySQL instalado e em execução 
(utilizei o XAMPP mesmo)

API — pasta "api-agenda-tarefa"

1. Ligar o MySQL pelo XAMPP e criar o banco de dados "agenda-tarefa"

2. No terminal do VS Code, dentro da pasta "api-agenda-tarefa", executar `copy .env.example .env` para criar o arquivo ".env"

3. Executar `notepad .env` para abrir o arquivo no Bloco de Notas

4. Procurar DB_PASSWORD e deixar vazio, sem nada depois do sinal de igual

5. Salvar as alterações com Ctrl + S e fechar o Bloco de Notas

6. Executar composer install

7. Executar php artisan key:generate

8. Executar php artisan migrate

9. Executar php artisan serve

Front-end — pasta "lista-tarefa"

1. Executar npm install

2. Executar npm run dev

3. Acessar o endereço disponibilizado no terminal após executar o comando

Acesso ao sistema

Na tela de login, clicar em "Criar conta" para realizar o cadastro
