<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Customer;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin@123',
        ]);

        Customer::create([
            'user_id'                                  => $user->id,
            'user_type'                                => 'admin',
            'first_name'                               => 'admin',
            'last_name'                                => 'admin',
            'email'                                    => 'admin@gmail.com',
            'phone'                                    => '03060000417',
            'address'                                  => 'admin address',
            'city'                                     => 'Faisalabad',
            'state'                                    => 'punjab',
            'zip'                                      => '38000',
            'password'                                 => 'admin123',
            'work_with_other_inspection_companies'     => 'no',
            'interested_in_doing_mobile_mechanic_work' => 'no',
        ]);

        // customer
        $user = User::factory()->create([
            'name' => 'customer',
            'email' => 'customer@gmail.com',
            'password' => 'admin123',
        ]);

        Customer::create([
            'user_id'                                  => $user->id,
            'user_type'                                => 'customer',
            'first_name'                               => 'customer',
            'last_name'                                => 'customer',
            'email'                                    => 'customer@gmail.com',
            'phone'                                    => '03060000417',
            'address'                                  => 'customer address',
            'city'                                     => 'Faisalabad',
            'state'                                    => 'punjab',
            'zip'                                      => '38000',
            'password'                                 => 'admin123',
            'work_with_other_inspection_companies'     => 'no',
            'interested_in_doing_mobile_mechanic_work' => 'no',
        ]);

        // Inspector
        $user = User::factory()->create([
            'name' => 'inspector',
            'email' => 'inspector@gmail.com',
            'password' => 'admin123',
        ]);

        Customer::create([
            'user_id'                                  => $user->id,
            'user_type'                                => 'inspector',
            'first_name'                               => 'inspector',
            'last_name'                                => 'inspector',
            'email'                                    => 'inspector@gmail.com',
            'phone'                                    => '03060000417',
            'address'                                  => 'inspector address',
            'city'                                     => 'Faisalabad',
            'state'                                    => 'punjab',
            'zip'                                      => '38000',
            'password'                                 => 'admin123',
            'work_with_other_inspection_companies'     => 'no',
            'interested_in_doing_mobile_mechanic_work' => 'no',
        ]);
    }
}
