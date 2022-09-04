# Gup: Android Realtime Chatting App Backend

<a href="https://github.com/zeeshanali-k/Gup">Gup Android App Link</a>

Technologies:
<p>
Laravel<br>
<a href="https://beyondco.de/docs/laravel-websockets/getting-started/introduction">Laravel Websockets</a> for Realtime chatting
</p>
<h2>How to run:</h2>
Installing Dependencies: composer install

<p>To run Laravel project use: php artisan serv --host your-local-ip-here </p>
e.g: php artisan serv --host 192.168.1.1
<p>You need to start it this way so your android app can easily access otherwise you can just run: php artisan serve<p>

<p>To run laravel websockets use: php artisan websockets:serve</p>
<p>But you have to run few migration and config commands before this which you can find on documentation in installation section.</p>
Further you can read about <a href="https://beyondco.de/docs/laravel-websockets/getting-started/introduction">Laravel Websockets from documentation</a>
