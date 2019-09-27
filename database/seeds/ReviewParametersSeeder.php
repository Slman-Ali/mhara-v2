<?php

use App\models\ReviewParameter;
use Illuminate\Database\Seeder;

class ReviewParametersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            "Teacher’s skill and knowledge" => "مهارة وعلم المدرب",
            "The course book or/and materials" => "المادة التدريبة أو التعليمية",
            "Course value compared with course fees" => "قيمة الدورة مقارنة مع سعرها",
            "The centre’s overall management and services" => "خدمات و تعامل المركز بشكل عام",
            "Overall evaluation of the experience" => "التقييم الكلي للتجربة",
             
        ];

        foreach($types as $type_en => $type_ar){
            $tmp = new ReviewParameter();
            $tmp->name_en = $type_en;
            $tmp->name_ar = $type_ar;
            if($type_en == "Overall evaluation of the experience")$tmp->is_final = true;
            $tmp->save();
        }
    }
}
