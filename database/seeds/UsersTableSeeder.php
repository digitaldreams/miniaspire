<?php


use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'first_name' => 'Tuhin',
            'last_name' => 'Bepari',
            'email' => 'digitaldreams40@gmail.com',
            'password' => bcrypt('123456'),
            'address' => 'Mirpur, Dhaka',
            'status' => User::STATUS_ACTIVE,
        ]);
        $admin->roles()->sync(Role::all()->pluck('id')->toArray());

        $user = User::create([
            'first_name' => 'Demo',
            'last_name' => 'User',
            'email' => 'rosemichele12@gmail.com',
            'password' => bcrypt('123456'),
            'address' => 'Dhaka, Bangladesh',
            'status' => User::STATUS_ACTIVE,
        ]);
        $user->roles()->sync(Role::slug(Role::USER)->pluck('id')->toArray());

    }
}
