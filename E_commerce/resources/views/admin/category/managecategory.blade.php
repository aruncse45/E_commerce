@extends('admin.master')

@section('maincontent')
	{{Session::get('msg')}}
	<h1>SHOW CATEGORY</h1>
	<hr>
	<table class="table">
    <thead>
      <tr>
      	<th>id</th>
        <th>product name</th>
        <th>Category</th>
        <th>color</th>
        <th>price</th>
        <th>image</th>
        <th>change</th>
      </tr>
    </thead>
    <tbody>
      
		<?php
		  $i =0; 
		?>

      @foreach ($productinfo as $p)
      <tr>
		<td>{{++$i}}</td>
		<td>{{$p->product_name}}</td>
		<td>{{$p->product_category}}</td> 
        <td>{{$p->product_color}}</td>
        <td>{{$p->product_price}}</td>
        <td><img style="height: 50px; width: 50px" src="{{asset($p->product_image)}}"></td>
        <td><a href="{{url('/editproduct/'.$p->id)}}">Edit</a> |<a href="{{url('/delete/'.$p->id)}}">Delete</a></td>
      </tr>
      @endforeach

    </tbody>
  </table>


{{$productinfo->links()}}

@endsection