<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Supplier;

class SupplierController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $suppliers = Supplier::all();

    return response()->json([
      'suppliers' => $suppliers->toArray()
    ], 200);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('suppliers.create');
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
      ]);

        $supplier = Supplier::create([
          'name' => request('name'),
          'email' => request('email'),
        ]);

      $supplier->save();

      return redirect('/suppliers');
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
  public function update(Request $request, Supplier $supplier)
  {
      $supplier->update($request->all());

      return response()->json([
          'message' => 'Record was edited successfully!',
          'data' => $supplier->toArray()
        ], 200);   
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Supplier $supplier)
  {
      $supplier->delete();

      return response()->json(null, 204);
  }
  
}

?>