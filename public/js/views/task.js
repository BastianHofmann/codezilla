// takes this.model of type App.Models.Task
App.Views.Task = Backbone.View.extend({

    // Root element tag name.
	tagName: 'li',

	// Events
    events: {
    	'click .task-text' : 'showDetails',
    	'click .close'     : 'hideDetails',
    	'click .edit'      : 'edit',
    	'click .complete'  : 'complete',
    	'click .title'     : 'edit',
    	'blur .edit-field' : "close",
    	'click .complete'  : 'complete',
    	'click .delete'    : 'delete'
    },

	// Set the task template
	template: Templates.Task,

	initialize: function() {
		this.listenTo(this.model, 'change', this.render);
	},

	// Render a single task.
	render: function()
	{
		// The data sent to the template
		var data = this.model.toJSON();

		// Set the checked attribute
		var checked = '';

		if (this.model.get('completed') == 1)
			checked = 'checked';

		// Add the checked propety to be used in the template
		data.checked = checked;

		// Add relative time
		data.reltime = App.Helpers.RelativeTime(data.created_at);

		// Insert attributes into template
		this.el.innerHTML = this.template(data);

		this.input = this.$('.edit-field');

		return this;
	},

	// Edit the title of a task. 
	edit: function()
	{
		this.$el.addClass("editing");
		this.input.focus();
	},

	// Stop editing the task and save it.
	close: function()
	{
		this.$el.removeClass("editing");

		// Set the title and save the model
		this.model.set('title', this.input.val());
		this.model.save();
	},

	// Change the state of completion.
	complete: function()
	{
		if (this.model.get('completed') == 0)
			this.model.set('completed', 1);
		else
			this.model.set('completed', 0);

		// Because we already set a change listener, the view should
		// Automaticly be rerendered
		this.model.save();
	},

	// Delete the task.
	delete: function(e)
	{
		e.preventDefault();

		this.model.destroy();

		this.$el.remove();
	},

	// Open the task
	showDetails: function()
	{
		$('.open').removeClass('open');

		this.$el.addClass('open');
	},

	// Close the task
	hideDetails: function()
	{
		this.$el.removeClass('open');
	}
});