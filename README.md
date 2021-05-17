## Project Overview
Simple invoice viewer apps, where user can find, edit, and update invoice data.

Created using Laravel 7, Bootstrap 4.6, and a little magic.

## How to use
1. Run "composer install" and "npm install".
2. Copy the ".env.example" file, and rename it to ".env".
3. Run "php artisan key:generate".
4. Configure the database connection (MySQL) inside the ".env" file.
5. Run "php artisan migrate".
6. Import the "invoice.sql" file after migrating the schema.
7. Run "php artisan serve".

## Feature
1. View invoice detail using invoice number (invoice id).
2. Edit the invoice detail, and calculate the courier fee directly when selecting the courier name.
3. Save directly to the corresponding table.
