@extends('layouts.scaffold')

@section('main')

<h1>Show User</h1>

<p>{{ link_to_route('admin.users.index', 'Return to all users') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Name</th>
				<th>Screen_name</th>
				<th>Email</th>
				<th>Password</th>
				<th>Status</th>
				<th>Costumer</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $user->name }}}</td>
					<td>{{{ $user->screen_name }}}</td>
					<td>{{{ $user->email }}}</td>
					<td>{{{ $user->password }}}</td>
					<td>{{{ $user->status }}}</td>
					<td>{{{ $user->costumer }}}</td>
                    <td>{{ link_to_route('admin.users.edit', 'Edit', array($user->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.users.destroy', $user->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop