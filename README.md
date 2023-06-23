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
 


  
