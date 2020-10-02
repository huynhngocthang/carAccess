<?php

use App\cardmodel;
use Illuminate\Database\Seeder;

class CardmodelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cardModel = new cardmodel() ;
        $cardModel->id = 1 ;
        $cardModel->name = 'Camry' ;
        $cardModel->maker_id = 1 ;
        $cardModel->save() ;

        $cardModel = new cardmodel() ;
        $cardModel->id = 2 ;
        $cardModel->name = 'Vios' ;
        $cardModel->maker_id = 1 ;
        $cardModel->save() ;

        $cardModel = new cardmodel() ;
        $cardModel->id = 3 ;
        $cardModel->name = 'Innova' ;
        $cardModel->maker_id = 1 ;
        $cardModel->save() ;

        $cardModel = new cardmodel() ;
        $cardModel->id = 4 ;
        $cardModel->name = 'Honda Civic' ;
        $cardModel->maker_id = 2 ;
        $cardModel->save() ;

        $cardModel = new cardmodel() ;
        $cardModel->id = 5 ;
        $cardModel->name = 'Honda HR_V' ;
        $cardModel->maker_id = 2 ;
        $cardModel->save() ;

        $cardModel = new cardmodel() ;
        $cardModel->id = 6 ;
        $cardModel->name = 'HONDA CR_V' ;
        $cardModel->maker_id = 2 ;
        $cardModel->save() ;

        $cardModel = new cardmodel() ;
        $cardModel->id = 7 ;
        $cardModel->name = 'SUV' ;
        $cardModel->maker_id = 3 ;
        $cardModel->save() ;

        $cardModel = new cardmodel() ;
        $cardModel->id = 8 ;
        $cardModel->name = 'MPV' ;
        $cardModel->maker_id = 3 ;
        $cardModel->save() ;

        $cardModel = new cardmodel() ;
        $cardModel->id = 9 ;
        $cardModel->name = 'Xe thương mại' ;
        $cardModel->maker_id = 3 ;
        $cardModel->save() ;
    }
}
