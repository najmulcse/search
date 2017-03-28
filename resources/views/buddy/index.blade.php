@extends('layouts.app')



@section('content')

    <div class="row">

        <div class="col-sm-3">

        </div>
        <div class="col-sm-4">

        </div>
        <div class="col-sm-4">
            <h2>Buddy List</h2>
            @if(count($users)>0)

                @foreach($users->all() as $user)
                    @if(Auth::user()->email==$user->email)

                       @else

                    <li class="list-group-item">
                    <a href="{{route('doChat',['userid'=>$user->id])}}"> {{$user->name}}  </a>
                    </li>

                    @endif
                 @endforeach
              @endif

        </div>
        <div class="col-sm-1">

        </div>

    </div>

@endsection