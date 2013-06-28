App.Models.Task = Backbone.Model.extend({

    // Default values for a task.
	defaults: {
		title: '',
		completed: 0
	},

	urlRoot: '/api/lists/' + list + '/tasks'
	
});