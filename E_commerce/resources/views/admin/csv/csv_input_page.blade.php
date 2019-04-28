@extends('admin.master')

@section('maincontent')
<h1>Edit category</h1>
<hr>
   {!! Form::open(['url' => '/csv-input', 'method'=>'POST', 'enctype'=>'multipart/form-data', 'name' => 'editform' ]) !!}
      <div class="form-group">
          <label for="exampleInputEmail1">Excel file</label>
          <input type="file" class="form-control" id="excel" aria-describedby="emailHelp" name="excel" value="">
      </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  {!! Form::close() !!}
@endsection