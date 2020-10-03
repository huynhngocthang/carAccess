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
        $user->password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi" ;
        $user->role = 1 ;
        $user->save() ;
    }
}
