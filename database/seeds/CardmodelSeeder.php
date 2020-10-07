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
        $cardModel->name = 'HONDA CR_V' ;
        $cardModel->maker_id = 2 ;
        $cardModel->save() ;

    }
}
