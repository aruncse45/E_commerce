<h1>showcartproducts</h1>
<table class="table">
	{{ Session::get('msg')}}
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">price</th>
      <th scope="col">qty</th>
      <th scope="col">total price</th>
    </tr>
  </thead>
  <tbody>
  	<?php
  		$i = 0;
  		$total = 0;
  	?>
  	@foreach($cartproduct as $c)
    <tr>
      <th scope="row">{{++$i}}</th>
      <td><a href="{{url('remove_cart_product/'.$c->rowId)}}">Remove</a></td>
      <td>{{$c->name}}</td>
      <td>{{$c->price}}</td>
      <td>
      	{!! Form::open(['url'=>'/update_cart', 'method'=>'POST']) !!}
      		<input type="number" value="{{$c->qty}}" name="qty" min="1">
      		<input type="hidden" value="{{$c->rowId}}" name="rowId">
      		<button type="submit">Update</button>
      	{!! Form::close() !!}
      </td>
		<?php
			$subtotal = $c->price*$c->qty;
			$total = $total +$subtotal;
		?>
      <td>{{$subtotal}}</td>
    </tr>
    @endforeach
    
    <tr>
    	<td></td>
    	<td></td>
    	<td></td>
    	<td>total price</td>
      <td>{{$total}}</td>
      
    </tr>
  </tbody>
</table>