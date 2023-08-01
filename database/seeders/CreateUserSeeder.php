<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'name'=>'Admin',
               'email'=>'admin@admin.com',
               'type'=>0,
               'password'=> hash::make('admin12345'),
            ],
            [
               'name'=>'Supplier',
               'email'=>'supplier@supplier.com',
               'type'=> 1,
               'password'=> hash::make('supplier12345'),
            ],
            [
                'name'=>'Kepala Gudang',
                'email'=>'gudang@gudang.com',
                'type'=> 2,
                'password'=> hash::make('gudang12345'),
             ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
