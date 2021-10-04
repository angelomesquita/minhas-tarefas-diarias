# Minhas tarefas diárias

## Instalação do projeto

- [Efetuar o clone deste projeto](https://github.com/angelomesquita/minhas-tarefas-diarias)
- Executar o comando no terminal: composer install;
- Configura o arquivo .env com os dados de conexão com o SGBD de sua preferência;
- Criar a base de dados para validação do sistema. Sugestão: tarefas-diarias;
- Executar o comando no terminal: php artisan migrate;

## Métodos disponíveis

**Utilizando algum app para testar endpoints como [Insomnia](https://insomnia.rest/download) ou [Postman](https://www.postman.com/)**

- GET - /v1/tarefas/
- GET - /v1/tarefas/diasanteriores
- GET - /v1/tarefas/arquivadas
- GET - /v1/tarefas/tags/{id}
- POST - /v1/tarefa - obrigatório passar no corpo um atributo **titulo**
- PATCH - /v1/tarefa/{id}
- PUT - /v1/tarefa/arquivar/{id}
- PUT - /v1/tarefa/concluir/{id}
- PUT - /v1/tarefa/vinculartag/{id} - obrigatório passar no corpo um atributo **tag_id**

- GET - /v1/tags
- POST - /v1/tag
- PATCH - /v1/tag/{id}
- DELETE - /v1/tag/{id}

- GET - /v1/desafio-logica
- GET - /v1/desafio-logica/bonus/{palavra}

**Utilizando formulários html**

- GET - /tarefas/
- GET - /tarefas/diasanteriores
- GET - /tarefas/arquivadas
- GET - /tarefas/tags/{id}
- POST - /tarefa - obrigatório passar no corpo um atributo **titulo**
- PATCH - /tarefa/{id}
- PUT - /tarefa/arquivar/{id}
- PUT - /tarefa/concluir/{id}
- PUT - /tarefa/vinculartag/{id} - obrigatório passar no corpo um atributo **tag_id**

- GET - /tags
- POST - /tag
- PATCH - /tag/{id}
- DELETE - /tag/{id}

- GET - /desafio-logica
- GET - /desafio-logica/bonus/{palavra}