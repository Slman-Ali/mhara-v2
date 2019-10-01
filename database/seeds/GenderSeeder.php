<?php

use App\Models\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genders = [
            "male" => "ذكر",
            "famale" => "أنثى",
        ];

        foreach ($genders as $en => $ar) {
            $gender = new Gender();
            $gender->name_ar = $ar;
            $gender->name_en = $en;
            $gender->save();
        }
    }
}
