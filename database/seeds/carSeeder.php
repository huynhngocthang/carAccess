<?php

use App\Car;
use Illuminate\Database\Seeder;

class carSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cars = new Car() ;
        $cars->id =1 ;
        $cars->name = 'CX5';
        $cars->carModel_id = 1 ;
        $cars->save() ;

        $cars = new Car() ;
        $cars->id =2 ;
        $cars->name = 'FORD_RANFER';
        $cars->carModel_id = 2 ;
        $cars->save() ;

        $cars = new Car() ;
        $cars->id =3 ;
        $cars->name = 'CX8';
        $cars->carModel_id = 2 ;
        $cars->save() ;
    }
}
