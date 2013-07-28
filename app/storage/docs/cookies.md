# Cookie Handler #

This package provides a dead simple API for handling cookies. Using the `Cookie` class you can make static calls to handle cookies. The package uses strong encryption to store your cookies savely. Event binding is also a included feature that might come in handy, if you want to add functionallity to your cookies. I could not find a more advanced cookie handler.

<h2 id="installation">Installation</h2>

If you have some kind of framework that loads classes automatically, drop the classes in the libary.

    require 'lib/load.php';

Requiring `load.php` will include all classes necessary. Add this at the top of your php file as shown in `index.php`.

<h2 id="set-cookie">Set a Cookie</h2>

    Cookie::set('key', 'this is a test value', 10);

To set a cookie call the `set()` method. You need to set a key, the value and the time until the cookie expires in minutes.

<h2 id="get-cookie">Get a Cookie</h2>

    Cookie::get('key');

This method will return the value of a cookie. You can also set a default value if the cookie does not exist.

<h2 id="expire-cookie">Expire a Cookie</h2>

    Cookie::destroy('key');

<h2 id="default-values">Default Values</h2>

    Cookie::get('notfound', 'this is a default value');

You can also use a closure to get a default value.

Cookie::get('alsonotfound', function()
{
	// You could fetch the default value from a database
	return 'Default';
});

<h2 id="check-cookies">Check Cookie</h2>

    Cookie::check('key')

Will return a boolean value if the cookie exists or not.

<h2 id="event-binding">Event Binding</h2>

The cookie handler includes an event handler. Similar to the [Event Subscribtion Handler](http://codecanyon.net/item/event-subscribtion-handler/5123634 "Event Handler created by codezilla") also created by myself.

    Cookie::bind('key.destroy', function()
    {
        echo 'Cookie has been destroyed';
    });

The first parameter should be the cookie's key followed by `.destroy`, `.get` or `.set`. `clear` will fire when the clear method is called. Check the [Event Handler Documentation](http://codezilla.co/docs/events "Codezilla - Event Documentation") for more information on how to specify callbacks and more.

    Cookie::unbind('key.destroy');

This will remove the callback.

<h2 id="immortal-cookies">Immortal Cookies</h2>

    Cookie::immortal('key', 'this will be here for a very long time');

The `immortal()` method will store the cookie for 5 years.

<h2 id="delete-all-cookies">Delete All Cookies</h2>

    Cookie::clear();

Will also expire immortal cookies.