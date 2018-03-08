<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Role;

class RoleController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $roles = Role::all();

    return response()->json([
      'data' => $roles->toArray()
    ], 200); 
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      return view('roles.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
      $this->validate(request(), [
        'description' => 'required',
        'access_level' => 'required',
      ]);

        $supplier = Role::create([
          'description' => request('description'),
          'access_level' => request('access_level'),
        ]);

      $supplier->save();

      return redirect('/roles');
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
  public function update(Request $request, Role $role)
  {
      $role->update($request->all());

      return response()->json([
          'message' => 'Record was edited successfully!',
          'data' => $role->toArray()
        ], 200); 
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Role $role)
  {
      $role->delete();

      return response()->json(null, 204);
  }
  
}

?>