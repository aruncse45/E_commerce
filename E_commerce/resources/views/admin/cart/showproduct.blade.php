<h1>Show all published product</h1>
@foreach($product as $p)
	<div style="float: left;">
		<img style="height: 200px; width: 300px; margin-left: 10px; border: 2px solid blue" src="{{asset($p->product_image)}}">
	{!! Form::open(['url'=>'/add_into_cart', 'method'=>'POST', 'enctype'=>'multipart/form-data', 'name' => 'editform' ]) !!}
		<input type="hidden" name="productid" value="{{$p->id}}">
		<input type="hidden" name="qty" value="1">
		<button style="margin-left: 10px;" type="submit" class="btn btn-primary">Submit</button>
	{!! Form::close() !!}
	</div>
	
@endforeach