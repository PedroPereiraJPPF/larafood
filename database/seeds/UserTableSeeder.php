<?php

use App\Models\{
    User,
    Tenant
};
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = Tenant::first();

        $tenant->users()->create([
            'name' => 'joão',
            'email' => 'bee@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
