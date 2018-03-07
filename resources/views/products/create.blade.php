<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Add Products</h1>

	<form method="POST" action="/products/create">
		{{ csrf_field() }}

		Name:<input type="text" name="name" id="name" placeholder="name"> <br>
		Barcode:<input type="text" name="barcode" id="barcode" placeholder="barcode"> <br>
		Category:<select name="category">
			@foreach ($prod_categories as $prod_category)
			{
				<option value="{{ $prod_category->id }}">{{ $prod_category->name }}</option>
			}
			@endforeach
		</select> <br>
		Supplier:<select name="supplier">
			@foreach ($suppliers as $supplier)
			{
				<option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
			}
			@endforeach
		</select> <br>
		Units per Pack:<input type="text" name="per_pack" id="per_pack" placeholder="per_pack"> <br>
		Unit Net Weight (in grammars):<input type="text" name="net_weight" id="net_weight" placeholder="net_weight"> <br>
		Unit Gross Weight (in grammars):<input type="text" name="gross_weight" id="gross_weight" placeholder="gross_weight"> <br>
		Lead days:<input type="text" name="lead_days" id="lead_days" placeholder="lead_days"> <br>
		<button type="submit"> Add Product </button>
	</form>
</body>
</html>