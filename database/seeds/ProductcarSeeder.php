<?php

use App\productCar;
use Illuminate\Database\Seeder;

class ProductcarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productCars = new productCar() ;
        $productCars->id =1 ;
        $productCars->name = 'Camry 2.0G' ;
        $productCars->maker_id = 1;
        $productCars->carModel_id = 1 ;
        $productCars->save() ;

        $productCars = new productCar() ;
        $productCars->id =2 ;
        $productCars->name = 'Camry 2.5Q' ;
        $productCars->maker_id = 1;
        $productCars->carModel_id = 1 ;
        $productCars->save() ;

        $productCars = new productCar() ;
        $productCars->id =3 ;
        $productCars->name = 'Vios 1.5E MT' ;
        $productCars->maker_id = 1;
        $productCars->carModel_id = 2 ;
        $productCars->save() ;

        $productCars = new productCar() ;
        $productCars->id =4 ;
        $productCars->name = 'Innova Venturer' ;
        $productCars->maker_id = 1;
        $productCars->carModel_id = 3 ;
        $productCars->save() ;

        $productCars = new productCar() ;
        $productCars->id =5 ;
        $productCars->name = 'Innova G 2.OAT' ;
        $productCars->maker_id = 1;
        $productCars->carModel_id = 3 ;
        $productCars->save() ;

        $productCars = new productCar() ;
        $productCars->id =6 ;
        $productCars->name = 'Honda Civic RS' ;
        $productCars->maker_id = 2;
        $productCars->carModel_id = 4 ;
        $productCars->save() ;

        $productCars = new productCar() ;
        $productCars->id =7 ;
        $productCars->name = 'HONDA HR_V l' ;
        $productCars->maker_id = 2;
        $productCars->carModel_id = 5 ;
        $productCars->save() ;

        $productCars = new productCar() ;
        $productCars->id =8 ;
        $productCars->name = 'HONDA CR_V 1.5 G' ;
        $productCars->maker_id = 2;
        $productCars->carModel_id = 6 ;
        $productCars->save() ;

        $productCars = new productCar() ;
        $productCars->id =9 ;
        $productCars->name = 'Ecosport' ;
        $productCars->maker_id = 3;
        $productCars->carModel_id = 7 ;
        $productCars->save() ;

        $productCars = new productCar() ;
        $productCars->id =10 ;
        $productCars->name = 'Everest' ;
        $productCars->maker_id = 3;
        $productCars->carModel_id = 7 ;
        $productCars->save() ;

        $productCars = new productCar() ;
        $productCars->id =11 ;
        $productCars->name = 'New Tourneo' ;
        $productCars->maker_id = 3;
        $productCars->carModel_id = 8 ;
        $productCars->save() ;

        $productCars = new productCar() ;
        $productCars->id =12 ;
        $productCars->name = 'RANGER RAPTOR' ;
        $productCars->maker_id = 3;
        $productCars->carModel_id = 9 ;
        $productCars->save() ;

    }
}
