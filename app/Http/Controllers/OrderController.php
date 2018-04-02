<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Order;
use \App\OrdersProduct;


class OrderController extends Controller 
{

  // public function __construct()
  // {
  //   $this->middleware('auth', ['except' => 'index']);
  // }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $orders = Order::all();
    $order_products = OrdersProduct::where('order_id', 8)->get();

    return response()->json([
      'orders' => [
        'order_info' => $orders->toArray(), 
        'order_products' => $order_products->toArray()
     ]
    ], 200);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create(Request $request)
  {
    $current_order = DB::table('orders')->whereDate('created_at', DB::raw('CURDATE()'))->value('id');
    $current_order_products = OrdersProduct::where('order_id', '=' , $current_order)->get();

    foreach ($current_order_products as $prod) {
      $prod->product->stock;
    }

    if($current_order == null){
      Order::create([
          'user_id' => request('user_id'),
          'status_id' => 1
      ]);

      $current_order = DB::table('orders')->whereDate('created_at', DB::raw('CURDATE()'))->value('id');
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
    $this->validate(request(), [
      'barcode' => 'required',
      'quantity' => 'required'
    ]);

    $current_order = DB::table('orders')->whereDate('created_at', DB::raw('CURDATE()'))->value('id');
    $product_id = DB::table('products')->where('barcode', request('barcode'))->value('id');
    $item_exists = OrdersProduct::where('order_id', $current_order)->where('product_id', $product_id);

    if ($item_exists->exists()){
      $item_exists->update(['quantity' => request('quantity')]);
      return back();
    }

    OrdersProduct::create([
      'order_id' => $current_order,
      'product_id' => $product_id,
      'status_id' => 1,
      'quantity' => request('quantity')
    ]);

    return \App::make('redirect')->refresh();
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