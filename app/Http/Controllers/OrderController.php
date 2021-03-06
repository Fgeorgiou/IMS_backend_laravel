<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Order;
use \App\OrdersProduct;


class OrderController extends Controller 
{
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $orders = Order::all();

    foreach ($orders as $order) {
      $order->order_products;
    }

    return $orders;
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    //The controller will search the DB for an order record with pending status and will fetch the corresponding products
    $current_order = DB::table('orders')->where('status_id', '=', '1')->whereDate('created_at', DB::raw('CURDATE()'))->value('id');
    $current_order_products = OrdersProduct::where('order_id', '=' , $current_order)->get();

    //For every product in the current order, attach product and stock info
    foreach ($current_order_products as $prod) {
      $prod->product->stock;
    }

    //If no pending order is found, the controller will seek a confirmed order
    if($current_order == null){
      $current_order = DB::table('orders')->where('status_id', '=', '2')->whereDate('created_at', DB::raw('CURDATE()'))->value('id');
      
      //On the case that neither a pending nor a confirmed order exists today, the controller will make a new one
      if($current_order == null){
        Order::create([
            'user_id' => request('user_id'),
            'status_id' => 1
        ]);
        $current_order = DB::table('orders')->where('status_id', '=', '1')->whereDate('created_at', DB::raw('CURDATE()'))->value('id');
      } else {
        return response()->json([
          'message' => "Today's order is sent. Check back tomorrow.",
          'status_code' => 300
        ]);
      }
    }

    return response()->json(
      ["current_order" => 
        [
          'order_id' => $current_order,
          'order_products' => $current_order_products->toArray()
        ]
      ],
      200
    );
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
    $current_order_id = DB::table('orders')->where('status_id', '=', '1')->whereDate('created_at', DB::raw('CURDATE()'))->value('id');
    $order_products = OrdersProduct::where('order_id', $current_order_id)->pluck('id');

    if($current_order_id == null){
      return response()->json(["response" => [
        'message' => 'No active order was found.',
        'request_code' => 404
        ]
      ]);
    }

    Order::where('id', $current_order_id)->update(['status_id' => 2]);
    foreach ($order_products as $product) {
      OrdersProduct::where('id', $product)->update(['status_id' => 2]);
    }

    return response()->json(["response" => [
        'message' => 'Order confirmed! See you tomorrow!',
        'request_code' => 204
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
  public function update(Request $request, $id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
    $current_order = DB::table('orders')->whereDate('created_at', DB::raw('CURDATE()'))->value('id');
    $product_to_delete = OrdersProduct::where('order_id', '=' , $current_order)->where('product_id', '=', request('id'))->delete();

    return response()->json(null, 204);
  }
  
}

?>