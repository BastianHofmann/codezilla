<?php namespace Controllers\Admin;

use BaseController;
use User;
use View;
use Input;
use Validator;
use Redirect;

class UsersController extends BaseController {

    /**
     * User Repository
     *
     * @var User
     */
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = $this->user->all();

        return View::make('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();

        $validation = Validator::make($input, User::$rules);

        if ($validation->passes())
        {
            $user = new $this->user;

            $user->screen_name = $input['screen_name'];

            $user->name = $input['name'];

            $user->email = $input['email'];

            $user->password = $input['password'];

            $user->status = $input['status'];

            $user->costumer = $input['costumer'];

            $user->save();

            return Redirect::route('admin.users.index');
        }

        return Redirect::route('admin.users.create')
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
        $user = $this->user->findOrFail($id);

        return View::make('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->user->find($id);

        if (is_null($user))
        {
            return Redirect::route('admin.users.index');
        }

        return View::make('admin.users.edit', compact('user'));
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

        $validation = Validator::make($input, User::$rules);

        if ($validation->passes())
        {
            $user = $this->user->find($id);

            $user->screen_name = $input['screen_name'];

            $user->name = $input['name'];

            $user->email = $input['email'];

            $user->password = $input['password'];

            $user->status = $input['status'];

            $user->costumer = $input['costumer'];

            $user->save();

            return Redirect::route('admin.users.show', $id);
        }

        return Redirect::route('admin.users.edit', $id)
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
        $this->user->find($id)->delete();

        return Redirect::route('admin.users.index');
    }

}