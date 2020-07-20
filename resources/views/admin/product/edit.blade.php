@extends('partials.header')

@section('title', 'Product')

@section('content')
<link rel="stylesheet" href="/../../css/product.css">
<div class="content-item">
    <h2>Product</h2>
     <div class="content-control">
        <form class="form-control" action="/admin/product" method="post" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
            <h3>Edit Product</h3>
            <hr>
            <input type="text" value="{{$productFind->id}}" hidden name="id" id="input">
           <div class="form-item">
               <p for="input">Name</p>
           <input type="text" value="{{$productFind->name}}" name="name" id="input">
           </div>
           <div class="form-item">
            <p for="input">Category</p>
            <select name="category" id="">
                  @foreach ($categories as $item)
                <option @if($productFind->category_id === $item->id) selected @endif  value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
            </select>
           </div>
           <div class="form-item">
            <p for="input">Price</p>
            <input type="text" value="{{$productFind->price}}" name="price" id="input">
           </div>

            <div class="form-item">
              <p for="input">Quantity</p>
              <input type="text" value="{{$productFind->quantity}}" name="quantity" id="input">
            </div>

            <div class="form-item">
                <p for="input">Description</p>
            <input type="text" value="{{$productFind->description}}" name="description" id="input">
            </div>
            <div class="form-item">
              <p for="input">Image</p>
              <input type="file"  name="image" id="input">
            </div>
           <hr>
           <button class="btn-success">Update</button>

        </form>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $item)   
              <tr>
                <td><b>{{$item->id}}</b></td>
                <td>{{$item->name}}</td>
                <td><img src="{{$item->image}}" height="50px" width="50px" alt=""></td>
                <td>{{$item->category->name}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->quantity}}</td>
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