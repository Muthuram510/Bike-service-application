
## Base Code installation

- Run the command: composer install.
- If vite related error throws during installation, Run
  - npm install
  - npm run dev
  - npm run build
- Create a database or use the existing database and configure the database connection in the environment file.
- Execute the command: php artisan migrate.
- Run the command: php artisan db:seed
- Log in using the admin credentials.
  - Email: admin@mallow-tech.com
  - Password: password123

## Note
- When adding a new user, the password will not be asked. Instead, the default password will be set to "password123".
