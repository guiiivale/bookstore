## Laravel Project Installation
This project was built using Laravel 9.x, a PHP framework for web applications. To install it, follow the steps below:

## Prerequisites
- PHP version 8.1 
- Composer
- MySQL or another database compatible with Laravel

## Step 1: Clone the repository
Clone the repository to your local machine by running the following command in your terminal:

git clone https://github.com/guiiivale/bookstore.git

## Step 2: Install dependencies
Navigate to the project directory and run the following command to install the necessary dependencies:

- composer install

## Step 3: Set up the environment
Rename the .env.example file to .env and fill in the necessary environment variables, such as the database connection settings.

## Step 4: Generate an app key
Generate an app key by running the following command:

- php artisan key:generate

## Step 5: Run migrations
Run the following command to create the necessary tables in the database:

- php artisan migrate

## Step 6: Run seeders
Run the following command to fill the table with some data:
- php artisan db:seed

## Step 7: Start the development server
Run the following command to start the development server:

- php artisan serve
The application should now be accessible at http://localhost:8000.

## Step 8: Read the documentation:

 - Documentation: https://documenter.getpostman.com/view/18539430/2s8ZDX4Nkk

## Note
You may want to make sure you have a .env file in your root directory with the necessary configuration for your application to connect to the database before running the migration command.

To run tests you can use some of the following softwares:
- Postman.
- Insomnia.
