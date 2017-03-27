@extends('layouts.app')


@section('content')

    <div class="panel-body">

        <form action="/tasks/{{$task->id}}" method="POST" class="form-horizontal">

        {{ method_field('PATCH')}}
        {{ csrf_field() }}
        <!-- Task Name -->
            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">Edit Task</label>

                <div class="col-sm-6">
                    <textarea class="form-control" name="name" id="task-name" >{{$task->name}}</textarea>
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary pull-right">
                        <i class="fa fa-plus"></i> Update Task
                    </button>
                </div>
                <div class="col-sm-offset-3 col-sm-6">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </div>
                    @endif
                </div>


            </div>

        </form>

    </div>



@endsection