# A simple Twitter like web application built with Laravel

# Prerequisites

- PHP (^7.4.3)
- NPM (^6.14.4)
- Composer (^1.10.1)
- PostgreSQL (^12.4)

# User stories

|Story|Acceptance criteria|Week|Status|
|---|---|---|---|
|As a guest I can see tweets but can't do anything with them.|The home page (which is the tweets) can be viewed by everyone. Make sure to use multiple pages because of the size of the tweets|Sprint 1|DONE|
|As a guest I would like to log in and also register|Simple authentication system with 2 roles (guest, user)|Sprint 1|DONE|
|As a user I can see my own and others profile page|Create a simple route with /my-page or similar|Sprint 1|DONE|
|As a user I can create and see my own tweets|Users can create tweets via a simple form and list it on their profile page|Sprint 2|DONE|
|As a user I can edit/delete my own tweets|Let users to be able to edit/remove their tweets|Sprint 2|DONE|
|As a user I can comment below tweets|Create a simple comments div under the tweet|Sprint 2|DONE|
|As a user I can edit comments smoothly|Make possible for the user to edit their own comments using AJAX|Sprint 3|TODO|

# Installation

1. First, you have to install both `npm` and `composer` dependencies.

In the main directory:

```
npm i
composer i
```

2. Then you have to create a `.env` file based on `.env.example`.

3. After that you have to generate a **key** for the application with the following command:

```
php artisan key:generate
```

4. It is necessary to configure the database in `.env` too (PostgreSQL by default)
    - Log in to postgres via **psql** (or use PgAdmin) with an arbitrary user (default is *postgres*)
    ```
    psql -U postgres
    ```
    - Then:
    ```sql
    create database "tweetcool-laravel";
    ```
    - Now we have to **migrate** the application's database schema to **pgsql** with `php artisan migrate`

## Basic public routes

- "/" - Home page where
    - guests can log in or register an account via the `/login` and register `/routes`
    - users can view the global feed
- /login - Login page
- /register - Register page
- /profile/{id} - The users profile page
