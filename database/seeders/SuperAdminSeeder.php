<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::created([
            'first_name' => 'Waqas',
            'last_name'  => 'Dev',
            'username'   => 'WaqasDev',
            'email'      => 'admin@admin.com',
            'phone'      => '123-123-1234',
            'city'       => 'Faisalabad',
            'state'      => 'Panjab',
            'address'    => 'Faisalabad,punjab Pakistan',
            'postal_code'=> '38000',
            'super_admin'=> true,
            'password'   => Hash::make('password'),
        ]);
    }
}
