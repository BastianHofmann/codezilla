// takes this.list of type integer
App.Collections.Tasks = Backbone.Collection.extend({

    // The model for the collection.
	model: App.Models.Task,

    // Url to resource in the API.
	url: '/api/lists/' + list + '/tasks'

});