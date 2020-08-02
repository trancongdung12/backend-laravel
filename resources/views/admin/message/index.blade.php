@extends('partials.header')

@section('title', 'Message')

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

     </div>
  </div>
@endsection
