<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Make an Order</h1>

	<form method="POST" action="/orders/new">
		{{ csrf_field() }}

		Barcode:<select name="barcode">
			@foreach ($product_barcodes as $bc)
			{
				<option value="{{ $bc }}">{{ $bc }}</option>
			}
			@endforeach
		</select>
		<br>
		Quantity:<input type="text" name="quantity" required>
		
		<button type="submit">Accept</button>
	</form>

	<div>
		<ul>
			@foreach ($errors->all() as $error)
				<li> {{ $error }} </li>
			@endforeach
		</ul>
	</div>

	<table>
		<tr>
			<th>Barcode</th>
			<th>Description</th>
			<th>Quantity</th>
		</tr>
		@foreach ($current_order_products as $prod)
		<tr>
			<td> {{ $prod->product->barcode }} </td>
			<td> {{ $prod->product->name }} </td>
			<td> {{ $prod->quantity }} </td>
		</tr>
		@endforeach
	</table>
</body>
</html>