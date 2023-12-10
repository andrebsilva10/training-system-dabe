## Desenvolvimento de Aplicações Back-End

Aplicação gerenciador de treinamentos desenvolvida na disciplina de Desenvolvimento de Aplicações Back-End.

### Dependências

-   Docker
-   Docker Compose

### Run

```
$ git clone git@github.com:SI-DABE/todo-list.git
$ cd todo-list
$ docker compose run --rm composer composer install
$ docker compose up -d
```

### Run tests

```
$ docker compose exec php ./vendor/bin/phpunit tests --color
```

Access http://localhost

### Teste de API

```shell
curl -H "Accept: application/json" localhost/trainings.php
```
