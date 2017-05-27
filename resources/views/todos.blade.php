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
      @if(Session::has('success'))
      <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Cool!</strong> {{ Session::get('success') }}
      </div>
      @endif
        <div class="title m-b-md">
           @foreach($todos as $todo)
           @if(!$todo->completed)
           {{$todo->todo}}
           @else
           <del>{{$todo->todo}}</del>
           @endif
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
