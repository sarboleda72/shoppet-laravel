<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User;
        $user->name     ='Santiago';
        $user->lastname ='Arboleda';
        $user->document ='1053535353';
        $user->address  ='cl 100 #21-23';
        $user->phone    ='31313131313';
        $user->email    ='santiago@uam.com';
        $user->password =bcrypt('santiago');
        $user->role     ="Admin";
        $user->save();
    }
}
