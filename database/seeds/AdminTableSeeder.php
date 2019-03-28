<?php

use Illuminate\Database\Seeder;

use App\Models\Role;

use Carbon\Carbon;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name', 'admin')->first();

        if (!$role) return;

        $now = Carbon::now();

        DB::table('users')->insert([
            'name'       => 'admin',
            'email'      => env('ADMIN_EMAIL', 'admin@local.host'),
            'password'   => bcrypt(env('ADMIN_PASSWORD','12341234')),
            'role_id'    => $role->id,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
