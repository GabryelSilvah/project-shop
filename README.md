<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre
Projeto de sistema de cadastramento de produos e gerenciamento de pedidos. O projeto foi desenvolvido em php laravel 11.
Esse projeto partiu de uma atividade requisitada na matéria de linguagens tecnica de programação. O projeto é bem simples,
permite cadastrar, listar, atualizar e excluir pedidos. Também permite que a pessoa responsável pelo gerenciamento do sistema
cadastre pedidos, altere, liste e delete pedidos. 

O projeto tem o intuito de desmostrar conhecimento a respeito da matéria, para que assim possa ser avaliado e validado.

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).


## Rotas

<table>
    <tr>
        <th>Verbo</th>
        <th>URI</th>
    </tr>
    <tr>
        <td>GET</td>
        <td>/</td>
    </tr>
     <tr>
        <td>GET</td>
        <td>/login</td>
    </tr>
     <tr>
        <td>GET</td>
        <td>/cadastrar</td>
    </tr>
     <tr>
        <td>POST</td>
        <td>/cadastrar_user</td>
    </tr>
    <tr>
        <td>GET</td>
        <td>/produtos</td>
    </tr>
    <tr>
        <td>GET</td>
        <td>/alterar_produto/{id}</td>
    </tr>
     <tr>
        <td>POST</td>
        <td>/alterar_produto/{id}</td>
    </tr>
</table>

