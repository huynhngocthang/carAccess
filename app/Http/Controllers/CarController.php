<?php

namespace App\Http\Controllers;

use App\Car;
use App\cardmodel;
use App\Maker;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables ;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    public function index(Request $request) {
        if($request->ajax()) {
            $cars = Car::select('cars.id','cars.name','cardmodels.name AS carModel')
            // ->join('makers','makers.id','=','cars.maker_id')
            ->join('cardmodels','cardmodels.id','=','cars.carModel_id')
            ->get();
    
            return DataTables::of($cars)
                ->addColumn('action', function($cars) {
                    $button = '<button type="button" name="edit" id="'.$cars->id.'" class="edit btn btn-primary btn-sm">Edit</button>' ;
                    $button.= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$cars->id.'" class="delete btn btn-danger btn-sm">Delete</button>' ;
                return $button ;
            })
            ->rawColumns(['action'])
            ->make(true) ;
        }

        $cardmodels = cardmodel::all() ;

        return view('login.carList')
        ->with('cardmodels', $cardmodels) ;
    }

    public function createCar(Request $request) {
       $validatedData = array (
           'car_name' => 'required ' ,
           'model_car' => 'required',
       ) ;
       $error = Validator::make($request->all(), $validatedData);
       if($error->fails()) {

        return response()->json(['errors' => $error->errors()->all()]);

       }

        $cars = new Car ;
        $cars->name = $request->car_name ;
        $cars->carModel_id = $request->model_car;
        $cars->save() ;

        return response()->json(['success' => 'Thêm thành công']) ;
    }

    public function editCar($id) {

        $cars = Car::findOrFail($id) ;

        return response()->json(['result' => $cars]) ;
    }

    public function updateCar(Request $request ) {
        $validatedData = array (
            'car_name' => 'required' ,
            'model_car' => 'required',
        ) ;
        $error = Validator::make($request->all(), $validatedData);
        if($error->fails()) {
 
         return response()->json(['errors' => $error->errors()->all()]);
 
        }

        $car = Car::findOrFail($request->hidden_id) ;
        $car->name = $request->car_name ;
        $car->carModel_id = $request->model_car ;

        $car->save() ;

        return response()->json(['success' => 'Sửa thành công']) ;
    }

    public function deleteCar($id) { 

        $car = Car::findOrFail($id) ;
        $car->delete() ;

    }
}
