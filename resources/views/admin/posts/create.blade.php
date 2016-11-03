@extends('layouts.admin')

@section('content')

    <h1>Create Posts</h1>

    <div class="row">
        {!! Form::open(['method' => 'post', 'action' => 'AdminPostsController@store', 'files' => true]) !!}

        {{ csrf_field() }}

        <div class="form-group">

            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}

        </div>

        <div class="form-group">

            {!! Form::label('category_id', 'Category:') !!}
            {!! Form::select('category_id', [0 => 'Choose Categories'] + $categories, null, ['class' => 'form-control']) !!}

        </div>

        <div class="form-group">

            {!! Form::label('photo_id', 'Photo:') !!}
            {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}

        </div>

        <div class="form-group">

            {!! Form::label('body', 'Description:') !!}
            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

        </div>

        <div class="form-group">
            {!! Form::submit('Create title', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>

    <div class="row">
        @include('includes.form-error')
    </div>

@stop