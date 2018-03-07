<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    return view('facilities.index', compact('facilities'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('facilities.create');
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

      return redirect('/facilities');
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
      $facility = Facility::find($id);

      $facility->name = "Petrompany";

      $facility->save();

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
      Facility::find($id)->delete();

      return back();
  }
  
}

?>