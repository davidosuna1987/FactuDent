@extends('layouts.app')

@section('title')
	| Facturas de {{$clinic->name}}
@endsection

@section('content')

	<div class="columns">
		<div class="column">
			@if($invoices->count())
				<a href="{{route('clinics.invoices.create', $clinic)}}" class="button is-primary is-pulled-right">Nueva factura</a>
  			<a href="{{route('clinics.index')}}" class="button m-r-10 is-pulled-right">Volver</a>
			@else
				<a href="{{route('clinics.index')}}" class="button is-pulled-right">Volver</a>
			@endif
			<div class="title">Facturas de {{$clinic->name}}</div>
			<hr>
		</div>
	</div>

	<div class="card">
		<div class="card-content">
			@if($invoices->count())
				@include('app.invoices.partials.table')
			@else
				<p class="disabled">
					Aún no has hecho ninguna factura a {{$clinic->name}}.
					<a href="{{route('clinics.invoices.create', $clinic)}}" class="button is-primary is-pulled-right">Nueva factura</a>
				</p>
			@endif
		</div>
	</div>

@endsection