@extends('admin.master')

@section('maincontent')
<h1>Edit category</h1>
<hr>
    {{Session::get('msg')}}
    {!! Form::open(['url' => '/update-category', 'method'=>'POST', 'name' => 'editform' ]) !!}
  <div class="form-group">
    <label for="exampleInputEmail1">Category name</label>
    <input type="text" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" placeholder="category name" name="cname" value="{{ $category->cname }}">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputdiscription">Discription</label>
    <textarea class="form-control" id="exampleInputdiscription" placeholder="categorydiscription" name="cdiscription" value="">{{ $category->cdiscription }}</textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputdiscription">publication status</label>
    <select class="form-control" id="exampleInputstatus" placeholder="publication status" name="pstatus"  >
        <option value="1">published</option>
        <option value="2">unpublished</option>
    </select>
  </div>
  <input type="hidden" name="ccid" value="{{ $category->id }}">
  <button type="submit" class="btn btn-primary">Submit</button>

{!! Form::close() !!}
<script type="text/javascript">
	document.forms['editform'].elements['pstatus'].value = {{ $category->pstatus }};
</script>
@endsection