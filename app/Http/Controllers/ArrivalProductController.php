<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\ArrivalProductAnomaly;
use \App\ArrivalsProduct;
use \App\Arrival;
use \App\Stock;

class ArrivalProductController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    
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
  public function store()
  {
    //Receive and validate the barcode and quantity
    $this->validate(request(), [
      'barcode' => 'required',
      'quantity' => 'required'
    ]);

  //Set current arrival, product id and search the db for the product's repetition in the arrival
    $current_arrival = Arrival::latest()->value('id');
    $product_id = DB::table('products')->where('barcode', request('barcode'))->value('id');
    $item_exists = ArrivalsProduct::where('arrival_id', $current_arrival)->where('product_id', $product_id);
    $product_stock_to_update = Stock::where('product_id', '=', $product_id);
    $product_to_update_curr_quantity = Stock::where('product_id', '=', $product_id)->value('quantity');

    //if the product exists, instead of creating more rows, update value to the current request's quantity value
    if ($item_exists->exists()){
      $item_exists->update(['quantity' => request('quantity')]);

      return response()->json(["response" => [
        'message' => 'Updated existing item!',
        'request_code' => 204
        ]
      ]);
    }

    //if the product isn't registred, respond with a 404 and add the record in the arrival anomalies
    if($product_id == null){
      ArrivalProductAnomaly::create([
        'arrival_id' => $current_arrival,
        'status_id' => 5,
        'product_barcode' => request('barcode'),
        'quantity' => request('quantity')
      ]);

      return response()->json(["response" => [
          'message' => 'Unknown Barcode : ' . request('barcode') . '.',
          'request_code' => 404
        ]
      ]);
    }

    //if the product is registered and doesn't exist in the current arrival, add it as a new record and update the stock count.
    ArrivalsProduct::create([
      'arrival_id' => $current_arrival,
      'product_id' => $product_id,
      'quantity' => request('quantity')
    ]);

    $product_stock_to_update->update(['quantity' => $product_to_update_curr_quantity + request('quantity')]);

    return response()->json(["response" => [
      'message' => 'Added item & updated stock!',
      'request_code' => 200
      ]
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
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
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }
  
}

?>