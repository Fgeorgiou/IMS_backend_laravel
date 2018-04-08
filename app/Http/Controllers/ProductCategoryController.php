<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\ProductCategory;

class ProductCategoryController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $product_categories = ProductCategory::all();

    return response()->json([
      'product_categories' => $product_categories->toArray()
    ], 200);  
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('product_categories.create');
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
      ]);

        $prod_category = ProductCategory::create([
          'name' => request('name')
        ]);

      $prod_category->save();

      return redirect('/product_categories');
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
  public function update(Request $request, ProductCategory $product_category)
  {
      $product_category->update($request->all());

      return response()->json([
          'message' => 'Record was edited successfully!',
          'data' => $product_category->toArray()
        ], 200); 
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(ProductCategory $product_category)
  {
      $product_category->delete();

      return response()->json(null, 204);
  }
  
}

?>