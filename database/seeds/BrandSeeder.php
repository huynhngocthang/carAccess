<?php

use App\brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = new brand() ;
        $brands->id = 1 ;
        $brands->name = 'TOYOTA' ;
        $brands->save() ;

        $brands = new brand() ;
        $brands->id = 2 ;
        $brands->name = 'HONDA' ;
        $brands->save() ;

        $brands = new brand() ;
        $brands->id = 3 ;
        $brands->name = 'FORD' ;
        $brands->save() ;
    }
}
