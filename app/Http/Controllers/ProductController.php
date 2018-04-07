<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;
use \App\Supplier;
use \App\ProductCategory;

class ProductController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $products = Product::all();

    return response()->json([
      'data' => $products->toArray()
    ], 200);   
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $prod_categories = ProductCategory::all();
    $suppliers = Supplier::all();

    return view('products.create', compact('prod_categories', 'suppliers'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
      $this->validate(request(), [
        'name' => 'required',
        'barcode' => 'required',
        'category' => 'required',
        'supplier' => 'required',
        'per_pack' => 'required',
        'net_weight' => 'required',
        'gross_weight' => 'required',
        'lead_days' => 'required',
      ]);

        $product = Product::create([
          'name' => request('name'),
          'barcode' => request('barcode'),
          'category_id' => request('category'),
          'supplier_id' => request('supplier'),
          'unit_per_pack' => request('per_pack'),
          'unit_net_weight_gr' => request('net_weight'),
          'unit_gross_weight_gr' => request('gross_weight'),
          'lead_days' => request('lead_days')
        ]);

      $product->save();

      return redirect('/products');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($ean)
  {
    $product_to_show = Product::where('barcode', '=', $ean)->first();

    if($product_to_show != null){
      $product_to_show->stock;
    }

    if ($product_to_show != null){
      return response()->json([
        'data' => $product_to_show->toArray()
      ], 200);
    }

    return response()->json(null, 204);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, Product $product)
  {
      $product->update($request->all());

      return response()->json([
          'message' => 'Record was edited successfully!',
          'data' => $product->toArray()
        ], 200); 
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Product $product)
  {
      $product->delete();

      return response()->json(null, 204);
  }
  
}

?>