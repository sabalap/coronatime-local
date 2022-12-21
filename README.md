<div style="display:flex; align-items: center">
  <img src="readme/assets/logo-readme.png" alt="drawing" width="100" style="margin-right: 20px" />
  <h1 style="position:relative; top: -6px" >Coronatime</h1>
</div>
<p>
Coronatime is website where you can register and authorization to see information about corona, new cases, recovered and deaths.
website has search input where you can search information about corona by country. website also has filtering by descedent or ascedent.
</p>

### Prerequisites

-   <img src="readme/assets/php.svg" width="35" style="position: relative; top: 4px" > *PHP@7.2 and up*
-   <img src="readme/assets/mysql.png" width="35" style="position: relative; top: 4px" /> _MYSQL@8 and up_
-   <img src="readme/assets/npm.png" width="35" style="position: relative; top: 4px" /> _npm@6 and up_
-   <img src="readme/assets/composer.png" width="35" style="position: relative; top: 6px" /> _composer@2 and up_

### Tech Stack

<ul>
<li>
* <img src="readme/assets/laravel.png" height="18" style="position: relative; top: 4px" /> [Laravel@6.x](https://laravel.com/docs/6.x) - back-end framework
</li>
<li>
* <img src="readme/assets/spatie.png" height="19" style="position: relative; top: 4px" /> [Spatie Translatable](https://github.com/spatie/laravel-translatable) - package for translation
</li>
</ul>

<h2>Getting Started</h2>
<h3>1. First of all you need to clone coronatime from github:</h3>
<p>git clone https://github.com/RedberryInternship/sabalap-coronatime.git</p>
<h3>2. Next step requires you to run composer install in order to install all the dependencies.</h3>
<p>composer install</p>
<h3>3. after you have installed all the PHP dependencies, it's time to install all the JS dependencies:</h3>
<p>npm install </p>
<p>and also:</p>
<p>npm run dev</p>
<h3>4. Now we need to set our env file. Go to the root of your project and execute this command.</h3>
<p>cp .env.example .env</p>

<h3>And now you should provide .env file all the necessary environment variables</h3>

<h3>after setting up .env file, execute:</h3>
<p>php artisan config:cache</p>

<h3>5. Now execute in the root of you project following:</h3>
 <p>php artisan key:generate</p>
 <p>Which generates auth key.</p>

 <h3>Migration</h3>
 <h3>if you've completed getting started section, then migrating database if fairly simple process, just execute:</h3>
 <p>php artisan migrate</p>

 <h1>Development</h1>
<h3>You can run Laravel's built-in development server by executing:</h3>
<p>php artisan serve</p>
<h3>when working on JS you may run:</h3>
<p>npm run dev</p>

<h3>drawSql Database diagram</h3>
<a href="https://drawsql.app/teams/redberry-24/diagrams/coronatime">
drawsql Diagram
</a>
