<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Order;
use \App\OrdersProduct;

class OrdersProductController extends Controller 
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
    $this->validate(request(), [
      'barcode' => 'required',
      'quantity' => 'required'
    ]);

    $current_order = DB::table('orders')->whereDate('created_at', DB::raw('CURDATE()'))->value('id');
    $product_id = DB::table('products')->where('barcode', request('barcode'))->value('id');
    $item_exists = OrdersProduct::where('order_id', $current_order)->where('product_id', $product_id);

    if ($item_exists->exists()){
      $item_exists->update(['quantity' => request('quantity')]);
      return response()->json(["response" => [
        'message' => 'Updated existing item!',
        'request_code' => 204
        ]
      ]);
    }

    OrdersProduct::create([
      'order_id' => $current_order,
      'product_id' => $product_id,
      'status_id' => 1,
      'quantity' => request('quantity')
    ]);

    return response()->json(["response" => [
      'message' => 'Added item!',
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