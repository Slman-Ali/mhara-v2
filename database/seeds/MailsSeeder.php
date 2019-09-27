<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Student;
use Illuminate\Support\Carbon;
use App\User;

class MailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all()->count();
        $cnt = 0;
        for($i = 1 ;$i <= $users ; $i++){
            for($j = 1;$j <= $users;++$j){
                if(rand(0,10000) <= 9950)continue;
                if(++$cnt > 5000)break;
                DB::table('mhara_mails')->insert([
                    'from' => $i,
                    'to' => $j,
                    'subject' => Str::random(),
                    'content' => Str::random(100),
                    'status' => random_int(0,1),
                    'created_at' => Carbon::now()
                ]);
            }
        }
    }
}
