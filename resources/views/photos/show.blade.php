@extends('layouts.app')

@section('content')
	<div class="text-muted repository-margin-bottom-1rem">
		<a href="/incidents/{{ $photo->incident->id }}">
			<< Back to {{ $photo->incident->title }}
		</a>
	</div>

	@if(Session::has('success_message'))
		<div class="alert alert-success">
			{{ Session::get('success_message') }}
		</div>
	@endif

	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<div class="panel panel-default">
		<div class="panel-heading col-xs-12 text-center repository-margin-bottom-1rem">
			<div class="col-xs-10 col-xs-offset-1">
				<h2 class="panel-title">
					Picture of
					@if (isset($photo->incident->patron_name))
						{{ $photo->incident->patron_name }}
					@else
						Unknown Patron
					@endif
				</h2>

				<div>
					from 
					<a href="{{ route('incident', ['incident' => $photo->incident->id]) }}">
						{{ $photo->incident->title }}
					</a>
					on {{ $photo->incident->date }}
				</div>
			</div>

			{{-- Display the button to edit the incident if the user authored it or is an admin --}}
			@if (Auth::user()->id == $photo->incident->user_id || Auth::user()->role->contains('role', 'Admin'))
				<a class="btn-sm btn-default pull-right link-default" href="/photos/edit/{{ $photo->incident->id }}" title="Edit Incident">
					<span class="glyphicon glyphicon-edit"></span> Edit
				</a>
			@endif
		</div><!-- .panel-heading -->

		<div class="panel-body">
			<img class="img-responsive" src="{{ asset('images/patrons/' . $photo->filename) }}" alt="Patron Picture">
			<div class="well well-sm text-center">
				{{ $photo->caption }}
			</div>
		</div><!-- .panel-body -->

	</div><!-- .panel -->
@endsection