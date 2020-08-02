@extends('partials.header')

@section('title', 'Send Message')

@section('content')
<link rel="stylesheet" href="/../../css/message.css">
<div class="content-item">
    <h2>Message</h2>
     <div class="content-control">
        <div class="user-message">

                @foreach ($message as $item)

                @if($item[count($item)-1]->id_seeder!="1")
              <form action="/admin/message/{{$item[count($item)-1]->id_seeder}}" method="get">
                <div class="item-message">
                    <h4>{{App\User::find($item[count($item)-1]->id_seeder)->name}}</h4>
                    <p>{{$item[count($item)-1]->content}}</p>
                    <button class="btn-success">View</button>
                </div>
                </form>
                @endif

            @endforeach




        </div>
        <form class="form-control" action="/admin/message" method="post">
          @csrf
            <h3>Send message</h3>
            <hr>
            <input type="text" hidden name="userId" value="{{$userId}}">
            <div class="contain-message">
                @foreach ($allmessage as $item)
                @if($item->id_seeder != 1)
                <div class="form-item">
                    <h6 for="input">{{$item->users->name}}</h6>
                    <p>{{$item->content}}</p>
                </div>
                @else
                <div class="form-item admin">
                <h6 for="input">Me</h6>
                <p style="color: red">{{$item->content}}</p>
                </div>
                @endif
                @endforeach
            </div>
           <hr>
           <input type="text" name="messages" >
           <button class="btn-success">Send</button>
        </form>

     </div>
  </div>
@endsection
