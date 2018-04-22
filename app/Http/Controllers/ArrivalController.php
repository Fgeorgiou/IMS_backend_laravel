<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Arrival;
use \App\ArrivalsProduct;

class ArrivalController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $arrivals = Arrival::all();

    foreach ($arrivals as $arrival) {
      $arrival->arrival_products;
      $arrival->arrival_anomalies;
    }

    return $arrivals;
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create(Request $request)
  {
    //The controller will create an arriving order record, will save the id and attach the corresponding products to the current arrival
    Arrival::create([
        'order_id' => request('order_id')
    ]);

    //Isolating the arrival's id for further querying the corresponsing products
    $arriving_order = Arrival::latest()->whereDate('created_at', DB::raw('CURDATE()'))->value('id');

    return response()->json([
        "arriving_order_id" => $arriving_order
      ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {

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