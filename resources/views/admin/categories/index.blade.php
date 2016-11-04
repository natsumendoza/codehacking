@extends('layouts.admin')

@section('content')

    @if (Session::has('action_feedback'))

        <p class="{{session('action_class')}}">{{session('action_feedback')}}</p>

    @endif

    <h1>Categories</h1>

    <div class="row">
        <div class="col-sm-6">
            {!! Form::open(['method' => 'post', 'action' => 'AdminCategoriesController@store']) !!}

            {{ csrf_field() }}

            <div class="form-group">

                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}

            </div>

            <div class="form-group">
                {!! Form::submit('Create Category', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>

        <div class="col-sm-6">

            @if($categories)
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Created Date</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
                            <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'No date'}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            @endif

        </div>
    </div>

    <div class="row">
        @include('includes.form-error')
    </div>

@stop