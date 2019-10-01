<?php

use App\Models\AvailableTime;
use Illuminate\Database\Seeder;

class AvailableTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $available_times = [
            "timer period 1" => "الصبح",
            "timer period 2" => "الظهر",
            "timer period 3" => "العصر",
            "timer period 4" => "المسا",
            "timer period 5" => "كل الأوقات",
        ];

        foreach($available_times as $en => $ar){
            $available_time = new AvailableTime();
            $available_time->name_ar = $ar;
            $available_time->name_en = $en;
            $available_time->save();
        }
    }
}
