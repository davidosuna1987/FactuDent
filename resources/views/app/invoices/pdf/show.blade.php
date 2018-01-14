@extends('layouts.pdf')

@section('title')
	| Factura {{$invoice->invoice_no}} PDF
@endsection

@section('content')

	<div id="invoice">

		<div class="columns">
			<div class="column">
				<div class="title">Factura {{$invoice->invoice_no}}</div>
				<hr>
			</div>
		</div>

		<div class="invoice-info">

			<div class="columns">
				<table class="table has-no-borders">
					<tr>
						<td colspan="2"><h3 style="color:{{auth()->user()->pdf_color}}">Datos fiscales</h3></td>
					</tr>
					<tr>
						<td width="50%">
							<table class="table has-no-borders is-narrow has-text-small has-no-padding">
								<tbody>
									<tr>
										<th>Nº factura</th>
										<td class="invoice-no-fake" data-invoiceno="{{$invoice->invoice_no}}">{{$invoice->invoice_no}}</td>
									</tr>
									<tr>
										<th>Fecha</th>
										<td class="invoice-date-fake has-no-borders">{{\Carbon::parse($invoice->invoice_date)->format('d-m-Y')}}</td>
									</tr>
									<tr>
										<th>Nombre</th>
										<td>{{auth()->user()->name}}</td>
									</tr>
									@include('app.invoices.partials.userdata-rows')
								</tbody>
							</table>
						</td>

						<td width="50%">
							<table class="table has-no-borders is-narrow has-text-small has-no-padding">
								<tbody>
									<tr>
										<th>Cliente</th>
										<td>{{$invoice->clinic()->name}}</td>
									</tr>
									<tr>
										<th>Email</th>
										<td>{{$invoice->clinic()->email}}</td>
									</tr>
									<tr>
										<th>NIF / CIF</th>
										<td>{{$invoice->clinic()->nif}}</td>
									</tr>
									<tr>
										<th>Dirección</th>
										<td>{{$invoice->clinic()->address}}</td>
									</tr>
									<tr>
										<th></th>
										<td>{{$invoice->clinic()->post_code}} {{$invoice->clinic()->locality}} ({{$invoice->clinic()->province}})</td>
									</tr>
									<tr>
										<th>Teléfono / Fax</th>
										<td>{{$invoice->clinic()->phone}} {{($invoice->clinic()->fax) ? ' / '.$invoice->clinic()->fax : ''}}</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
				</table>
			</div>

			<div class="columns p-t-30">
				<div class="column">
					<h3 style="color:{{auth()->user()->pdf_color}}">Detalles de la factura</h3>
					@include('app.invoices.pdf._table')
				</div>
			</div>
		</div>
	</div>

@endsection