@extends('layouts.scaffold')

@section('main')

<h1>Create User</h1>

{{ Form::open(array('route' => 'admin.users.store')) }}
    <ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('screen_name', 'Screen_name:') }}
            {{ Form::text('screen_name') }}
        </li>

        <li>
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email') }}
        </li>

        <li>
            {{ Form::label('password', 'Password:') }}
            {{ Form::text('password') }}
        </li>

        <li>
            {{ Form::label('status', 'Status:') }}
            {{ Form::input('number', 'status') }}
        </li>

        <li>
            {{ Form::label('costumer', 'Costumer:') }}
            {{ Form::checkbox('costumer') }}
        </li>

        <li>
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop


