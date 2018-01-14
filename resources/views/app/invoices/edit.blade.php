@extends('layouts.app')

@section('title')
	| Editar factura {{$invoice->invoice_no}}
@endsection

@section('content')

	<div id="invoice">

		<div class="columns">
			<div class="column">
	  		<a href="{{route('invoices.index')}}" class="button is-pulled-right">Volver</a>
				<div class="title">
					Editar factura {{$invoice->invoice_no}}
					{{-- @if($invoice->payment_date) --}}
						<form class="form form-set-invoice-as-unpaid is-inline" method="POST" action="{{route('invoices.unpay', $invoice->id)}}" role="form">
							{{csrf_field()}}
	            {{method_field('PUT')}}
							{{-- <button type="submit" class="button is-small is-success tooltip m-t-5 m-l-10" data-tooltip="Haz click para marcar esta factura pendiente">Pagada {{\Carbon::parse(gmdate("Y-m-d\TH:i:s", strtotime($invoice->payment_date)))->diffForHumans()}}</button> --}}
						</form>
					{{-- @else --}}
						<form class="form form-set-invoice-as-paid is-inline" method="POST" action="{{route('invoices.pay', $invoice->id)}}" role="form">
							{{csrf_field()}}
	            {{method_field('PUT')}}
							{{-- <button type="submit" class="button is-small is-danger tooltip m-t-5 m-l-10" data-tooltip="Haz click para marcar esta factura como pagada">Pendiente</button> --}}
						</form>
					{{-- @endif --}}
				</div>
				<hr>
			</div>
		</div>

		<div class="invoice-info">

			<div class="columns">
				<div class="column">
					<div class="invoice-state is-pulled-right m-r-50">
						<h5>
							Estado de la factura
							<span class="invoice-state-switcher m-l-15 {{$invoice->payment_date ? 'paid' : 'unpaid'}}">
								<span class="invoice-switcher-wrapper">
									<span class="invoice-state-paid">Pagada</span>
									<span class="invoice-state-limit"></span>
									<span class="invoice-state-unpaid">Pendiente</span>
								</span>
							</span>
						</h5>
					</div>
				</div>
			</div>

			<h3 class="has-text-primary">
				Datos fiscales
			</h3>
			<div class="columns">
				<div class="column">
					<table class="table has-no-borders is-narrow has-text-small has-no-padding">
						<tbody>
							<tr>
								<th>Nº factura</th>
								<td class="invoice-no-fake" data-invoiceno="{{$invoice->invoice_no}}">{{$invoice->invoice_no}}</td>
							</tr>
							<tr>
								<th>Fecha</th>
								<td><input class="input invoice-date-fake is-primary is-small" id="invoice_date_fake" type="date" name="invoice_date_fake" value="{{\Carbon::parse($invoice->invoice_date)->format('Y-m-d')}}"></td>
							</tr>
							<tr>
								<th>Nombre</th>
								<td>{{auth()->user()->fullName()}}</td>
							</tr>
							@include('app.invoices.partials.userdata-rows')
						</tbody>
					</table>
				</div>

				<div class="column">
					<table class="table has-no-borders is-narrow has-text-small has-no-padding">
						<tbody>
							<tr>
								<th>Cliente</th>
								{{-- <td>{{$invoice->clinic()->contact}}</td> --}}
								<td class="has-input-field invoice-clinic-id-fake-td">
									<div class="control">
									  <div class="select is-small">
									    <select class="invoice-clinic-id-fake is-primary">
									    	<option selected
														value="{{$invoice->clinic()->id}}"
														data-id="{{$invoice->clinic()->id}}"
														data-name="{{$invoice->clinic()->name}}"
														data-contact="{{$invoice->clinic()->contact}}"
														data-email="{{$invoice->clinic()->email}}"
														data-nif="{{$invoice->clinic()->nif}}"
														data-address="{{$invoice->clinic()->address}}"
														data-locality="{{$invoice->clinic()->locality}}"
														data-province="{{$invoice->clinic()->province}}"
														data-post_code="{{$invoice->clinic()->post_code}}"
														data-phone="{{$invoice->clinic()->phone}}"
														data-fax="{{$invoice->clinic()->fax}}">
														{{$invoice->clinic()->name}}
													</option>
									      @foreach(auth()->user()->clinics()->get() as $clinic)
									      	@if($invoice->clinic_id != $clinic->id)
														<option value="{{$clinic->id}}"
															data-id="{{$clinic->id}}"
															data-name="{{$clinic->name}}"
															data-contact="{{$clinic->contact}}"
															data-email="{{$clinic->email}}"
															data-nif="{{$clinic->nif}}"
															data-address="{{$clinic->address}}"
															data-locality="{{$clinic->locality}}"
															data-province="{{$clinic->province}}"
															data-post_code="{{$clinic->post_code}}"
															data-phone="{{$clinic->phone}}"
															data-fax="{{$clinic->fax}}">
															{{$clinic->name}}
														</option>
													@endif
									      @endforeach
									    </select>
									  </div>
									</div>
								</td>
							</tr>
							<tr>
								<th>Email</th>
								<td class="clinic-email">{{$invoice->clinic()->email}}</td>
							</tr>
							<tr>
								<th>NIF / CIF</th>
								<td class="clinic-nif">{{$invoice->clinic()->nif}}</td>
							</tr>
							<tr>
								<th>Dirección</th>
								<td class="clinic-address">{{$invoice->clinic()->address}}</td>
							</tr>
							<tr>
								<th></th>
								<td class="clinic-address-2">{{$invoice->clinic()->post_code}} {{$invoice->clinic()->locality}} ({{$invoice->clinic()->province}})</td>
							</tr>
							<tr>
								<th>Teléfono / Fax</th>
								<td class="clinic-phone-fax">{{$invoice->clinic()->phone}} / {{($invoice->clinic()->fax) ? $invoice->clinic()->fax : ''}}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div class="columns">
				<div class="column">

					<h3 class="has-text-primary">Detalles de la factura</h3>
					@include('app.invoices._form')

				</div>
			</div>
		</div>
	</div>

@endsection