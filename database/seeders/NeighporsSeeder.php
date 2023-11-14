<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NeighporsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $neighpors = array(

        array('name_ar'=>'الربيع', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الندى', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الصحافة', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'النرجس', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'العارض', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'النفل', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'العقيق', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الوادي', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الغدير', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الياسمين', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الربيع', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الفلاح', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'بنبان', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'القيروان', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'حطين', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الملقا', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الروضة', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الرمال', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'المونسية', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'قرطبة', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الجنادرية', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'القادسية', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'اليرموك', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'غرناطة', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'أشبيلية', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الحمراء', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'المعيزلية', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الخليج', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الملك فيصل', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'القدس', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'النهضة', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الأندلس', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'العليا', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'السليمانية', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الربيع', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الملك عبد العزيز', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الملك عبدالله', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الورود', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'صلاح الدين', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الملك فهد', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'المرسلات', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'النزهة', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'المغرزات', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'المروج', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'المصيف', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'التعاون', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الإزدهار', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'المعذر', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'المحمدية', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الرحمانية', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الرائد', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'النخيل', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'أم الحمام الشرقة', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'أم الحمام الغربي', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'السفارات', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'المهدية', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'عرقة', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'ظهرة لبن', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الخزامى', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'النسيم الشرقي', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'النزهة', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'النسيم الغربي', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'السلام', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الريان', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الروابي', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'النظيم', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'المنار', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الندوة', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'جرير', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الربوة', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الزهراء', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الصفا', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الضباط', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الملز', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الوزارات', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الفاروف', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'العمل', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'ثليم', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'المربع', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الفوطة', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الرفيعة', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الهدا', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الشرقية', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الناصرية', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'صياح', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الوشام', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'النموذجية', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'المؤتمرات', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'البديعة', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'أم سليم', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الشميسي', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الجرادية', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الفاخرية', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'عليشة', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'وادي لبن', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'العريجاء', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'العريجاء الوسطى', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'العريجاء الغربية', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الدريهمية', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'شبرا', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'السويدي', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'السويدي الغربي', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'ظهرة البديعة', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'سلطانة', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الزهرة', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'هجرة وادي لبن', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'ظهرة نمار', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'ديراب', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'نمار', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الحزم', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'أحد', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'عكاظ', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الشفاء', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'المروة', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'بدر', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'المصانع', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'المنصورية', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'عريض', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'العماجية', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'خشم العان', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الدفاع', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'المناخ', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'السلي', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'النور (الرياض)', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الإسكان', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الصناعية الجديدة', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الفيحاء', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الجزيرة', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'السعادة', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'هيت', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الإسكان', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'البرية', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'المشاعل', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الدوبية', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'القرى', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الصناعية', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الوسيطاء', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'معكال', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الفيصلية', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'منفوحة', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'المنصورة', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'اليمامة', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'السلام', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'جبرة', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'غبيراء', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'عتيقة', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'البطيحا', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الخالدية', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الديرة', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'العود', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'المرقب', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'منفوحة الجديدة', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'العزيزية', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'طيبة', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'المصفاة', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الدار البيضاء', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'المصانع', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'المنصورة', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الحاير', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
        array('name_ar'=>'الغنامية', 'name_eng'=>'', 'region_id'=>1, 'province_id'=>1, 'city_id'=>1),
                        
        );

        DB::table('neighbors')->insert($neighpors);

    }
}
