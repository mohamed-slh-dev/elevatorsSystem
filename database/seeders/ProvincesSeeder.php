<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvincesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $provinces = array( 
            array('name_ar'=>'الرياض' , 'name_eng'=>'Riaydh', 'region_id'=> 1),
            array('name_ar'=>'القصيم' , 'name_eng'=>'Qasim', 'region_id'=> 1),
            array('name_ar'=>'مكة' , 'name_eng'=>'Mecca', 'region_id'=> 2),
            array('name_ar'=>'المدينة' , 'name_eng'=>'Medina', 'region_id'=> 2),
            array('name_ar'=>'جدة' , 'name_eng'=>'Jeddah', 'region_id'=> 2),
            array('name_ar'=>'الدمام' , 'name_eng'=>'Dammam', 'region_id'=> 3),
            array('name_ar'=>'الخفجي' , 'name_eng'=>'Khafji', 'region_id'=> 3),
            array('name_ar'=>'الإحساء' , 'name_eng'=>'Alhasa', 'region_id'=> 3),
            array('name_ar'=>'تبوك' , 'name_eng'=>'Tabuk', 'region_id'=> 4),
            array('name_ar'=>'الجوف' , 'name_eng'=>'Jouf', 'region_id'=> 4),
            array('name_ar'=>'حائل' , 'name_eng'=>'Hail', 'region_id'=> 4),
            array('name_ar'=>'عسير' , 'name_eng'=>'Aseer', 'region_id'=> 5),
            array('name_ar'=>'نجران' , 'name_eng'=>'Najran', 'region_id'=> 5),
            array('name_ar'=>'جيزان' , 'name_eng'=>'Jazan', 'region_id'=> 5),

        );

        DB::table('provinces')->insert($provinces);

        
    }
}
