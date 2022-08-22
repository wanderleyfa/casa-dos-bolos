## Projeto Casa dos Bolos

## Contributing
wanderley ferreira de albuquerque [wanderleyfa@gmail.com](wanderleyfa@gmail.com)

## License

[MIT license](https://opensource.org/licenses/MIT).

## Getting started

- Clone o repositorio
- copie `env.example` para `.env`, e atualize com as variaveis do projeto que voce irá utilizar
- execute o comando `composer install`

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
