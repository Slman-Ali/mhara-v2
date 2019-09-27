<?php

use Illuminate\Database\Seeder;
use App\Models\City;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ar = [
            "Damascus"  =>  "دمشق",
            "Aleppo"  =>  "حلب",
            "Tartus"  =>  "طرطوس",
            "Homs"  =>  "حمص",
            "Lattakia"  =>  "اللاذقية",
            "Al-Suwayda"  =>  "السويداء",
            "Daraa"  =>  "درعا",
            "Deir Al-Zor"  =>  "دير الزور",
            "Al-Hasakah"  =>  "الحسكة",
            "Al-Qamishli"  =>  "القامشلي",
            "Al-Raqqah"  =>  "الرقة",
            "Hama"  =>  "حماة",
            "Idlib"  =>  "إدلب",
            "Al-Quneitra"  =>  "القنيطرة"

        ];
        foreach($ar as $en => $ar) {
            $city = new City;
            $city->name_en = $en;
            $city->name_ar = $ar;
            $city->save();
        }
    }
}
