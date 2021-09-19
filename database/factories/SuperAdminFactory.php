<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class SuperAdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
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
        ];
    }
}
