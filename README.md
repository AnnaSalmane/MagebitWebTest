# Magebit_Test

Test task for Junior Web developer vacancy at Magebit

## Technologies

Project created with:

- HTML
- SCSS
- VUE.js
- PHP
- MySQL

## How to run locally:

1. Install web-server on your computer and run it. I use MAMP ;
2. Clone project repository inside servers web folder: `git clone https://github.com/AnnaSalmane/Magebit_Test.git` ;
   3.Create a MySQL database with the structure:

```php
CREATE DATABASE myusers;
```

```php
CREATE TABLE `users` (
  `id` int(11) AUTO_INCREMEN,
  `email` varchar(100),
  `checkbox` varchar(2),
  `date` datetime CURRENT_TIMESTAMP
)
```

4. Go to project `classes` to file `dbh.class.php ` and change this `private $host = "localhost:3306"; private $user = "root"; private $pwd = "root"; `
5. After this you can run project at local server.
