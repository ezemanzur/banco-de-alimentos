<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('neighborhoods')->insert(array(
            'name' => 'La Plata',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ));
        DB::table('neighborhoods')->insert(array(
            'name' => 'Tolosa',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ));
        DB::table('neighborhoods')->insert(array(
            'name' => 'City Bell',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ));
    }
}
