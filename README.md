## Requirement

1. Composer 
https://getcomposer.org/download/

2. Git
https://git-scm.com/downloads

3. NodeJS (Optional)
https://nodejs.org/en/


## How to use

- Clone the repository with __git clone https://github.com/eci4ever/minitc.git__
- Copy __.env.example__ file to __.env__ and (edit database credentials there)
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate --seed__ (it has some seeded data for your testing)
- Run __php artisan storage:link__
- That's it: launch the main URL or go to __/login__ and login with default credentials __admin@local.com__ - __password__
- Run __php artisan serve__ (This is running in development mode)
