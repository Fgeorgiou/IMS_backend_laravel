<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facades\Response;
use \App\Facility;

class FacilityController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $facilities = Facility::all();

    return response()->json([
      'data' => $facilities->toArray()
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
      $this->validate(request(), [
        'name' => 'required',
        'email' => 'required|email',
        'address' => 'required'
      ]);

      $facility = Facility::create([
        'name' => request('name'),
        'email' => request('email'),
        'address' => request('address')
      ]);

      $facility->save();

      return response()->json([
        'message' => 'New record was successful!',
        'data' => $facility->toArray()
      ], 201);
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
  public function update(Request $request, Facility $facility)
  {
      $facility->update($request->all());

      return response()->json([
        'message' => 'Record was edited successfully!',
        'data' => $facility->toArray()
      ], 200);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Facility $facility)
  {
      $facility->delete();

      return response()->json(null, 204);
  }
  
}

?>