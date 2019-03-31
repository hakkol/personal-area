<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        DB::table('statuses')->insert([
            [
                'name'       => 'processing',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'purchased',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);
    }
}
