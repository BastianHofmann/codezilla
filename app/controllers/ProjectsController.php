<?php

use dflydev\markdown\MarkdownParser;

class ProjectsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$title = 'Projects - Codezilla';

		$projects = Project::all();

		return View::make('projects.index', compact('title', 'projects'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if (is_numeric($id))
		{
			$project = Project::find($id);
		}
		else
		{
			$project = Project::where('slug', $id)->first();
		}

		$title = $project->title . ' - Codezilla';

		$markdownFile = 'descriptions/' . $project->slug;

		if ( ! $content = Cache::get(str_replace('/', '_', $markdownFile)))
		{
			if ( ! File::isFile(storage_path() . '/' . $markdownFile . '.md'))
			{
				App::abort(404, 'Page not found');
			}

			$markdownParser = new MarkdownParser();

			if ( ! $content = $markdownParser->transformMarkdown(File::get(storage_path() . '/' . $markdownFile . '.md')))
			{
				App::abort(500, 'Internal server error');
			}
		}

		Cache::put(str_replace('/', '_', $markdownFile), $content, 60);

		// Add prettyprint classes to pre tags
		$content = str_replace('<pre>', '<pre class="prettyprint php">', $content);

		return View::make('projects.show', compact('title', 'projects', 'content'));
	}

	/**
	 * Handle missing methods with 404.
	 *
	 * @param  array  $parameters
	 * @return Response
	 */
	public function missingMethod($parameters)
	{
		App::abort(404);
	}

}