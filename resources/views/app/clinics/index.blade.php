@extends('layouts.app')

@section('title', '| Clínicas')

@section('content')

	<div class="columns">
		<div class="column">
			@if($clinics->count())
				<a href="{{route('clinics.create')}}" class="button is-primary is-pulled-right">Nueva clínica</a>
			@endif
			<div class="title">Listado de clínicas</div>
			<hr>
		</div>

	</div>

	<div class="card">
		<div class="card-content">
			@if($clinics->count())
				@include('app.clinics.partials.table')
			@else
				<p class="disabled">
					Aún no has añadido ninguna clínica a la lista.
					<a href="{{route('clinics.create')}}" class="button is-primary is-pulled-right">Añadir clínica</a>
				</p>
			@endif
		</div>
	</div>

	{{$clinics->render()}}

@endsection