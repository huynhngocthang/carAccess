<?php

namespace App\Http\Controllers;

use App\brand;
use App\cardmodel;
use Illuminate\Http\Request;
use App\product ;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index() {
        
        $brands = brand::all() ;
        $carmodels = cardmodel::all() ;
        return view('login.productList')
        ->with('carmodels', $carmodels)
        ->with('brands', $brands) ;
    }

    public function tableProduct(Request $request) {
        $products = product::select('products.id','products.name','products.price','products.description','brands.name AS brand')
        ->join('brands','brands.id','=','products.brand_id')
        ->get();

        return DataTables::of($products)
                ->addColumn('action', function($products) {
                    $a = '<a href="" class="edit" id="'.$products->id.'" data-toggle="modal"  data-target=".editTable" ><i style="font-size:24px" class="fa">&#xf0ad;</i></a>' ; 
                    $a .=  '<a href="" class="remove" id="'.$products->id.'" data-toggle="modal"  data-target="#removeTable"><i class="material-icons">&#xe872;</i></a>' ;
                        return $a ;
                })
                ->rawColumns([ 'action'])
                ->make(true) ;
    }


    public function createProduct(Request $request) {

        $validatedData = $request->validate([
            'name' => 'required|unique:products,name',
            'description' => 'required',
            'price' => 'required',
            'brand' => 'required'
        ]) ;

        $products = new product ;
        $products->name = $request->name ;
        $products->description = $request->description ;
        $products->price = $request->price ;
        $products->brand_id = $request->brand ;

        $products->save() ;

        return response()->json($products , 200, $validatedData) ;
    }

    public function editProduct( $id) { 
  
        $products = product::findOrFail($id) ;

        
        return response()->json($products,200) ;

    }

    public function updateProduct(Request $request ) {

        $product = product::findOrFail($request->hidden_id) ;
  
        $product->name = $request->editName ;
        $product->description = $request->editDescription ;
        $product->price = $request->editPrice ;
        $product->brand_id = $request->editBrand ;
        $product->save() ;

        return response()->json($product ,200 ) ;
    }

    public function removeProduct($id) {
        $product = product::findOrFail($id) ;
        $product->delete() ;
        return response()->json($product,200) ;
     }
   

}
