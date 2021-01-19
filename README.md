#### Get this project

- Clone the project.
    ```
        git clone https://github.com/mohamed37/on-school.git
    ```
- Go to the folder application using `cd school` command on your cmd or terminal
- Run `composer install` on your cmd or terminal.
- Copy `.env.example` file to `.env` on the root folder.
- In `.env` change `DB_DATABASE=laravel` to `DB_DATABASE=school`.
- Create `school` database in phpmyadmin.
- Goto `school\vendor\mcamara\laravel-localization\src\Mcamara\LaravelLocalization\LaravelLocalization.php` to add this code.
    ```
        /**
         * Returns current locale name.
         *
         * @return string current flag name
         */
        public function getCurrentFlagName()
        {
            return $this->supportedLocales[$this->getCurrentLocale()]['flag'];
        }
    ```
- Run `php artisan key:generate`.
- Run `php artisan migrate --seed`.
- Run `php artisan serve`.
