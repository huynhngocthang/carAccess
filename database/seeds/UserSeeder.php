<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User() ;
        $user->name = 'binhkute' ;
        $user->email = 'binhde@gmail.com' ;
        $user->password = bcrypt('Matdanh123') ;
        $user->role = 1 ;
        $user->save() ;
    }
}
