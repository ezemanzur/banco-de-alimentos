<?php

use Illuminate\Database\Seeder;

class categories_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(array(
            'name' => 'Aceite de girasol 1.5L',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ));
        DB::table('categories')->insert(array(
            'name' => 'Aceite de girasol 1L',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ));
        DB::table('categories')->insert(array(
            'name' => 'Arroz 1kg',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ));
        DB::table('categories')->insert(array(
            'name' => 'Arroz 500g',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ));
        DB::table('categories')->insert(array(
            'name' => 'Harina 000 1Kg',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ));
        DB::table('categories')->insert(array(
            'name' => 'Harina 0000 1Kg',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ));
        DB::table('categories')->insert(array(
            'name' => 'Harina Leudante  1Kg',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ));
        DB::table('categories')->insert(array(
            'name' => 'Azúcar 1Kg',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ));
        DB::table('categories')->insert(array(
            'name' => 'Leche 1L',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ));
        DB::table('categories')->insert(array(
            'name' => 'Azúcar 1Kg',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ));
        DB::table('categories')->insert(array(
            'name' => 'Yerba mate 1Kg',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ));
        DB::table('categories')->insert(array(
            'name' => 'Yerba mate 500g',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ));
        DB::table('categories')->insert(array(
            'name' => 'Leche larga vida 1L',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ));
    }
}
