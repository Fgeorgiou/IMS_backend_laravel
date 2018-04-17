<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;
use \App\Supplier;
use \App\ProductCategory;
use \App\Stock;
use DB;
use Validator;

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

    foreach ($products as $product) {
      $product->supplier;
      $product->stock;
    }

    return response()->json([
      'products' => $products->toArray()
    ], 200);   
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
      $validator = Validator::make($request->all(), [
        'name' => 'required',
        'barcode' => 'required|unique:products',
        'category' => 'required',
        'supplier' => 'required',
        'per_pack' => 'required',
        'net_weight' => 'required',
        'gross_weight' => 'required',
        'lead_days' => 'required',
      ]);

      if($validator->fails()){
        $message = $validator->errors();
        return response()->json([
            'message' => 'Oops! Something went wrong!',
            'status' => 400,
            'errors' => $message
        ]);  
      }

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

      $stock = Stock::create([
        'product_id' => DB::table('products')->max('id'),
        'quantity' => 0
      ]);

      $stock->save();

      $product->stock;

      return response()->json([
          'message' => 'Product created successful!',
          'status' => 201,
          'product' => $product->toArray()
      ]);
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

    if($product_to_show == null){

      return response()->json(['response' => [
          'message' => 'Unknown Barcode : ' . $ean . '.',
          'barcode' => $ean,
          'request_code' => 404
        ]
      ]);

    } else {
      $product_to_show->supplier;
      $product_to_show->stock;
      $product_to_show->category;

      return response()->json(['response' => [
          'product' => $product_to_show->toArray(),
          'request_code' => 200
        ]
      ]);
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
  public function destroy($ean)
  {
      $product_to_delete = Product::where('barcode', '=', $ean)->first();

      if($product_to_delete != null){
        $product_to_delete->stock->delete();
        $product_to_delete->delete();
      }

      return response()->json([ 'response' => [
          'message' => 'Product deleted successfully'
        ]
      ]);
  }
}

?>