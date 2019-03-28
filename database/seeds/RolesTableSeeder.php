<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        DB::table('roles')->insert([
            [
                'name'       => 'admin',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'user',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);
    }
}
