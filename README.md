<p align="center"><img src="https://d8xabijtzlaac.cloudfront.net/Custom/Content/Themes/Shared/Images/marca-bemol.svg" width="150"></p>

## Omni App

Projeto de exemplo aplicação de cadastro de usuário em multi-canais de atendimento

## Screenshots
![Screen 1](https://github.com/tarsislima/omni-app/blob/master/screen-1.jpg)

![Screen 2](https://github.com/tarsislima/omni-app/blob/master/screen-2.jpg)

## Pré Requisitos

- Linux
- Docker https://docs.docker.com/engine/install/
- Docker-compose https://docs.docker.com/compose/install/
- Node js https://nodejs.org/en/
- Npm https://www.npmjs.com/
- Composer https://getcomposer.org/

## Intalação

Após clonar o projeto rodar os seguintes comandos

### Dependencias do projeto

Frontend

```
npm install
npm run dev
```

Backend

```
composer install

```

### Container do servidor nginx e mysql para subir a aplicação

```
cp .env.example .env
docker-compose pull
docker-compose up 
```

Com os containers rodando é necessário rodar alguns comandos internamente. Em outro terminal acessar o container:

```
docker exec -it omni-bemol sh
```

Dentro do container executar

```
php artisan migrate
php artisan db:seed
```

## Questões

Se encontram no arquivo questoes.txt neste repositório
[questoes.txt](![C4 Model](https://github.com/tarsislima/omni-app/blob/master/questoes.txt))
## Modelo C4

![C4 Model](https://github.com/tarsislima/omni-app/blob/master/c4model.jpg)