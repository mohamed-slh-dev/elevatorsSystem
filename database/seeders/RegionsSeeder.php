<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $regions = array( 
                   array('name_ar'=> 'المنطقة الوسطى' , 'name_eng'=> 'Central Region'),
                   array('name_ar'=> 'المنطقة الغربية' , 'name_eng'=> 'Western Region'),
                   array('name_ar'=> 'المنطقة الشرقية' , 'name_eng'=> 'Eastern Region'),
                   array('name_ar'=> 'المنطقة الشمالية' , 'name_eng'=> 'Northern Region'),
                   array('name_ar'=> 'المنطقة الجنوبية' , 'name_eng'=> 'Southern Region'),
                 );

        DB::table('regions')->insert($regions);


    }
}
