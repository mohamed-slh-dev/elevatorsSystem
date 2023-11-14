<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $cities = array(

                        //riyadh citites
                        array('name_ar'=>'الرياض', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 1 ),
                        array('name_ar'=>'الدلم', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 1 ),
                        array('name_ar'=>'الزلفى', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 1 ),
                        array('name_ar'=>'السيح', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 1 ),
                        array('name_ar'=>'العيينة', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 1 ),
                        array('name_ar'=>'المجمعة', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 1 ),
                        array('name_ar'=>'ليلى(الأفلاج)', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 1 ),
                        array('name_ar'=>'الأفلاج', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 1 ),
                        array('name_ar'=>'الحريق', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 1 ),
                        array('name_ar'=>'الخرج', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 1 ),
                        array('name_ar'=>'الدوادمي', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 1 ),
                        array('name_ar'=>'السليل', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 1 ),
                        array('name_ar'=>'الغاط', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 1 ),
                        array('name_ar'=>'المزاحمية', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 1 ),
                        array('name_ar'=>'ثادق', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 1 ),
                        array('name_ar'=>'حريملاء', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 1 ),
                        array('name_ar'=>'حوطة بني تميم', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 1 ),
                        array('name_ar'=>'رماح', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 1 ),
                        array('name_ar'=>'ضرما', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 1 ),
                        array('name_ar'=>'عفيف', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 1 ),
                        array('name_ar'=>'مرات', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 1 ),
                        array('name_ar'=>'وادي الدواسر', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 1 ),
                        array('name_ar'=>'الرين', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 1 ),


                        //qasim citites
                        array('name_ar'=>'بريدة', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 2 ),
                        array('name_ar'=>'عنيزة', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 2 ),
                        array('name_ar'=>'الرس', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 2 ),
                        array('name_ar'=>'المذنب', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 2 ),
                        array('name_ar'=>'البكيرية', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 2 ),
                        array('name_ar'=>'البدائع', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 2),
                        array('name_ar'=>'الأسياح', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 2 ),
                        array('name_ar'=>'النبهانية', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 2 ),
                        array('name_ar'=>'عيون الحواء', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 2 ),
                        array('name_ar'=>'رياض الخبراء', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 2 ),
                        array('name_ar'=>'الشماسية', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 2 ),
                        array('name_ar'=>'عقلة الصقور', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 2 ),
                        array('name_ar'=>'ضرية', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 2 ),
                        array('name_ar'=>'أبانات', 'name_eng'=>'', 'region_id'=> 1, 'province_id'=> 2 ),

                        //macca cities
                        array('name_ar'=>'مكة', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 3 ),
                        array('name_ar'=>'جدة', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 3 ),
                        array('name_ar'=>'الطائف', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 3 ),
                        array('name_ar'=>'رابغ', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 3 ),
                        array('name_ar'=>'الكامل', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 3 ),
                        array('name_ar'=>'القنفذة', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 3 ),
                        array('name_ar'=>'تربة', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 3 ),
                        array('name_ar'=>'الليث', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 3 ),
                        array('name_ar'=>'الجموم', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 3 ),
                        array('name_ar'=>'خليص', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 3 ),
                        array('name_ar'=>'أضم', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 3 ),
                        array('name_ar'=>'الخرمة', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 3 ),
                        array('name_ar'=>'رنية', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 3 ),
                        array('name_ar'=>'العرضيات', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 3 ),
                        array('name_ar'=>'الموية', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 3 ),
                        array('name_ar'=>'ميسان', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 3 ),
                        array('name_ar'=>'بحرة', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 3 ),

                        //madinah cities
                        array('name_ar'=>'الباطح', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 4 ),
                        array('name_ar'=>'الجياسر', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 4 ),
                        array('name_ar'=>'الحسو', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 4 ),
                        array('name_ar'=>'الحناكية', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 4 ),
                        array('name_ar'=>'الرايس', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 4 ),
                        array('name_ar'=>'الرذايا', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 4 ),
                        array('name_ar'=>'العلا', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 4 ),
                        array('name_ar'=>'العيص', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 4 ),
                        array('name_ar'=>'الفريش', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 4 ),
                        array('name_ar'=>'المسيجيد', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 4 ),
                        array('name_ar'=>'الواسطة (بدر)', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 4 ),
                        array('name_ar'=>'بحرة', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 4 ),
                        array('name_ar'=>'بدر(المدينة المنورة)', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 4 ),
                        array('name_ar'=>'خيبر', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 4 ),
                        array('name_ar'=>'الفرع', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 4 ),
                        array('name_ar'=>'الحناكية', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 4 ),
                        array('name_ar'=>'المدينة المنورة', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 4 ),
                        array('name_ar'=>'مهد الذهب', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 4 ),
                        array('name_ar'=>'وادي الفرع', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 4 ),
                        array('name_ar'=>'ينبع', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 4 ),
                        array('name_ar'=>'ينبع الصناعية', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 4 ),
                       

                        //jeddah citites
                        array('name_ar'=>'ثول الفرعية', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 5 ),
                        array('name_ar'=>'طيبة الفرعية', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 5 ),
                        array('name_ar'=>'ذهبان الفرعية', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 5 ),
                        array('name_ar'=>'بريمان الفرعية', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 5 ),
                        array('name_ar'=>'أبحر الفرعية', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 5 ),
                        array('name_ar'=>'المطار', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 5 ),
                        array('name_ar'=>'جدة الجديدية الفرعية', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 5 ),
                        array('name_ar'=>'أم السلم الفرعية', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 5 ),
                        array('name_ar'=>'العزيزية الفرعية', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 5 ),
                        array('name_ar'=>'الشرفية الفرعية', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 5 ),
                        array('name_ar'=>'الجامعة الفرعية', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 5 ),
                        array('name_ar'=>'البلد الفرعية', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 5 ),
                        array('name_ar'=>'جدة التاريخية', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 5 ),
                        array('name_ar'=>'الجنوب الفرعية', 'name_eng'=>'', 'region_id'=> 2, 'province_id'=> 5 ),


                        //dammam cities
                        array('name_ar'=>'الدمام', 'name_eng'=>'', 'region_id'=> 3, 'province_id'=> 6 ),
                        array('name_ar'=>'الجبيل', 'name_eng'=>'', 'region_id'=> 3, 'province_id'=> 6 ),
                        array('name_ar'=>'الخبر', 'name_eng'=>'', 'region_id'=> 3, 'province_id'=> 6 ),
                        array('name_ar'=>'الظهران', 'name_eng'=>'', 'region_id'=> 3, 'province_id'=> 6 ),
                        array('name_ar'=>'القطيف', 'name_eng'=>'', 'region_id'=> 3, 'province_id'=> 6 ),
                        array('name_ar'=>'الخفجي', 'name_eng'=>'', 'region_id'=> 3, 'province_id'=> 6 ),
                        array('name_ar'=>'النعيرية', 'name_eng'=>'', 'region_id'=> 3, 'province_id'=> 6 ),
                        array('name_ar'=>'راس تنورة', 'name_eng'=>'', 'region_id'=> 3, 'province_id'=> 6 ),
                        

                        //alehsa citites
                        array('name_ar'=>'الهفوف', 'name_eng'=>'', 'region_id'=> 3, 'province_id'=> 8 ),
                        array('name_ar'=>'المبرز', 'name_eng'=>'', 'region_id'=> 3, 'province_id'=> 8 ),
                        array('name_ar'=>'العيون', 'name_eng'=>'', 'region_id'=> 3, 'province_id'=> 8 ),
                        array('name_ar'=>'الطرف', 'name_eng'=>'', 'region_id'=> 3, 'province_id'=> 8 ),
                        array('name_ar'=>'العمران', 'name_eng'=>'', 'region_id'=> 3, 'province_id'=> 8 ),
                        array('name_ar'=>'الجفر', 'name_eng'=>'', 'region_id'=> 3, 'province_id'=> 8 ),
                      

                        //tabouk cities
                        array('name_ar'=>'تبوك', 'name_eng'=>'', 'region_id'=> 4, 'province_id'=> 9 ),
                        array('name_ar'=>'أملج', 'name_eng'=>'', 'region_id'=> 4, 'province_id'=> 9 ),
                        array('name_ar'=>'البدع', 'name_eng'=>'', 'region_id'=> 4, 'province_id'=> 9 ),
                        array('name_ar'=>'محافظة تبوك', 'name_eng'=>'', 'region_id'=> 4, 'province_id'=> 9 ),
                        array('name_ar'=>'محافطة تيماء', 'name_eng'=>'', 'region_id'=> 4, 'province_id'=> 9 ),
                        array('name_ar'=>'محافظة حقل', 'name_eng'=>'', 'region_id'=> 4, 'province_id'=> 9 ),
                        array('name_ar'=>'محافظة ضباء', 'name_eng'=>'', 'region_id'=> 4, 'province_id'=> 9 ),
                        array('name_ar'=>'محافظة الوجه', 'name_eng'=>'', 'region_id'=> 4, 'province_id'=> 9 ),


                        //aljouf cities
                        array('name_ar'=>'محافظة الوجه', 'name_eng'=>'', 'region_id'=> 4, 'province_id'=> 10),
                        array('name_ar'=>'محافظة دومة الجندل', 'name_eng'=>'', 'region_id'=> 4, 'province_id'=> 10),
                        array('name_ar'=>'محافظة سكاكا', 'name_eng'=>'', 'region_id'=> 4, 'province_id'=> 10),
                        array('name_ar'=>'محافظة القريات', 'name_eng'=>'', 'region_id'=> 4, 'province_id'=> 10),
                        array('name_ar'=>'محافظة طبرجل', 'name_eng'=>'', 'region_id'=> 4, 'province_id'=> 10),
                       
                        //haiel cities
                        array('name_ar'=>'حائل', 'name_eng'=>'', 'region_id'=> 4, 'province_id'=> 11),
                        array('name_ar'=>'محافظة بقعاء', 'name_eng'=>'', 'region_id'=> 4, 'province_id'=> 11),
                        array('name_ar'=>'سقف', 'name_eng'=>'', 'region_id'=> 4, 'province_id'=> 11),
                        array('name_ar'=>'محافظة الغزالة', 'name_eng'=>'', 'region_id'=> 4, 'province_id'=> 11),
                        array('name_ar'=>'محافظة الحائط', 'name_eng'=>'', 'region_id'=> 4, 'province_id'=> 11),
                        array('name_ar'=>'محافظة السليمي', 'name_eng'=>'', 'region_id'=> 4, 'province_id'=> 11),
                        array('name_ar'=>'محافظة الشملي', 'name_eng'=>'', 'region_id'=> 4, 'province_id'=> 11),
                        array('name_ar'=>'محافظة الشنان', 'name_eng'=>'', 'region_id'=> 4, 'province_id'=> 11),
                        array('name_ar'=>'محافظة سميراء', 'name_eng'=>'', 'region_id'=> 4, 'province_id'=> 11),
                        array('name_ar'=>'محافظة موقق', 'name_eng'=>'', 'region_id'=> 4, 'province_id'=> 11),
                        array('name_ar'=>'موقق', 'name_eng'=>'', 'region_id'=> 4, 'province_id'=> 11),


                        //aseer cities
                        array('name_ar'=>'محافظة أبها', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 12),
                        array('name_ar'=>'محافظة الأمواه', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 12),
                        array('name_ar'=>'محافظة أحد رفيدة', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 12),
                        array('name_ar'=>'محافظة الحرجة', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 12),
                        array('name_ar'=>'محافظة بارق', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 12),
                        array('name_ar'=>'محافظة البرك', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 12),
                        array('name_ar'=>'محافظة بلقرن', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 12),
                        array('name_ar'=>'محافظة بيشة', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 12),
                        array('name_ar'=>'محافظة تثليث', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 12),
                        array('name_ar'=>'محافظة تنومة', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 12),
                        array('name_ar'=>'محافظة خميس مشيط', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 12),
                        array('name_ar'=>'محافظة رجال ألمع', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 12),
                        array('name_ar'=>'محافظة سراة عبيدة', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 12),
                        array('name_ar'=>'محافظة طريب', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 12),
                        array('name_ar'=>'محافظة ظهران الجنوب', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 12),
                        array('name_ar'=>'محافظة المجاردة', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 12),
                        array('name_ar'=>'محافظة محايل عسير', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 12),
                        array('name_ar'=>'محافظة النماص', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 12),


                        //najran citites
                        array('name_ar'=>'نجران', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 13),
                        array('name_ar'=>'محافظة بدر الجنوب', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 13),
                        array('name_ar'=>'محافظة ثار', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 13),
                        array('name_ar'=>'محافظة حبونا', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 13),
                        array('name_ar'=>'محافظة خباش', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 13),
                        array('name_ar'=>'محافظة شرورة', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 13),
                        array('name_ar'=>'محافظة يدمة', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 13),

                        //jazan cities
                        array('name_ar'=>'جازان', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 14),
                        array('name_ar'=>'محافظة أبو عريش ', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 14),
                        array('name_ar'=>'محافظة أحد المسارحة', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 14),
                        array('name_ar'=>'محافظة الحرث', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 14),
                        array('name_ar'=>'محافظة الدائر', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 14),
                        array('name_ar'=>'محافظة الدرب', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 14),
                        array('name_ar'=>'محافظة الريث', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 14),
                        array('name_ar'=>'محافظة الطوال', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 14),
                        array('name_ar'=>'محافظة العارضة', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 14),
                        array('name_ar'=>'محافظة العيدابي', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 14),
                        array('name_ar'=>'محافظة بيش', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 14),
                        array('name_ar'=>'محافظة صامطة', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 14),
                        array('name_ar'=>'محافظة صبيا', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 14),
                        array('name_ar'=>'محافظة ضمد', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 14),
                        array('name_ar'=>'محافظة فرسان', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 14),
                        array('name_ar'=>'محافظة فيفاء', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 14),
                        array('name_ar'=>'محافظة هروب', 'name_eng'=>'', 'region_id'=> 5, 'province_id'=> 14),
                      
        );


        DB::table('cities')->insert($cities);

        
    }
}
