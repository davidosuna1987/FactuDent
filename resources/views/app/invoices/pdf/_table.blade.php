<table class="invoice-details-table table is-bordered is-narrow has-text-small">
	<thead>
		<tr>
			<th>Concepto</th>
			<th width="70px">Cantidad</th>
			<th class="w-100">Precio</th>
			<th class="has-text-right w-100">Total</th>
		</tr>
	</thead>
	<tbody>
		@if(isset($invoice))
			@foreach($invoice->invoiceLines()->get() as $index => $invoiceLine)
				<tr class="invoice-line" data-id="{{$index}}">
					<td >{{$invoiceLine->description}}</td>
					<td width="70px">{{$invoiceLine->quantity}}</td>
					<td class="w-100">{{$invoiceLine->unit_price}}€</td>
					<td class="has-text-right w-100">{{$invoiceLine->total}}€</td>
				</tr>
			@endforeach
		@endif
	</tbody>
	<tfoot>
		<tr>
			<td class="is-empty" colspan="2"></td>
			<th>Subtotal</th>
			<td class="invoice-subtotal has-text-right">{{$invoice->sub_total}}€</td>
		</tr>
		<tr class="invoice-dentist-percentage-row">
			<td class="is-empty" colspan="2"></td>
			<th class="invoice-dentist-percentage-label">
				<span>Porcentaje odontólogo {{$invoice->dentist_percentage}}%</span>
			</th>
			<td class="has-text-right">{{number_format(ceil($invoice->sub_total * $invoice->dentist_percentage) / 100, 2)}}€</td>
		</tr>
		<tr>
			<td class="is-empty" colspan="2"></td>
			<th>Retención {{$invoice->retention}}%</th>
			<td class="invoice-retention-total has-text-right">{{ceil($invoice->sub_total * $invoice->dentist_percentage) / 100 - $invoice->total}}€</td>
		</tr>
		<tr>
			<td class="is-empty" colspan="2"></td>
			<th>Total</th>
			<td class="invoice-total has-text-right">{{$invoice->total}}€</td>
		</tr>
	</tfoot>
</table>