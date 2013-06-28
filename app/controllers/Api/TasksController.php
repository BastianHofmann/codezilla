<?php namespace Api;

use Task;
use Collection;
use Response;
use Input;
use Validator;
use Auth;

class TasksController extends ApiController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($collectionId)
    {
        return Collection::find($collectionId)->tasks()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($collectionId)
    {
        if (Auth::guest())
		{
			return Response::json(array('error' => true, 'status' => 401, 'message' => 'You are not logged in.'), 401);
		}

        $inputs = Input::all();

        $rules = array('title' => 'required', 'completed' => 'required');

        $validator = Validator::make($inputs, $rules);

        if ($validator->fails())
        {
            return Response::json(array('error' => true, 'status' => 400, 'message' => 'A title is required.'), 400);
        }

        $list = Collection::find($collectionId);

        if ( ! is_null($list))
        {
            $task = new Task;

            $task->title = $inputs['title'];

            $task->completed = $inputs['completed'];

			$this->createNotifications($list, 'add');

            return $list->tasks()->save($task);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($collectionId, $taskId)
    {
       return Task::find($taskId);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($collectionId, $taskId)
    {
		if (Auth::guest())
		{
			return Response::json(array('error' => true, 'status' => 401, 'message' => 'You are not logged in.'), 401);
		}

		$inputs = Input::all();

		$task = Task::find($taskId);

		$list = Collection::find($collectionId);

		if ( ! is_null($task))
		{
			if (isset($inputs['title']))
			{
				$task->title = $inputs['title'];

				if ($task->title != $inputs['title'])
                {
                    $this->createNotifications($list, 'change');
                }
			}

			if (isset($inputs['completed']))
			{
				$task->completed = $inputs['completed'];

                if ($task->completed != $inputs['completed'])
                {
    				if ($inputs['completed'] == 1)
    				{
    					$this->createNotifications($list, 'complete');
    				}
    				else
    				{
    					$this->createNotifications($list, 'open');
    				}
                }
			}

			$task->save();
		}
		else
		{
			return Response::json(array('error' => true, 'status' => 404, 'message' => 'Task not found.'), 404);
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($collectionId, $taskId)
    {
        if (Auth::guest())
		{
			return Response::json(array('error' => true, 'status' => 401, 'message' => 'You are not logged in.'), 401);
		}

        $list = Collection::find($collectionId);

        $this->createNotifications($list, 'delete');
        
        Task::find($taskId)->delete();
    }

}