# 🦁 Sistema de Gerenciamento de Animais e Cuiados

[![Laravel](https://img.shields.io/badge/Laravel-12.x-red?style=flat&logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2-blue?logo=php)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-5.7-orange?logo=mysql)](https://www.mysql.com/)
[![License](https://img.shields.io/badge/license-MIT-lightgrey)](LICENSE)

---

## 📖 Descrição

API REST feita com **Laravel 12.x**, **PHP 8.2.12**, **MySQL (via XAMPP)**, com frontend em HTML/CSS/JS puro.  
Permite cadastro, listagem, edição e exclusão de animais e cuidados.  
O foco foi entregar um sistema funcional e coerente com o que eu domino atualmente.

OBS: Os exemplos da interface estao disponiveis em: /exemplos 

## Tecnologias utilizadas

- Laravel 12
- PHP 8.2.12
- MySQL (XAMPP)
- HTML, CSS (puro) para o frontend
- Ajax


## Como rodar o projeto
1. Instale as dependencias:
```bash
composer install
```
2. Configure o seu arquivo .env
   
4. Gere a chave do app Laravel:
```bash
php artisan key:generate
```
4. Execute as migrations:
```
php artisan migrate
```
5. Inicie o servidor:
```bash
php artisan serve
```

## Rotas da API

🔹 Animais
| Método | Endpoint         | Ação                  |
|--------|------------------|-----------------------|
| GET    | /animais         | Listar todos os animais |
| POST   | /animais         | Registrar novo animal |
| PUT    | /animais/{animal}| Editar animal         |
| DELETE | /animais/{animal}| Deletar animal        |

🔹 Cuidados
| Método | Endpoint         | Ação                  |
|--------|------------------|-----------------------|
| GET    | /cuidados        | Listar todos os cuidados |
| POST   | /cuidados        | Registrar novo cuidado |
| PUT    | /cuidados/{care} | Editar cuidado        |
| DELETE | /cuidados/{care} | Deletar cuidado       |

## Como usar
Registro de Animais

    Informações necessárias: Nome, Descrição, Data de Nascimento, Classe, Espécie, Habitat e País de Origem.

   Relacionamento entre classe e espécie: Cada espécie está associada a uma classe. Exemplo:

    Classe: Mamífero

    Espécie: Leão

   Filtragem automática: Ao selecionar uma classe, a aplicação irá filtrar automaticamente as espécies relacionadas a ela.

   Registro de Cuidados

    Informações necessárias: Nome, Descrição e Frequência do cuidado.
   ## Operações disponíveis

Além do registro de dados, é possível realizar as seguintes operações para Animais e Cuidados:

    Atualização de dados: Modifique as informações de animais e cuidados conforme necessário.

    Exclusão de dados: Remova registros de animais ou cuidados indesejados.

    Listagem de dados: Visualize a lista completa de animais ou cuidados cadastrados.

## Estrutuda do banco de dados
🔹 Animals
| Coluna |     Tipo     | Atributos             |
|--------|--------------|-----------------------|
| name   | varchar      |
| description | varchar |
| birthdate | date      |
| class_id | bigint     | Foreign key classes(id) |
| specie_id | bigint    | Foreign key species(id) |
| habitat | varchar     |
| country | int         |
| created_at | timestamp |
| updated_at | timestamp  |

🔹 Cuidados
| Coluna |     Tipo     |
|--------|--------------|
| name   | varchar      |
| description | varchar |
| frequency | varchar   |

🔹 Classes
| Coluna |     Tipo     |
|--------|--------------|
| id     | bigint       |
| name   | varchar      |

🔹 Species
| Coluna |     Tipo     |  Atributos            |
|--------|--------------|-----------------------|
| id     | bigint       |
| class_id | bigint     | Foreign key classes(id) |
| name   | varchar      |

