@extends('layouts.admin')

@section('content')

    {!! Form::open(['method' => 'post', 'action' => 'AdminUsersController@store']) !!}

        {{ csrf_field() }}

        <div class="form-group">

            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}

        </div>

        <div class="form-group">
            {!! Form::submit('Create title', ['class' => 'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}

@stop