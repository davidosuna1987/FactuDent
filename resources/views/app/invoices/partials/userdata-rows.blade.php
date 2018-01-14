<tr>
	<th>Nombre</th>
	<td>{{auth()->user()->fullName()}}</td>
</tr>
<tr>
	<th>Domicilio</th>
	<td>{{auth()->user()->address}}</td>
</tr>
<tr>
	<th></th>
	<td>{{auth()->user()->post_code}} {{auth()->user()->locality}} ({{auth()->user()->province}})</td>
</tr>
<tr>
	<th>NIF / CIF</th>
	<td>{{auth()->user()->nif}}</td>
</tr>