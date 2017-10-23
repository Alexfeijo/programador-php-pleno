# Teste prático - Programador(a) PHP Pleno – Laravel

**Projeto utilizando Laravel [5.5](https://laravel.com/).**
Este projeto foi desenvolvido utilizando Laravel na sua versão 5.5, Bootstrap 4.0.0.

# Requisitos
- Ter PHP >=7.0
- Ter instalados os requisitos do Laravel (https://laravel.com/docs/5.5#server-requirements).
- Ter instalado nodejs(https://nodejs.org/en/).
- Ter instalado NPM (https://www.npmjs.com/).

# Clone o projeto
Primeiro passo é clonar o projeto para o seu ambiente.

# Crie um virtualhost
-  Aponte para a pasta public do projeto.
- De um nome para o virtualhost, exemplo: biologiatotal.dev

# Instale as dependecias
O próximo passo é instalar as dependências do Laravel e as dependências com o NPM, entre na pasta do projeto e rode
`composer install`
`npm install`

# Configure seu arquivo .env
- Caso não tenha crie o arquivo e copie o conteúdo do arquivo .env-example
- Configure seus dados do seu banco, mysql, postgres, usuario, senha.
- Crie um banco de dados e coloque o nome no arquivo env, para poder ser criadas as tabelas.

# Crie seu banco de dados
- Se já colocou o nome do seu BD no arquivo .env então rode o seguinte comando para criar as tabelas:
`php artisan migrate`
- Este comando irá criar as tabelas necessárias no seu banco.

# Compile os js e css
- Rode o comando abaixo para compilar alguns arquivos css e js.
`npm run dev`

## Agora sua aplicação deve rodar já

#### Api
Foi desenvolvido os requests para a API, eles são so seguintes:

- Requests :

`GET` -> `/api/courses` -> retorna todos os cursos no formato json.

`GET` -> `/api/students` -> retorna todos os estudantes no formato json.

`GET` -> `/api/registrations` -> retorna todos as matrículas no formato json.

Ex de cursos:
```
{
    "data": {
        "courses": [
            {
                "id": 1,
                "title": "NOME DO CURSO",
                "description": "DESCRIÇÃO DO CURSO",
                "created_at": "2017-10-23 00:16:24",
                "updated_at": "2017-10-23 00:16:24"
            }
        ]
    }
}
```

`POST` -> `/api/courses` -> para salvar um curso.

`POST` -> `/api/registrations` -> para salvar uma matrícula.

`POST` -> `/api/students` -> para salvar um aluno.

-- Padrão do json enviado:
```
{
	"title": "NOME DO CURSO",
	"description": "DESCRIÇÃO DO CURSO"
}
 ```
 
 -- Padrão de json da confirmação. Ex de curso:
 
 ```
 {
    "status": 200,
    "data": {
        "course": {
            "title": "NOME DO CURSO",
            "description": "DESCRIÇÃO DO CURSO",
            "updated_at": "2017-10-23 00:16:24",
            "created_at": "2017-10-23 00:16:24",
            "id": id-do-curso
        },
        "message": "Curso inserido com sucesso."
    }
}
 ```
 
`GET` -> `/api/courses/id-do-curso` -> retorna os dados do curso no formato json.

`GET` -> `/api/students/id-do-aluno` -> retorna os dados do estudante no formato json.

`GET` -> `/api/registrations/id-da-matricula` -> retorna os dados da matrícula no formato json.

Ex de cursos:

```
{
    "data": {
        "course": {
            "id": id-do-curso,
            "title": "nome-do-curso",
            "description": "descrição-do-curso",
            "created_at": "2017-10-21 00:54:58",
            "updated_at": "2017-10-21 00:54:58"
        }
    }
}
```

`PUT` -> `/api/courses/id-do-curso` -> atualiza os dados do curso no formato json.

`PUT` -> `/api/students/id-do-aluno` -> atualiza os dados do estudante no formato json.

`PUT` -> `/api/registrations/id-da-matricula` -> atualiza os dados da matrícula no formato json.

Ex de curso:

Envio:
```
{
	
	"title": "nome-do-curso",
	"description": "descrição-do-curso"
}
```

Resposta:
```
{
    "status": 200,
    "data": {
        "course": {
            "id": id-do-curso,
            "title": "nome-do-curso",
            "description": "descrição-do-curso",
            "created_at": "2017-10-21 00:54:58",
            "updated_at": "2017-10-21 00:54:58"
        },
        "message": "Curso atualizado com sucesso."
    }
}
```

`DELETE` -> `/api/courses/id-do-curso` -> Deleta o curso do BD.

`DELETE` -> `/api/students/id-do-aluno` -> Deleta o aluno do BD.

`DELETE` -> `/api/registrations/id-da-matricula` -> Deleta a matrícula do BD.

Ex de curso: 
```
{
    "status": 200,
    "data": {
        "course": {
            "id": id-do-curso,
            "title": "nome-do-curso",
            "description": "descrição-do-curso",
            "created_at": "2017-10-21 00:54:58",
            "updated_at": "2017-10-21 00:54:58"
        },
        "message": "Curso excluído com sucesso."
    }
}
```

### Dashboard
O dashboard está desenvolvido mas não estão todas funcionalidades implementadas nele, os requests acima estão todos prontos mas faltam algumas interações com o dashboard.

#### Funcionalidades prontas
- Listagem de cursos, alunos, matriculas
- Filtros nas listagens por nome, email, curso.

Qualquer dúvida ou sugestão alexandroffeijo@gmail.com.

Desenvolvido por Alexandro Flores Feijó.