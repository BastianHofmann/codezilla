<?php namespace Controllers\Admin;

use BaseController;
use Project;
use View;
use Input;
use Validator;
use Redirect;
use Str;
use File;

class ProjectsController extends BaseController {

	/**
	 * Project Repository
	 *
	 * @var Project
	 */
	protected $project;

	public function __construct(Project $project)
	{
		$this->project = $project;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$projects = $this->project->all();

		return View::make('admin.projects.index', compact('projects'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.projects.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Project::$rules);

		if ($validation->passes())
		{
			$input['slug'] = Str::slug($input['title']);

			$prices = @file_get_contents('http://marketplace.envato.com/api/edge/item-prices:5085356.json');

			$prices = str_replace('item-prices', 'item_prices', $prices);

			$prices = json_decode($prices);
			
			$input['price_regular'] = $prices->item_prices[0]->price;

			$input['price_extended'] = $prices->item_prices[1]->price;

			$this->project->create($input);

			return Redirect::route('admin.projects.index');
		}

		return Redirect::route('admin.projects.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$project = $this->project->findOrFail($id);

		return View::make('admin.projects.show', compact('project'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$project = $this->project->find($id);

		if (is_null($project))
		{
			return Redirect::route('projects.index');
		}

		return View::make('admin.projects.edit', compact('project'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Project::$rules);

		if ($validation->passes())
		{
			$project = $this->project->find($id);
			$project->update($input);

			return Redirect::route('admin.projects.show', $id);
		}

		return Redirect::route('admin.projects.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->project->find($id)->delete();

		return Redirect::route('admin.projects.index');
	}

}