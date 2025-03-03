# Welcome to WiseJobs!

Please follow the steps below to run this application on your local server.

## 1. Install PHP and Composer

If you don't have **PHP** or **Composer** installed, please head over to the official Laravel installation guide at https://laravel.com/docs/11.x/installation and follow the installation steps for PHP and Composer locally.

## 2. Clone the repository

Clone the repository to your local machine using the following command:

```
git clone https://github.com/OmarAbouzeid95/full-stack-challenge.git .
```
# 3. Copy the .env file and generate the Artisan key

Run the following command to copy the .env.example file to .env and generate the application key:

```
cp .env.example .env
php artisan key:generate

```

# 4. Run the migrations

Next, run the migrations to create the required database tables. This will prompt you to create an SQLite database, hit Yes when asked.

```
php artisan migrate
```

# 5. Seed the database

Now, seed the database with the required data by running the following commands:

```
php artisan db:seed --class=CompanySeeder
php artisan db:seed --class=JobPostingSeeder

```

# 6. Install dependencies

Install both the PHP and frontend dependencies by running the following commands:


```
composer install
npm install

```

# 7. Run the development server

Finally, start the development servers in different terminal windows for HMR:


```
npm run dev
php artisan serve

```

Voila!

That's it! The application should now be up and running on your local environment.

