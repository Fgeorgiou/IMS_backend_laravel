<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Status;

class StatusController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $statuses = Status::all();

    return response()->json([
      'data' => $statuses->toArray()
    ], 200);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('status.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
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
  public function update(Request $request, Status $status)
  {
      $status->update($request->all());

      return response()->json([
          'message' => 'Record was edited successfully!',
          'data' => $status->toArray()
        ], 200); 
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Status $status)
  {
      $status->delete();

      return response()->json(null, 204);
  }
  
}

?>