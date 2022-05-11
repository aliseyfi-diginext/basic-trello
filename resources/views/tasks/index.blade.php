@extends('layouts.main')

@section('head')
    <title> Tasks </title>
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1> Manage Tasks </h1>
        <a href="{{route('tasks.create')}}" class="btn btn-info"> + Create New Task </a>
    </div>
    <hr>
    <form class="row align-items-end" action="{{route('cats.store')}}" method="post">
        @csrf
        <div class="col-md-9">
            <label class="mb-1"> Category Name </label>
            <input type="text" name="name" value="" class="form-control">
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-primary"> Submit </button>
        </div>
    </form>

    <hr>

    <div class="d-flex">
        @foreach ($cats as $cat)
            <div class="card mx-1">
                <div class="card-header">
                    <h5> {{$cat->name}} </h5>
                </div>
                <div class="card-body p-2">
                    @foreach ($tasks[$cat->id] as $task)
                        <div class="alert alert-info p-2">
                            <p class="m-0"> {{$task->title}} </p>
                            @if ($task->user)
                                <div class="text-center">
                                    <span class="badge bg-light text-dark">{{$task->user->name}}</span>
                                </div>
                            @endif
                            <hr>
                            <a href="{{route('tasks.edit', $task)}}" class="btn btn-outline-success btn-sm"> Edit </a>
                            <form class="d-inline" action="{{route('tasks.destroy', $task)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?');"> Delete </button>
                            </form>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer">
                    Edit Category, Delete Category
                </div>
            </div>
        @endforeach
    </div>

    {{-- <table class="table">
        <thead>
            <th> # </th>
            <th> Title </th>
            <th> Assigned To </th>
            <th> Description </th>
            <th> Date </th>
            <th colspan="2"> Action </th>
        </thead>
        <tbody>
            @foreach ($tasks as $key => $task)
                <tr>
                    <th> {{$key+1}} </th>
                    <td> {{$task->title}} </td>
                    <td>
                        @if ($task->user)
                            <span class="badge bg-info">{{$task->user->name}}</span>
                        @else
                            <em> [user not found] </em>
                        @endif
                    </td>
                    <td> {{$task->description}} </td>
                    <td> {{$task->created_at->format('Y-m-d H:i')}} </td>
                    <td>
                        <a href="{{route('tasks.edit', $task)}}" class="btn btn-success"> Edit </a>
                    </td>
                    <td>
                        <form action="{{route('tasks.destroy', $task)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?');"> Delete </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}

@endsection
