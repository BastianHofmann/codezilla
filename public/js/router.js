// takes this.view of type App.Views.Tasks
App.Router = Backbone.Router.extend({

	routes: {
		'all': 'showAll',
		'completed': 'showComplete',
		'uncompleted': 'showUncomplete'
	},

	showAll: function()
	{
		this.view.filterType = 'all';
		this.view.trigger("change:filterType");
	},

	showComplete: function()
	{
		this.view.filterType = 'completed';
		this.view.trigger("change:filterType");
	},

	showUncomplete: function()
	{
		this.view.filterType = 'uncompleted';
		this.view.trigger("change:filterType");
	}
});