## Desenvolvimento de Aplicações Back-End

Aplicação gerenciador de treinamentos desenvolvida na disciplina de Desenvolvimento de Aplicações Back-End.

### Dependências

- [Docker](https://docs.docker.com/engine/install/ubuntu/) 
- [Docker Compose](https://docs.docker.com/compose/install/linux/#install-using-the-repository)

### Run

```
$ git clone https://github.com/andrebsilva10/training-system-dabe.git
$ cd training-system-dabe
$ docker compose run --rm php composer install
$ docker compose up -d
$ ./run db:reset
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
