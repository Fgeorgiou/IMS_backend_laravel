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

      return view('roles.index', compact('roles')); 
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
  public function update($id)
  {
      $role = Role::find($id);

      $role->description = "Senior Employee";
      $role->access_level = 15;

      $role->save();

      return back();
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
      Role::find($id)->delete();

      return back();
  }
  
}

?>