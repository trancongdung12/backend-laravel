@extends('partials.header')

@section('title', 'Category')

@section('content')
<link rel="stylesheet" href="/../../css/product.css">
<div class="content-item">
    <h2>Category</h2>
     <div class="content-control">
        <form class="form-control" action="/admin/category" method="post">
          @method('PATCH')
          @csrf
            <h3>Edit Category</h3>
            <hr>
           <div class="form-item">
               <p for="input">Name</p>
               <input type="text" value="{{$categories->id}}" name="id-category" hidden id="input">
                <input type="text" value="{{$categories->name}}" name="name-category" id="input">
           </div>
           <hr>
           <button class="btn-success">Update</button>

        </form>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($category as $item)   
              <tr>
                <td><b>{{$item->id}}</b></td>
                <td>{{$item->name}}</td>
                <td>
                  <form action="/admin/category/{{$item->id}}/edit" method="get"><button class="btn btn-success"><i class="fa fa-edit"></i></button></form>
                  <form action="/admin/category/{{$item->id}}" method="post">
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