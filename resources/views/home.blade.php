@extends('layout')


@section('content')
	<div class="title m-b-md">Registration Home</div>

	@if($errors)
		<div class="alert">
			@foreach($errors->all() as $error)
				<p class="red">{{ $error }}</p>
			@endforeach
		</div>
	@endif
	
	<div class="form-wpr">
		{{ Form::open(['route' => 'home']) }}
			<div class="row">
				<div class="col-sm-4">
					{{ Form::label('firstName', 'First Name') }}
				</div>
				<div class="col-sm-8">
					{{ Form::text('firstName') }}
				</div>
			</div>

			<div class="row">
				<div class="col-sm-4">
					{{ Form::label('lastName', 'Last Name') }}
				</div>
				<div class="col-sm-8">
					{{ Form::text('lastName') }}
				</div>
			</div>

			<div class="row">
				<div class="col-sm-4">
					{{ Form::label('initials', 'Initials') }}
				</div>
				<div class="col-sm-8">
					{{ Form::text('initials') }}
				</div>
			</div>

			<div class="row">
				<div class="col-sm-4">
					{{ Form::label('postalCode', 'Postal Code (no spaces)') }}
				</div>
				<div class="col-sm-8">
					{{ Form::text('postalCode',null, ['maxLength'=>6]) }}
				</div>
			</div>

			<div class="row">
				<div class="col-sm-4">
					{{ Form::label('email', 'Email Address') }}
				</div>
				<div class="col-sm-8">
					{{ Form::text('email') }}
				</div>
			</div>

			<div class="row">
				<div class="col-sm-4">
					{{ Form::label('password', 'Password (at least 8 characters, includes at least a number, and at least a capital letter') }}
				</div>
				<div class="col-sm-8">
					{{ Form::password('password') }}
				</div>
			</div>

			
			<div class="row">
				<div class="col-sm-4">
					{{ Form::label('phone', 'Phone Number') }}
				</div>
				<div class="col-sm-8">
					{{ Form::text('phone') }}
				</div>
			</div>


			
			<div class="row">
				<div class="col-sm-12">
					{{ Form::submit() }}
				</div>
			</div>






		{{ Form::close() }}
	</div>
@stop