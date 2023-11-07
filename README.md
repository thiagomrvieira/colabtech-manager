# Aplicação Laravel

Esta é uma aplicação Laravel que gerencia registros de colaboradores. A aplicação alimenta com sua API uma interface Angular para listar, visualizar detalhes e validar registros de colaboradores.

## Estrutura do Projeto

Aqui está uma visão geral da estrutura de pastas e arquivos do projeto:

- `app/Http/Controllers`: Contém os controladores da aplicação.
- `app/Http/Resources`: Contém os recursos utilizados para transformar os dados em respostas JSON.
- `app/Models`: Contém os modelos de dados da aplicação.
- `database/migrations`: Contém as migrações do banco de dados.
- `routes`: Contém os arquivos de rota da aplicação.
- `tests`: Contém os testes automatizados da aplicação.

## Funcionalidades

A aplicação Laravel inclui as seguintes funcionalidades:

- Listagem de registros de colaboradores com filtragem por nome.
- Visualização de detalhes individuais de colaboradores, incluindo nome, email, telefone, CPF e status de validação.
- Validação de registro de colaboradores.
- Filtro dinâmico baseado em filtros de pesquisa.

## Funcionalidades Pendentes e Sugestões 

Aqui estão as funcionalidades que estão pendentes de implementação na aplicação:

- Criação de rotas e controller para listar as Skills
- Aplicação de Cache
- Uso de Paginação
- Autenticação para o Front

## Configuração

Antes de iniciar a aplicação, certifique-se de configurar corretamente seu ambiente, incluindo a instalação do Laravel e as dependências necessárias. Certifique-se também de configurar seu banco de dados.

## Execução

Para executar a aplicação, siga os passos abaixo:

1. Clone este repositório para o seu ambiente local.

2. Execute o comando `composer install` para instalar as dependências do Laravel.

3. Crie um arquivo `.env` na raiz do projeto e configure as variáveis de ambiente, incluindo a configuração do banco de dados.

4. Execute o comando `php artisan key:generate` para gerar a chave de aplicação.

5. Execute o comando `php artisan migrate --seed` para migrar e alimentar o banco de dados.

6. Inicie o servidor Laravel com o comando `php artisan serve`.

A aplicação estará disponível em `http://localhost:8000`.

## Contato

Se você tiver alguma dúvida ou precisar de assistência adicional, não hesite em entrar em contato.

