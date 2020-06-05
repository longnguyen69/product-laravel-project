<?php

use Illuminate\Database\Seeder;

class ListProduct extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataArray = [];
        for ($i=0;$i<20;$i++){
            array_push($dataArray,[
                'username'=>\Illuminate\Support\Str::random(10),
                'password'=>\Illuminate\Support\Str::random(40),
                'content'=>\Illuminate\Support\Str::random(200),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ]);
        }
        \Illuminate\Support\Facades\DB::table('users')->insert($dataArray);
    }
}
