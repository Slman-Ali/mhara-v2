<?php

use Illuminate\Database\Seeder;
use App\models\CourseLevel;
use App\models\CourseType;

class EnglishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            "IELTS" => "آيلتس",
            "TOFEL" => "توفل",
            "Speaking" => "محادثة",
            "Business English" => "الإنكليزية الخاصة بالأعمال",
            "English For Specific Purpose" => "الإنكليزية المخصصة",
            "Teacher Training" => "تدريب مدرسين",
            "Kids & Teens" => "الانكليزية للأطفال",
            "Others" => "غير ذلك",
             
        ];
        $levels = [
            "Beginner 1 (A1 - 1)" => "مبتدئ 1",
            "Beginner 2 (A1 - 2)" => "مبتدئ 2",
            "Elementary 1 (A2 - 1)" => "إعدادي 1",
            "Elementary 2 (A2 - 2)" => "إعدادي 2",
            "Pre-intermediate 1 (B1 - 1)" => "قبل المتوسط 1",
            "Pre-intermediate 2 (B1 - 2)" => "قبل المتوسط 2 ",
            "Intermediate 1 (B2 - 1)" => "متوسط 1",
            "Intermediate 2 (B2 - 2)" => "متوسط 2",
            "Upper-intermediate 1 (C1 - 1)" => "فوق المتوسط 1",
            "Upper-intermediate 2 (C1 - 2)" => "فوق المتوسط 2",
            "Advanced 1 (C2 - 1)" => "متقدم 1",
            "Advanced 2 (C2 - 2)" => "متقدم 2",
        ];

        foreach($types as $type_en => $type_ar){
            $tmp = new CourseType;
            $tmp->name_en = $type_en;
            $tmp->name_ar = $type_ar;
            $tmp->save();
        }

        foreach($levels as $level_en => $level_ar){
            $tmp = new CourseLevel;
            $tmp->name_en = $level_en;
            $tmp->name_ar = $level_ar;
            $tmp->save();
        }
    }
}
