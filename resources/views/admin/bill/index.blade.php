@extends('partials.header')

@section('title', 'Bill')

@section('content')
<link rel="stylesheet" href="/../../css/product.css">
<div class="content-item">
    <h2>Bill</h2>
     <div class="content-control">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Total</th>
                <th scope="col">Product</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($bill as $item)
              <tr>
                <td><b>{{$item->id}}</b></td>
                <td>{{$item->name}}</td>
                <td>{{$item->address}}</td>
                <td>{{$item->phone}}</td>
                <td>{{$item->total}}</td>
                <td>
                    @foreach (json_decode($item->cart) as $product)
                    <img src="{{$product->image}}" height="50px" width="50px" alt="">
                    @endforeach

                </td>
                <td>Đang vận chuyển</td>
                <td>
                  <form action="/admin/product/{{$item->id}}/edit" method="get"><button class="btn btn-success"><i class="fa fa-edit"></i></button></form>
                  <form action="/admin/product/{{$item->id}}" method="post">
                    @method('DELETE')
                    @csrf
                  <button style="margin-left: 5px" class="btn btn-success red"><i class="fa fa-trash"></i></button>
                </form>
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>

     </div>
  </div>
@endsection
