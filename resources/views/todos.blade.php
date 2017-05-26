@extends('layout')
@section('content')
<div class="row">
  <div class="col-lg-6 col-lg-offset-3">
    <form action="/create/todo" method="post">
      {{csrf_field()}}
      <input type="text" class="form-control input-lg" name="todo" placeholder="Create a new todo">
    </form>
  </div>
</div>
<hr>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
           @foreach($todos as $todo)
           {{$todo->todo}}
           <a href="{{ route('todo.delete', ['id' => $todo->id]) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
           <a href="{{ route('todo.update', ['id' => $todo->id]) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
           @if(!$todo->completed)
           <a href="{{  route('todos.completed', ['id' => $todo->id]) }}" class="btn btn-success btn-xs">Mark as completed</a>
           @else
           <span class="text-success">Completed!</span>
           @endif
           <hr>
           @endforeach
        </div>
    </div>
</div>
@stop
