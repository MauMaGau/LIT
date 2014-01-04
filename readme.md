## LIT - Laravel Initial Tip

LIT intends to provide a solid foundation on top of Laravel to improve rapid development. It aims to include every tool that is always (or almost always) used when developing a standard web app. It is stable, but currently in the early stages of curation.

LIT includes:

* Profiler - https://github.com/loic-sharma/profiler
* Generators - https://github.com/JeffreyWay/Laravel-4-Generators
* Admin area
* Login & forgotten password
* Navbar

HTML/CSS is based around Twitter Bootstrap (loaded by cdn)

JQuery 2.0.3 is also loaded by cdn

AngularJS 1.2.6 is also loaded by cdn, and controlled by **/public/js/app.js**

App.js tells angular to use alternative brackets, to prevent conflicts with the Blade templating engine

_The */vendor/* folder has been removed from .gitignore to allow deploying without running `$ composer install` on the server. You can safely uncomment that line if you wish to prevent this behaviour._

### Installation ###
* git clone this repo down to your machine, then set up your own repo and do:

```
$ git remote rm origin
$ git remote add origin your_new_repo
```

* `$ composer update`
* Set up virtual host & hosts file, & restart Apache (if applicable).
* Check **/bootstrap/start.php** to review environment settings. Change as required.
* Create a database, & set up **app/config/database.php**. Also review **app/config/mail.php**, & **app/config/app.php** (specifically url & key). See also **app/config/[local/staging/production]**.
* `$ php artisan migrate --env=mine` _**--env is required** due to the way we're setting enviroments_
* Start developing :)

### Contributing To LIT
**Contributions & forks are encouraged. The aim of LIT is to create a sturdy foundation for rapid development, without sacrificing production quality. Any feature that is always (or almost always) used in a web project could be added to LIT.**

## Laravel PHP Framework

### Contributing To Laravel

**All issues and pull requests should be filed on the [laravel/framework](http://github.com/laravel/framework) repository.**

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

LIT is licensed as DBAD [Don't be a dick](http://www.dbad-license.org/)