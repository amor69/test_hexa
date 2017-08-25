Hexagonal Architecture with Symfony
=========

Developped by :
* Amor : amor.bounechada@gmail.com
* Alex : apitchen@gmail.com

This simple project that shows how to use a **Hexagonal Architecture** with the **Symfony Framework**.

Installation
-----

`composer install`

This will load everything you need to run this project (symfony, doctrine, tacticianBus) 

Launch the website
------

Once the project cloned on your computer, all you need to do is open your terminal and execute these commands.

`php bin/console doctrine:database:create`

`php bin/console doctrine:schema:update --force`

`php bin/console server:start`

`php bin/console server:start 127.0.0.1:8000`

Then in your web browser go on `localhost:8000/user`

And there it is.

The logic behind it all
------

If you open the project and go to the src directory, you won't see your classic MVC architecture.  
Instead, you have three directories (which I'm sure, you are aware of since you have read so much 
about hexagonal architecture :P) :  
* Domain : The logic of your app. The entities (here only one) and the EntityRpositoryInterface
* Application : Every Command and CommandHandler as well as the Query and QueryHandler
* Infrastructure : Finally, something we know about in `/Bundle`.  
Controllers, Forms, Resources (by the way, we used yml here so don't look for annotations fool)

Anyhow
-----
Hope this helps for some who wanted to see a simple app with **Hexagonal Architecture**  
If not don't hesitate to ask Google or ourselves

And don't forget, every PR is welcome too :)
