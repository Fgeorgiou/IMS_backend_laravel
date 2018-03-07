<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Products</h1>
	<table>
		<tr>
			<th>Name</th>
			<th>Barcode</th>
			<th>Category</th>
			<th>Supplier</th>
			<th>Units Per Pack</th>
			<th>Net Weight (grammars)</th>
			<th>Gross Weight (grammars)</th>
			<th>Lead Days</th>
		</tr>
		@foreach ($products as $product)
		<tr>
			<td> {{ $product->name }} </td>
			<td> {{ $product->barcode }} </td>
			<td> {{ $product->category->name }} </td>
			<td> {{ $product->supplier->name }} </td>
			<td> {{ $product->unit_per_pack }} </td>
			<td> {{ $product->unit_net_weight_gr }} </td>
			<td> {{ $product->unit_gross_weight_gr }} </td>
			<td> {{ $product->lead_days }} </td>
			<td>
				<button><a href="{{ url('/products/update/'.$product->id) }}">Edit</a></button>
			</td>
			<td>
				<button><a href="{{ url('/products/delete/'.$product->id) }}">Delete</a></button>
			</td>
		</tr>
		@endforeach
	</table>
</body>
</html>