<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BanksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banks = array(
                    array('name'=>'البنك الأهلي السعودي'),
                    array('name'=>'بنك ساب'),
                    array('name'=>'البنك السعودي للاستثمار'),
                    array('name'=>'مصرف الإنماء'),
                    array('name'=>'البنك السعودي الفرنسي'),
                    array('name'=>'بنك الرياض'),
                    array('name'=>'مصرف الراجحي'),
                    array('name'=>'البنك العربي الوطني'),
                    array('name'=>'بنك البلاد'),
                    array('name'=>'بنك الجزيرة'),
                    array('name'=>'بنك الخليج الدولي'),

        );

        DB::table('banks')->insert($banks);


    }
}
