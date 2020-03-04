# Email registration

1. Create your data base

2. Configure the `.env` file.

Example:
````
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=emailService
DB_USERNAME=root
DB_PASSWORD=12345678
````

3. Run in the Terminal

``
php artisan migrate:refresh --seed
``
