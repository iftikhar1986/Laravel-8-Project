Laravel 8 Topics Covered
------------------------

1. Enviornment Setup

2. Installation

3. Folder Structure

4. MVC & its Benifites

5. Route

6. Blade

7. Controller & GET Url Request

8. Middleware

9. Url to Route

10. Create Database & Configration

11. Authentication install (JETSRTEAM)

12. Authentication Details

13. Eloquent ORM Read Users Data

14. Query Builder Read Users Data

15. Create Model And Migration

16. Form Validation & Show Custom Error Message

17. Eloquent ORM Insert Data

18. Insert Data With Query Builder

19. Eloquent ORM Read Data

20. Query Builder Read Data

21. Laravel Pagination

22. Eloquent ORM One To One Relationships

23. Query Builder Join Table

24. Eloquent ORM Edit & Update

25. Query Builder Edit & Update Data

26. Soft Delete ,Data Restore & ForceDelete

27. Setup Brand Page

28. Eloquent ORM Insert Image

29. Eloquent ORM Edit,Update Data With Image & Without Image

30. Delete Data With Image

31. Image Insert & Resize With Intervention Package

32. Multiple Image Upload




=====================================================

UseFull Commends
----------------
Creating Controller
-------------------
php artisan make:controller ContactController

Creating Middleware
-------------------
php artisan make:middleware CheckAge

Authentication install (JETSRTEAM)
----------------------------------
composer require laravel/jetstream

php artisan jetstream:install livewire 

if you got this error(The Mix manifest does not exist. (View: C:\xampp\htdocs\Laravel8\basic\resources\views\layouts\guest.blade.php) http://127.0.0.1:8000/register)

Need to Update Latest Version of Node js

and run this command

npm install webpack-laravel-mix-manifest --save-dev


Migration & Create a table in to database
-----------------------------------------
php artisan migrate

npm install && npm run dev

Creating Model and migrate it
-----------------------------
php artisan make:model Category -m

clone the project 
-----------------
1. download or clone project
2. Go to the folder application using cd
3. Run composer install on your cmd or terminal
4. Copy .env.example file to .env on root folder. 
    You can type copy .env.example .env if using command prompt Windows 
     or cp .env.example .env if using terminal Ubuntu
5. Open your .env file and change the database name (DB_DATABASE)
6. Run php artisan key:generate
7. Run php artisan migrate
8. Run php artisan serve








