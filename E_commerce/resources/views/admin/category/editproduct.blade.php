@extends('admin.master')

@section('maincontent')
<h1>Edit category</h1>
<hr>
    {{Session::get('msg')}}
    {!! Form::open(['url' => '/update-product', 'method'=>'POST', 'enctype'=>'multipart/form-data', 'name' => 'editform' ]) !!}
  <div class="form-group">
    <label for="exampleInputEmail1">Product name</label>
    <input type="text" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" placeholder="" name="productname" value="{{ $productid->product_name }}">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputdiscription">Product Caegory</label>
    <select class="form-control" id="exampleInputstatus" placeholder="Product Caegory" name="productcategory"  >
      @foreach($categori as $c)
        <option value="{{$c->cname}}">{{$c->cname}}</option>
        @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputdiscription">color</label>
    <textarea class="form-control" id="exampleInputdiscription" placeholder="" name="productcolor" value="">{{ $productid->color }}</textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputdiscription">price</label>
    <textarea class="form-control" id="exampleInputdiscription" placeholder="" name="productprice" value="">{{ $productid->price }}</textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Product picture</label>
    <input type="file" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" placeholder="category name" name="productpic" value="">
    <img style="height: 50px; width: 50px; " src="{{asset($productid->product_image)}}">
  </div>
  <input type="hidden" name="ppid" value="{{ $productid->id }}">
  <button type="submit" class="btn btn-primary">Submit</button>

{!! Form::close() !!}

@endsection