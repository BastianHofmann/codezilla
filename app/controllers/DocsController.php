<?php

use dflydev\markdown\MarkdownParser;

class DocsController extends BaseController {

	/**
	 * Show a specific documentation
	 *
	 * @param  string  $item
	 * @return View
	 */
	public function index($item = null)
	{
		$title = ucfirst($item) . ' Documentation - Codezilla';

		if ( ! $item)
		{
			$comments = false;

			$markdownFile = '/docs/home';

			$title = 'Docs - Codezilla';
		}
		else
		{
			$file = '/docs/' . $item;

			$markdownFile = rtrim($file, '/');
		}

		if ( ! $content = Cache::get(str_replace('/', '_', $markdownFile)))
		{
			if ( ! File::isFile(storage_path() . $markdownFile . '.md'))
			{
				App::abort(404, 'Page not found');
			}

			$markdownParser = new MarkdownParser();

			if ( ! $content = $markdownParser->transformMarkdown(File::get(storage_path() . '/' . $markdownFile . '.md')))
			{
				App::abort(500, 'Internal server error');
			}
		}

		// Cache::put(str_replace('/', '_', $markdownFile), $content, 60);

		// Add prettyprint classes to pre tags
		$content = str_replace('<pre>', '<pre class="prettyprint php">', $content);

		return View::make('main.doc', compact('title', 'content'));
	}

}