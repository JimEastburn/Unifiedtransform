---
description: Initial setup of the Unifiedtransform project using Docker
---

1. Clone or download the repository.
2. Create **purify** folder in `storage/app/` directory.
3. Run `cp .env.example .env`.
4. Run `docker-compose up -d`.
5. Run `docker exec -it db sh`. Inside the shell, run:
    ```sh
    mysql -u root -p
    ```
    Use the root password defined in `docker-compose.yml`. Then run:
    ```sql
    SHOW DATABASES;
    GRANT ALL ON unifiedtransform.* TO 'unifiedtransform'@'%' IDENTIFIED BY 'secret';
    FLUSH PRIVILEGES;
    EXIT;
    ```
6. Exit the DB container shell.
7. Run `docker exec -it app sh`. Inside the shell, run:
    ```sh
    composer install
    php artisan key:generate
    php artisan config:cache
    php artisan migrate:fresh --seed
    ```
8. Visit **http://localhost:8080**.
