@extends('layouts.main')

@section('head')
    <title> New Task </title>
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1> Create Task Form </h1>
        <a href="{{route('tasks.index')}}"> Back </a>
    </div>
    <hr>
    <form class="row" action="{{isset($task) ? route('tasks.update', $task) : route('tasks.store')}}" method="post">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="col-md-4 my-2">
            <label class="mb-1"> Title </label>
            <input type="text" name="title" class="form-control" value="{{$task->title ?? null}}">
        </div>
        <div class="col-md-4 my-2">
            <label class="mb-1"> Assign To </label>
            <select class="form-control" name="user_id">
                <option value=""> -- Please Choose -- </option>
                @foreach ($users as $user)
                    <option value="{{$user->id}}" @if(isset($task) && $task->user_id == $user->id) selected @endif>
                        {{$user->name}} ({{$user->email}})
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4 my-2">
            <label class="mb-1"> Choose Category </label>
            <select class="form-control" name="cat_id">
                <option value=""> -- Please Choose -- </option>
                @foreach ($cats as $cat)
                    <option value="{{$cat->id}}" @if(isset($task) && $task->cat_id == $cat->id) selected @endif>
                        {{$cat->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-12 my-2">
            <label class="mb-1"> Description </label>
            <textarea name="description" rows="4" class="form-control">{{$task->description ?? null}}</textarea>
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-primary"> Save </button>
        </div>
    </form>
@endsection
