_.templateSettings.interpolate = /\{\{(.*?)\}\}/g;

var Templates = {};

Templates.Task = [
	'<div class="check-complete">',
		'<input type="checkbox" id="complete-{{ title }}" class="complete" {{ checked }}>',
		'<label for="complete-{{ title }}"></label>',
	'</div>',
	'<div class="task-content">',
		'<div class="task-text">',
			'<span class="title">{{ title }}</span>',
			'<input class="edit-field" type="text" value="{{ title }}" onfocus="this.value = this.value;">',
			'<a href="#" class="delete">delete</a>',
		'</div>',
		'<div class="details clearfix">',
			'<span class="time">{{ reltime }} ago</span>',
			'<div class="actions">',
				'<span class="close">close</span>',
				'<span class="edit">edit</span>',
				'<span class="complete">complete</span>',
			'</div>',
		'</div>',
	'</div>',
].join('');

for (var temp in Templates)
{
	if (Templates.hasOwnProperty(temp))
	{
		// Actually make them a _.template
		Templates[temp] = _.template(Templates[temp]);
	}
};