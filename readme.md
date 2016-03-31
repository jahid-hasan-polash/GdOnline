Hello..

This is a project for my Database Lab course. 

To run this project please follow the following instructions

1. First of all you should have composer installed in your machine. If its not already installed go to this link https://laravel.com/docs/4.2/installation#install-composer and install composer.

2. Project need a database named GdOnline in localhost. So make sure you have a database named so.
 You can always change the database name, server name and password in GdOnline/app/config/database.php directory.

3. For server name and password go to GdOnline/app/config/database.php directory and edit your server environment.

4. Open command window in the project directory (/Github/GdOnline) and run command
	:: php artisan migrate

5. After completion run command
	:: php artisan serve

6. And you are good to go. :) Go to http://localhost:8000 

7. A default user is set for testing. email: polash@gmail.com password: 12345
8. To enter admin facility login with email: superadmin@mail.com password: 12345
9. After logged in as super admin you can create admins of level 1/2/3. :)

Thanks a lot. 
