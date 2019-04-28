<!DOCTYPE html>
<html>
<head>
	<title>Exporting csv file</title>
</head>
<body>
	<table>
		<tr>
			<td>NOM</td>
			<td>PRENOM</td>
			<td>EMAIL</td>
			<td>ADDRESS</td>
		</tr>
		@foreach($data as $c)
		<tr>
			<td>{{$c->NOM}}</td>
			<td>{{$c->PRENOM}}</td>
			<td>{{$c->EMAIL}}</td>
			<td>{{$c->ADDRESS}}</td>
		</tr>
		@endforeach
	</table>
</body>
</html>