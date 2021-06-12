<html>
<head>
	<title>User Data Report</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>User Data Report</h5>
	</center>
 
	<table class='table table-bordered text-center'>
		<thead>
			<tr>
				<th>No</th>
				<th>Id</th>
				<th>Name</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($users as $u)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$u->id}}</td>
				<td>{{$u->name}}</td>
				<td>{{$u->email}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
    <div class="float-right text-monospace">{!! $mytime !!}</div><br>   
</body>
</html>