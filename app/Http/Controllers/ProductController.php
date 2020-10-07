<?php

namespace App\Http\Controllers;

use App\brand;
use App\Car;
use App\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables ;
use Illuminate\Support\Facades\Validator ;

class ProductController extends Controller
{
    public function index(Request $request) {

        if($request->ajax()) {
            $products = Product::select('products.name','products.description','products.price','brands.name AS brand')
                        ->join('brands','brands.id','=','products.brand_id')
                        ->get() ;

            return DataTables::of($products)
                ->addColumn('action', function($products) {
                    $button = '<button type="button" name="edit" id="'.$products->id.'" class="edit btn btn-primary btn-sm">Edit</button>' ;
                    $button.= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$products->id.'" class="delete btn btn-danger btn-sm">Delete</button>' ;
                return $button ;
            })
                ->addColumn('name', function($products) {
                    $link = '<a class="productCar"  id="'.$products->id.'">'.$products->name.'</a>' ;
                    return $link ;
                })
            ->rawColumns(['action','name'])
            ->make(true) ; 
     }

     $brands = brand::all() ;
     $cars = Car::all() ;
     return view('login.productList')->with('brands', $brands)
                                    ->with('cars', $cars) ;
    
    }

    public function createProduct(Request $request) {
        // dd($request) ;
        $validatedData = array (
            'name' => 'required ' ,
            'description' => 'required ' ,
            'price' => 'required ' ,
            'brand' => 'required ' ,
        ) ;
        $error = Validator::make($request->all(), $validatedData);
        if($error->fails()) {
 
         return response()->json(['errors' => $error->errors()->all()]);
 
        }
 

        $products = new Product ;
        $products->name = $request->name;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->brand_id = $request->brand;
        $products->save() ;
        // dd($request->carArray);
        foreach($request->carArray as $value) {
            $products->cars()->attach($value);
        } 
       


        return response()->json(['success'=>'Thêm thành công']) ;

    }

    public function editProduct($id) {
        $product = Product::findOrFail($id) ;

       $car = $product->cars;

        return response()->json(['result' => $product, 'car' => $car]) ;
    }

    public function updateProduct(Request $request ) {
        $validatedData = array (
            'name' => 'required ' ,
            'description' => 'required ' ,
            'price' => 'required ' ,
            'brand' => 'required ' ,
        ) ;
        $error = Validator::make($request->all(), $validatedData);
        if($error->fails()) {
 
         return response()->json(['errors' => $error->errors()->all()]);

        }
 

        $product = Product::findOrFail($request->hidden_id) ;
        $product->name = $request->name ;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->brand_id = $request->brand;
        $product->save()  ;
        $product->cars()->detach();
        foreach($request->carArray as $value) {
            $sync_data [] = $value ;
        } 
        $product->cars()->attach($sync_data) ;
         


        return response()->json(['success' => 'Sửa thành công']) ;  
    }

    public function removeProduct($id) {

        $product = Product::findOrFail($id) ;
        $product->cars()->detach() ;
        $product->delete() ;
    }

    public function productCar($id) {
        $product = Product::findOrFail($id) ;
        
        $product->cars   ;

        return response()->json(['productCar' => $product]) ;
    } 
}
