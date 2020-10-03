<?php

use App\Maker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(MakerSeeder::class) ;
        $this->call(BrandSeeder::class) ;
        $this->call(CardmodelSeeder::class) ;
        $this->call(ProductSeeder::class) ;
        $this->call(ProductcarSeeder::class) ;
        $this->call(UserSeeder::class) ;
    }
}
