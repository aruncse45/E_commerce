@extends('admin.master')

@section('maincontent')
    {{Session::get('msg')}}
    {!! Form::open(['url' => '/pinfo', 'method'=>'POST', 'enctype'=>'multipart/form-data' ])  !!}
    <h1>Product info</h1>
  <div class="form-group">
    <label for="exampleInputEmail1">Product name</label>
    <input type="text" class="form-control" id="exampleInputpname" aria-describedby="emailHelp" placeholder="product name" name="pname">
  </div>
  <div class="form-group">
    <label for="exampleInputdiscription">Product Category</label>
    <select class="form-control" id="exampleInputstatus" placeholder="Product Caegory" name="pcategory"  >
      @foreach($categori as $c)
        <option value="{{$c->cname}}">{{$c->cname}}</option>
        @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputdiscription">color</label>
    <input type="text" class="form-control" id="exampleInputpprice" aria-describedby="emailHelp" placeholder="product color" name="pcolor">
  </div>
  <div class="form-group">
    <label for="exampleInputdiscription">Price</label>
    <input type="text" class="form-control" id="exampleInputpprice" aria-describedby="emailHelp" placeholder="product price" name="pprice">
  </div>
  <div class="form-group">
    <label for="exampleInputdiscription">Product photo</label>
    <input type="file" class="form-control" id="exampleInputimage" aria-describedby="emailHelp" placeholder="product image" name="pimage">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
{!! Form::close() !!}

@endsection