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
    <table class="table">
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
    </table>

@endsection
