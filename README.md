# Laravel Testing Beginner Level: PHPUnit, Pest, TDD

Laravel Offical : https://laravel.com/docs/10.x/testing


* Author: Divesh Kumar
* Twitter: [@divesh20july](https://twitter.com/divesh20july)

# Overview
* How to setup and run tests in Laravel
* Difference between Feature and Unit tests
* How to test authentication/authorization
* How to use Factories to fake data
* How to test APIs and JSON
* How to use PEST for testing
* TDD approach\
  ... and more.

```php
//Artisan command to run test.
php artisan test
```

```php
//Artisan command to create new test.
php artisan make:test ProductTest
```
# Seperate Database for Testing
* Currently using memory for records.
* Uncomment following two lines in phpunit.xml

        <env name="DB_CONNECTION" value="sqlite"/>
         <env name="DB_DATABASE" value=":memory:"/>

* Now it uses Sqlite connection and memory db.
* Use Following traits in test file for database migration.
* use Illuminate\Foundation\Testing\RefreshDatabase;
* NOTE : Use it carefully if you uses it in your main database all data will be deleted.

* Other way create a new file name it .env.testing and copy and paste .env file data in it.
 Modify:
  DB_CONNECTION=sqlite
  DB_DATABASE=:memory:

  Unit Vs Automated Testing.
  https://softwareengineering.stackexchange.com/questions/404319/unit-tests-vs-automation-testing

  ![881ac8e6-f7a1-4745-99ba-c471ebefb0ab](https://github.com/DiveshR/Basic-Testing-PHPUnit-Pest-TDD/assets/25860707/670f38a1-edf3-4745-a872-9f9cae009647)


  

