# 🦁 API de Gerenciamento de Animais e Cuiados

[![Laravel](https://img.shields.io/badge/Laravel-12.x-red?style=flat&logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2-blue?logo=php)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-5.7-orange?logo=mysql)](https://www.mysql.com/)
[![Postman](https://img.shields.io/badge/Tested_with-Postman-FF6C37?logo=postman)](https://www.postman.com/)
[![License](https://img.shields.io/badge/license-MIT-lightgrey)](LICENSE)

---

## 📖 Descrição

API REST feita com **Laravel 12.x**, **PHP 8.2.12**, **MySQL (via XAMPP)**, com frontend em HTML/CSS/JS puro.  
Permite cadastro, listagem, edição e exclusão de animais e cuidados.  

## Tecnologias utilizadas

- Laravel 12
- PHP 8.2.12
- MySQL (XAMPP)
- Postman
- HTML, CSS e JavaScript (puro) para o frontend

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

## Testes com Postman
Headers obrigatórios:

    Key: Accept

    Value: application/json

Recomenda-se instalar o Postman Agent para chamadas localhost.

## Rotas da API

 📮 Rotas da API (collection disponível no Postman)
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
