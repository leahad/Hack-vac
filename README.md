# Plan
*A hackathon project*

### Description

This repository was created during a Hackathon.
The theme was: 'create an application about Holidays'.

We developed an application designed for people who don't know where to go in vacation.
The app allows users to select a preferred type of location, such as natural, cultural, night owl, or amusements, and then leaves the decision up to chance! Based on their selection, the app suggests a destination along with a range of activities. Additionally, it provides a helpful checklist to ensure that nothing important is forgotten.

To build this app, we used a MVC framework created by the Wild Code School.
It uses some cool vendors/libraries such as Twig and Grumphp.

You can find a demo of the application [here](https://www.loom.com/share/552be33b5a204860a383781bf42acdcb?sid=2df716b0-46a7-43ca-adea-cdd8c8364fdb).

### Steps

Here are the steps to use the application :
1. Clone the repo from Github.
2. Run `composer install`.
3. Create _config/db.php_ from _config/db.php.dist_ file and add your DB parameters. Don't delete the _.dist_ file, it must be kept.

```php
define('APP_DB_HOST', 'your_db_host');
define('APP_DB_NAME', 'your_db_name');
define('APP_DB_USER', 'your_db_user_wich_is_not_root');
define('APP_DB_PASSWORD', 'your_db_password');
```

4. Import _database.sql_ in your SQL server, you can do it manually or use the _migration.php_ script which will import a _database.sql_ file.
5. Run the internal PHP webserver with `php -S localhost:8000 -t public/`. The option `-t` with `public` as parameter means your localhost will target the `/public` folder.
6. Go to `localhost:8000` with your favorite browser.

### Windows Users

If you develop on Windows, you should edit you git configuration to change your end of line rules with this command :

`git config --global core.autocrlf true`
