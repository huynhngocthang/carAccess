<?php

namespace App\Http\Controllers;

use App\cardmodel;
use App\Maker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB ;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables ;

class CardmodelController extends Controller
{
    public function index(Request $request) {
        if($request->ajax()) {
            $cardmodels = cardmodel::select('cardmodels.id','cardmodels.name','makers.name AS maker')
            ->join('makers','makers.id','=','cardmodels.maker_id')
            ->get();
    
            return DataTables::of($cardmodels)
                ->addColumn('action', function($cardmodels) {
                    $button = '<button type="button" name="edit" id="'.$cardmodels->id.'" class="edit btn btn-primary btn-sm">Edit</button>' ;
                    $button.= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$cardmodels->id.'" class="delete btn btn-danger btn-sm">Delete</button>' ;
                return $button ;
            })
            ->rawColumns(['action'])
            ->make(true) ;
        }

        $makers = Maker::all() ;

        return view('login.carmodel')
        ->with('makers', $makers) ;
    }

    public function createCar(Request $request) {
       $validatedData = array (
           'name' => 'required | unique:cardmodels' ,
           'maker' => 'required',
       ) ;
       $error = Validator::make($request->all(), $validatedData);
       if($error->fails()) {

        return response()->json(['errors' => $error->errors()->all()]);

       }

        $cardmodels = new cardmodel ;
        $cardmodels->name = $request->name ;
        $cardmodels->maker_id = $request->maker;
        $cardmodels->save() ;

        return response()->json(['success' => 'Thêm thành công']) ;
    }

    public function editCar($id) {

        $cardmodel = cardmodel::findOrFail($id) ;

        return response()->json(['result' => $cardmodel]) ;
    }

    public function updateCar(Request $request ,cardmodel $cardmodel) {
        $validatedData = array (
            'name' => 'required' ,
            'maker' => 'required',
        ) ;
        $error = Validator::make($request->all(), $validatedData);
        if($error->fails()) {
 
         return response()->json(['errors' => $error->errors()->all()]);
 
        }

        $cardmodel = cardmodel::findOrFail($request->hidden_id) ;
        $cardmodel->name = $request->name ;
        $cardmodel->maker_id = $request->maker ;

        $cardmodel->save() ;

        return response()->json(['success' => 'Sửa thành công']) ;
    }

    public function deleteCar($id) { 

        $cardmodel = cardmodel::findOrFail($id) ;
        $cardmodel->delete() ;

    }

    

}
