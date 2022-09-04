# Gup: Android Realtime Chatting App Backend

<a href="https://github.com/zeeshanali-k/Gup">Gup Android App Link</a>

Technologies:
<p>
Laravel
<a href="https://beyondco.de/docs/laravel-websockets/getting-started/introduction">Laravel Websockets</a> for Realtime chatting
</p>
<h3>How to run:</h3>
Installing Dependencies: composer install

To run Laravel project use: php artisan serv --host <your-local-ip-here> 
e.g: php artisan serv --host 192.168.1.1
You need to start it this way so your android app can easily access otherwise you can just run: php artisan serve

<p>To run laravel websockets use: php artisan websockets:serve</p>
<p>but you have you run few migrations before this which you can find on documentation in installation section.</p>
Further you can read about <a href="https://beyondco.de/docs/laravel-websockets/getting-started/introduction">Laravel Websockets from documentation</a>
