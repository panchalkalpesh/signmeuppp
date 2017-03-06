@extends('layout')


@section('content')
<div class="title m-b-md">Registrations Overview</div>
<div class="row">
	
	<a class="btn" href="{{ route('home') }}">Go back to the Registration Page</a>

</div>
<div class="row">
	<table class="table table-striped">
		<tr>
			<th>First Name: </th>
			<th>Last Name: </th>
			<th>Initials: </th>
			<th>Email: </th>
			<th>Phone number: </th>
			<th>Location: </th>
		</tr>
		@foreach($users as $user)
		<tr>
			<td>{{ $user->firstName}}</td>
			<td>{{ $user->lastName}}</td>
			<td>{{ $user->initials}}</td>
			<td>{{ $user->email}}</td>
			<td>{{ $user->phone}}</td>
			<td>{{ $cities[$user->postalCode]['city'] }}, {{ $cities[$user->postalCode]['state_id'] }} {{ $user->postalCode }}</td>
		</tr>
		@endforeach
	</table>
</div>

@stop