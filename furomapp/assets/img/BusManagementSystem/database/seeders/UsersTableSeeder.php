<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::factory()->create([

            'name'=> 'Admin', 
            'mname' => 'User' ,
            'lname' => 'Abebe', 
            'username' => 'admin',
            'phone' => "+25190000000",
            'position' => "Adminstor" ,
            'age' => 25 ,
            'expriance' => 5,
            'gender' => 'male' ,
            'profile' => 'images/user.png' ,
            'email' => 'admin@gmail.com' ,  
            'password' => Hash::make('12345678'),
             'type' => 1,
        ]);
    

    User::factory()->create([
        'name'=> 'system', 
        'mname' => 'admin' ,
        'lname' => 'yohanes', 
        'username' => 'yohanes',
        'phone' => "+25190000000",
        'position' => "system Adminstor" ,
        'age' => 25 ,
        'expriance' => 5,
        'gender' => 'male' ,
        'profile' => 'images/user.png' ,
        'email' => 'superadmin@gmail.com' ,  
        'password' => Hash::make('12345678'),
         'type' => 0,
    ]);



User::factory()->create([

    'name'=> 'driver', 
    'mname' => 'driver' ,
    'lname' => 'lema', 
    'username' => 'driver',
    'phone' => "+25190000000",
    'position' => "driver" ,
    'age' => 25 ,
    'expriance' => 5,
    'gender' => 'male' ,
    'profile' => 'images/user.png' ,
    'email' => 'driver@gmail.com' ,  
    'password' => Hash::make('12345678'),
     'type' => 2,
]);


User::factory()->create([

    'name'=> 'maint', 
    'mname' => 'maintanance' ,
    'lname' => 'Chala', 
    'username' => 'chala',
    'phone' => "+25190000000",
    'position' => "maintainance" ,
    'age' => 25 ,
    'expriance' => 5,
    'gender' => 'male' ,
    'profile' => 'images/user.png' ,
    'email' => 'maintainance@gmail.com' ,  
    'password' => Hash::make('12345678'),
     'type' => 3,
]);

}
}

