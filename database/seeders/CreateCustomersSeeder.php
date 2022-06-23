<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CreateCustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = [
            [
                'first_name' => 'cst',
                'last_name' => 'cst',
                'username' => 'cst',
                'telephone' => '0989898989',
                'email' => 'cst@cst.com',
                'admin_user' => '0',
                'password' => bcrypt('123456'),
            ],
        ];

        foreach ($customer as $key => $value) {
            Customer::create($value);
        }
    }
}
