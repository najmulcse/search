@extends('layouts.app')



@section('content')

    <div class="row">

        <div class="col-sm-2">

        </div>
        <div class="col-sm-6">


                    <div style="height: 590px">
                        <h2>{{$user->name}}</h2>
                       <div style="height: 300px ; overflow: auto; " >

                         <div class="panel-body">

                            <table class="table table-striped task-table">

                                <!-- Table Headings -->
                                <thead>


                                </thead>

                                <!-- Table Body -->
                                <tbody>
                                <!-- receiver Body -->
                                @foreach ($receiver as $receive)
                                    <tr>

                                        <!-- Task Name -->
                                        <td class="table-text">
                                            <div class="pull-left">{{$receive->message}}</div>
                                        </td>

                                        <!-- TODO: Delete Button -->
                                        <td>

                                        </td>
                                    </tr>
                                @endforeach


                                @foreach ($chats as $chat)
                                    <tr>
                                        <td>

                                        </td>
                                        <!-- Task Name -->
                                        <td class="table-text">
                                            <div class="pull-right">{{$chat->message}}</div>
                                        </td>

                                        <!-- TODO: Delete Button -->


                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div>


                             </div>
                            <form method="post" action="{{route('sendMessage',['userid'=>$user->id])}} " class="form-horizontal">

                                {{csrf_field()}}

                                    <textarea placeholder="Type a message" class="form-control" name="message"  rows="3" >

                                    </textarea>
                                    <button class="btn btn-primary pull-right">Send</button>

                            </form>
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </div>
                        @endif
                           </div>


                      </div>
        <div class="col-sm-3">



        </div>
        <div class="col-sm-1">

        </div>

    </div>

@endsection