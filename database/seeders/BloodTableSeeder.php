<?php

namespace Database\Seeders;

use App\Models\type_Blood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type__bloods')->delete();
        $bgs = ['O-','0+','A+','A-','B+','B-','AB-','AB+'];
        foreach ($bgs as $bg)
            type_Blood::create(['name'=>$bg]);


    }
}
