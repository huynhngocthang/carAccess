<?php

use Illuminate\Database\Seeder;
use App\Maker ;
class MakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $makers = new Maker() ;
        $makers->id = 1 ;
        $makers->name = 'Toyota' ;
        $makers->save() ;

        $makers = new Maker() ;
        $makers->id = 2 ;
        $makers->name = 'Honda' ;
        $makers->save() ;

        $makers = new Maker() ;
        $makers->id = 3 ;
        $makers->name = 'Ford' ;
        $makers->save() ;
    }
}
