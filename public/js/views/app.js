// takes this.list of type integer
var AppView = Backbone.View.extend({

	initialize: function()
	{
		var tasks      = new App.Collections.Tasks(),
			createTask = new App.Views.CreateTask({ collection: tasks }),
			tasksView  = new App.Views.Tasks({ collection: tasks });

		// Start routing
		var router = new App.Router();
		router.view = tasksView;

		Backbone.history.start();

		// Something like this could automaticly update tasks as they come in
		// setInterval(function() {
		// 	tasks.fetch();
		// }, 1000);
    }

});