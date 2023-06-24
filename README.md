# PMP_ATC

This is a project management application built using the Laravel framework. It aims to provide a comprehensive solution for managing various aspects of project management, including user management, clients, projects, verticals, designations, opportunities, opportunity status, highest education, technologies, project members, and project roles.

# Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)

# Features

The PMP (Project Management Project) in Laravel offers the following features:

* <b>User Management:</b> Allows administrators to manage user accounts, including creating, updating, and deleting users. It includes authentication and authorization mechanisms.
  
* <b>Clients:</b> Enables the creation and management of client profiles, including their contact information and project associations.
Projects: Allows the creation and management of projects, including project details, timelines, and assigned team members.

* <b>Verticals:</b> Provides the ability to define and manage different verticals or industries.
  
* <b>Designations:</b> Allows the definition and management of various designations within the organization.
  
* <b>Opportunities:</b> Enables the management of project opportunities, including their status, associated client, and team members.
  
* <b>Opportunity Status:</b> Provides predefined statuses for project opportunities.
  
* <b>Highest Education:</b> Allows the definition and management of different educational qualifications.
  
* <b>Technologies:</b> Enables the management of different technologies used in projects.
  
* <b>Project Members:</b> Allows the association of team members with specific projects.
  
* <b>Project Roles:</b> Provides predefined roles that team members can have in projects.

# Installation

To install and set up the PMP project locally, follow these steps:

* Clone the repository using the following command
  ```
    git clone https://github.com/MousumiDutta2000/PMP_ATC.git
  ```
  
* Navigate to the project directory:<br>
  ```
    cd PMP_ATC
  ```
  ```
    cd crud
  ```
  
* Install the project dependencies using Composer:<br>
   composer install

* Add .env file to your project
  ```
    cp .env.example .env
  ```
  ```
    php artisan key:generate
  ```
  
* Configure the .env file with your database credentials and other necessary settings.
  
* Run database migrations
  ```
   php artisan migrate
  ```
  
* Start the development server
  ```
   php artisan serve
  ```
  
* Access the application by visiting http://localhost:8000 or http://127.0.0.1:8000 if you are using your own domain http://<your_domain> in your web browser.

# Usage
  Once the installation is complete and the application is running, you can start using the PMP project management application. Here are 
  some general instructions:

* <b>User Management:</b> As an administrator, you can create user accounts, assign roles, and manage their details.
  
* <b>Clients:</b> Add and manage client profiles, including their contact information and project associations.
  
* <b>Projects:</b> Create and manage projects, assign team members, and track project progress.
  
* <b>Verticals:</b> Define and manage different verticals or industries.
  
* <b>Designations:</b> Create and manage various designations within the organization.
  
* <b>Opportunities:</b> Manage project opportunities, including their status, associated clients, and team members.
  
* <b>Opportunity Status:</b> Define and manage predefined statuses for project opportunities.
  
* <b>Highest Education:</b> Create and manage different educational qualifications.
  
* <b>Technologies:</b> Manage the list of technologies required in projects.
  
* <b>Project Members:</b> Associate team members with specific projects and assign roles.
  
* <b>Project Roles:</b> Define and manage predefined roles that team members can have in projects.
  
Please refer to the application's user interface and explore the different sections and features to make full use of the project management capabilities offered by PMP.








 <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).



  
