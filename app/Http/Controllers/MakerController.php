<?php

namespace App\Http\Controllers;

use App\Maker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables ;
class MakerController extends Controller
{
    public function index(Request $request) {

        if($request->ajax()) {
            $makers = Maker::all() ;

            return DataTables::of($makers)
                ->addColumn('action', function($makers) {
                    $button = '<button type="button" name="edit" id="'.$makers->id.'" class="edit btn btn-primary btn-sm">Edit</button>' ;
                    $button.= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$makers->id.'" class="delete btn btn-danger btn-sm">Delete</button>' ;
                return $button ;
            })
            ->rawColumns(['action'])
            ->make(true) ; 
     }
     return view('login.maker') ;
    
    }

    public function createProductCar(Request $request) {
        $validatedData = array (
            'name' => 'required  ' ,
        ) ;
        $error = Validator::make($request->all(), $validatedData);
        if($error->fails()) {
 
         return response()->json(['errors' => $error->errors()->all()]);
 
        }
 

        $makers = new Maker ;
        $makers->name = $request->name;
        $makers->save() ;

        return response()->json(['success'=>'Thêm thành công']) ;

    }

    public function editProductCar($id) {
        $makers = Maker::findOrFail($id) ;

        return response()->json(['result' => $makers]) ;
    }

    public function updateProductCar(Request $request ) {
        $validatedData = array (
            'name' => 'required ' ,
        ) ;
        $error = Validator::make($request->all(), $validatedData);
        if($error->fails()) {
 
         return response()->json(['errors' => $error->errors()->all()]);

        }

        $maker = Maker::findOrFail($request->hidden_id) ;
        $maker->name = $request->name ;

        $maker->save() ;

        return response()->json(['success' => 'Sửa thành công']) ;
    }

    public function deleteProductCar($id) {

        $maker = Maker::findOrFail($id) ;

        $maker->delete() ;
    }




}
