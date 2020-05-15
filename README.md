## How to use

- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate --seed__ (it has some seeded data for your testing)
- Run __php artisan storage:link__
- That's it: launch the main URL or go to __/login__ and login with default credentials __admin@local.com__ - __password__
