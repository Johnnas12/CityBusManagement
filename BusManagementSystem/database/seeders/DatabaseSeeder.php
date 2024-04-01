<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $users = [
            [
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
            ],
            [
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
            ],
            [
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
            ], 
            [
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
            ]

        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
