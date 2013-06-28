// takes this.collection of type App.Collection.Tasks
App.Views.CreateTask = Backbone.View.extend({

	// Root element by id
	el: '#createTask',

	// Events
    events: {
    	'submit': 'create'
    },

	// Create a new model and add it to the collection.
	create: function(e)
	{
		e.preventDefault();

		var input =  this.$el.find('#taskContent');

		var title = input.val();

		input.val('');

		var task = new App.Models.Task({ title: title });

		var that = this;

		// Save the added task to the database
		task.save().then(function()
		{
			that.collection.add(task);
		});
	}

});