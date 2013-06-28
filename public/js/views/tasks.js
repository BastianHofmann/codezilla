// takes this.collection of type App.Collection.Tasks
App.Views.Tasks = Backbone.View.extend({

	// Root element
	el: $('.tasks-list'),

	initialize: function()
	{
		// If no filter is set go ahead and fetch the tasks
		if (this.filterType === undefined)
		{
			var that = this;

			this.collection.fetch().then(function()
			{
				that.render();
			});
		}

		this.collection.on('add', this.add, this);
		this.collection.on('remove', this.renderCount, this);
		this.collection.on('reset', this.render, this);

		this.on("change:filterType", this.filterByCompleted, this);
	},

	// Render the view for all tasks.
	render: function()
	{
		// Empty the root element
		this.$el.empty();

		this.$el.append('<span class="tasks-length">' + this.collection.length + ' tasks in this list.</span>');
		
		// For each model in the collection call addOne function
		this.collection.each(this.add, this);

		return this;
	},

	// Add each single view to root.
	add: function(task)
	{
		var taskView = new App.Views.Task({ model: task});

		// Append each rendered task view element to the root element of
		// the tasks view
		this.$el.append(taskView.render().el);

		// Fix the count
		this.renderCount();
	},

	renderCount: function()
	{
		this.$el.find('.tasks-length').html(this.collection.length + ' tasks in this list.');	
	},

	// Filter tasks
	filterByCompleted: function()
	{
		// Make new collection and cache some values
		var tasks      = new App.Collections.Tasks(),
			filterType = this.filterType,
			collection = this.collection;

		// Fetch the tasks again and remove acording to the filter
		tasks.fetch().then(function()
		{
			if (filterType === 'all')
			{
				collection.reset(tasks.models);
			}
			else
			{
				var completed = '0';

				if (filterType === 'completed')
				{
					completed = '1';
				}

				collection.reset(tasks.where({ completed: completed }));
			}
		});
	}

});