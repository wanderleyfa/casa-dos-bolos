## Projeto Casa dos Bolos


## Contributing
wanderley ferreira de albuquerque [wanderleyfa@gmail.com](wanderleyfa@gmail.com)

## License

[MIT license](https://opensource.org/licenses/MIT).

## Getting started


- Clone o repositorio 
- copie `env.example` para `.env`, e atualize com as variaveis do projeto que voce irá utilizar
- configure as variaveis de e-mail no arquivo .env
    - MAIL_MAILER=
    - MAIL_HOST=
    - MAIL_PORT=
    - MAIL_USERNAME=
    - MAIL_PASSWORD=
    - MAIL_ENCRYPTION=
    - MAIL_FROM_ADDRESS=
- execute o comando, na raiz do projeto, `composer install`
- execute o comando, na raiz do projeto, `php artisan key:generate`
- execute o comando, na raiz do projeto, `php artisan migrate:fresh --seed`
- execute o comando, na raiz do projeto, `composer test`

- para que a fila de e-mails seja executada, comande a seguinte linha na raiz do projeto `php artisan queue:work`

# Composer Scripts

Estes são os `scritps composer` para facilitar operações repetitivas e evitar erros de digitação.
```
os scritps `post-autoload-dump`, `post-root-package-install` e `post-create-project-cmd`
são scritps adicionados automaticamente pela instalação do Laravel
e não serão alterados ou explicados nesse Readme
```

## test

atalho para executar a rotina de tests unitários utilizando o [PEST](https://pestphp.com/) An elegant PHP Testing Framework. Uma suite de testes baseada no PPHUnit, que pode ser utilizada em qualquer projeto PHP

Deveríamos utilizar o seguinte comando :
```bash
./vendor/bin/pest
```
Mas com o script `test` do Composer utilizaremos apenas
```bash
composer test

## pint

[Laravel Pint](https://laravel.com/docs/9.x/pint) é um formatador de estilo de código PHP opinativo para minimalistas. O [Laravel Pint](https://laravel.com/docs/9.x/pint) é construído em cima do PHP-CS-Fixer e torna simples garantir que seu estilo de código permaneça limpo e consistente. Ele pode ser utilizada em qualquer projeto PHP

Deveríamos utilizar o seguinte comando :
```bash
./vendor/bin/pint
```
Mas com o script `pint` do Composer utilizaremos apenas
```bash
composer pint
