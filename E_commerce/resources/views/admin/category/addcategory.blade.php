@extends('admin.master')

@section('maincontent')
    <h1>ADD CATEGORY</h1>
    {{--{{$name}}--}}
    
    @if(Session::has('msg'))
        <script type="text/javascript">
          alert('Category added');
        </script>
    @endif
    
    {!! Form::open(['url' => '/save-category', 'method'=>'POST' ]) !!}
    <div class="form-group">
        <label for="exampleInputEmail1">Category name</label>
        <input type="text" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" placeholder="category name" name="cname">
        @if($errors->has('cname'))
          <div class="alert alert-danger">
            {{ $errors->first('cname') }}
          </div>
        @endif
    </div>
  <div class="form-group">
      <label for="exampleInputdiscription">Discription</label>
      <textarea class="form-control" id="exampleInputdiscription" placeholder="categorydiscription" name="cdiscription">
      </textarea>
  </div>
  <div class="form-group">
      <label for="exampleInputdiscription">publication status</label>
      <select class="form-control" id="exampleInputstatus" placeholder="publication status" name="pstatus">
          <option value="1">published</option>
          <option value="2">unpublished</option>
      </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
{!! Form::close() !!}

@endsection