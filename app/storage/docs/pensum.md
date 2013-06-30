# Pensum - Task Sharing Platform #

<h2 id="Application">Application</h2>

Pemsum is a Laravel & Backbone projects built for you to learn from and play with. Laravel is a modern php framework, which makes it easy to produce simple and readable code. if you are a beginner php with Laravel is the way to go.
Backbone is a MV* javascript libary. MV* means that your code is stuctured into models, views and collections.
If you want to find out more about Backbone check out backbonejs.org. For more information on laravel, head over to laravel.com.

<h2 id="Server">The Server Side</h2>

As mentioned above the server side is written in php, specificly version 5.3, using the Laravel framework.
When you open the project directory, you will see multiple directories. `vendor` and `bootstrap` are part of the framework, for more information refer to the laravel documentation. In the `public` directory everything is stored which should be available via the browser. Obviously `index.php`, but also images, stylesheets and our backbone logic.
The `app` directory holds all files needed to define your project.

<h3 id="Routes">Routes</h3>

Open `routes.php`, this is where all http request are routed to their affiliated controllers. `Route::get()` maps to a GET-Request, while `Route::post()` captures a post request. If you scroll down in routes.php you'll find the routes to the restful API with versioning. The route group without version number should always route to the latest API version.
The last item in `routes.php` is a view composer. This specific one is responsible for feeding the notifications to the navigation view, if the user is logged into the application.

<h3 id="Models">Models</h3>

If you are unfamiliar with the MVC pattern, please checkout this [nettuts article](http://net.tutsplus.com/tutorials/other/mvc-for-noobs/). Basicly models are a representation of the data in your database. Laravel uses a sophisticated ORM called [Eloquent](http://laravel.com/docs/eloquent). As you can see the `app/models` directory holds four models. Each model extends the Eloquent class. The application consists of users, which create tasks within lists, when users change, add or delete tasks, notifications are created.
With Laravel it is very easy to define and use these [relationships](http://laravel.com/docs/eloquent#relationships) between our models.
If you have read the documentation page for relationships, you'll see that it is now very easy to query the database.

<h3 id="Views">Views</h3>

All views for the project are stored within the `views` directory. This is where the `HTML` code is at. Open `show.blade.php` within `lists`. The `.blade.php` extension tells Laravel, that we want to use the blade templating engine. Refer to the [documentation](http://laravel.com/docs/templates#blade-templating) for more information.

    @extends('layouts.master')
    
    @section('content')
    
    ...
    
    @stop

This file is responsible for showing a specific list. On the last lines of the file, we load and initialize the backbone application. More about that later.
Feel free to dig through the views and try to find out what each view does. The `partials` directory features modules which are used multiple time throughout the application, including `navigation.blade.php` mention above.
Open `layouts/master.blade.php` to take a look at the parent, that all child views extend.

<h3 id="Controllers">Controllers</h3>

All controllers of the project are stored inside `controllers`. The controllers handling the json api are stored inside `api`. [Namespaces](http://php.net/manual/de/language.namespaces.php) are used for the api controllers. Namespacing is a great way to structure your applications.
Each controller extends `BaseController`. The BaseController stores functions and properties needed in all child controllers. In this application it is not in use.

<h3 id="Api">Restful Api</h3>

The application features a restful API, which returns the data for the tasks. With Laravel it is very easy to build restful APIs. Check out `routes.php`:

    Route::group(array('prefix' => 'api', 'before' => 'auth.api'), function()
    {
        Route::resource('lists.tasks', 'Api\TasksController');
    });

The function above creates the routes to the resource. Open `http://pensum.codezilla.co/api/lists/1/tasks` in your browser. You will see the json for alls tasks in the list with id `1`. To find the applied logic, open `TasksController.php` in `controllers/Api` and search for the index function.

    public function index($collectionId)
    {
        return Collection::find($collectionId)->tasks()->get();
    }

As you can see, with [Eloquent](http://laravel.com/docs/eloquent) we can simply return the model and it with automatically format the data into json. Note that we use relationships to get all tasks inside a collection.

<h2 id="Client">The Client Side</h2>

For this project the client side is rather javascript heavy. The application sends ajax request to retrieve, create, update or delete tasks. In the past webdevelopers used jquery to write the needed javascript logic, but thankfully there are MV* javascript projects like [Backbone](http://backbonejs.org/) to help structure our code.
Open `public/js` to view the javascript application.

<h3 id="Templates">Templates</h3>

The `HTML` code is stored inside `templates.js`.

    _.templateSettings.interpolate = /\{\{(.*?)\}\}/g;

Note that the code above allows you to use curly braces in a blade like manner for templates. If you want to create a new template simply add a new property to the `Templates` object.

    for (var temp in Templates)
    {
        if (Templates.hasOwnProperty(temp))
        {
            // Actually make them a _.template
            Templates[temp] = _.template(Templates[temp]);
        }
    };

<h3 id="Client">Views</h3>

To start of the application we simply initialize `AppView`, which will fire the `initialize` method.