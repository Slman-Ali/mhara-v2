<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cnt_t = 1;
        $cnt_i = 1;

        for($i = 0; $i<1000;++$i){
            $type = rand(0,1);
            if(!$type){
                $table = "tutor_courses";
                $user_id = DB::select('SELECT * from tutors order by rand() limit 1');
                $user_id = $user_id[0]->user_id;
                $data = [
                    "user_id" => $user_id,
                    "slug" => "demo-course-$cnt_t",
                    "title_en" => "demo-course-$cnt_t",
                    "title_ar" => "كورس تجريبي-رقم-$cnt_t",
                    "title_ar_simplify" => "كورس تجريبي-رقم-$cnt_t",
                    "description" => "Lorem ipsum dolor sit amet, mel id nostrum pertinax, regione omittam fabellas has eu. Commodo aeterno appetere usu no, pro no unum fugit efficiantur. Mel no sensibus splendide, ancillae referrentur ex pro. Minim equidem has at, sit suas audiam te.
                                        Ex duis soleat cum. Ne viris accusata nam, nihil euismod an vim, iudico reprehendunt ea sit. Per at quem prima assentior, usu ad tota semper. An mea cibo semper. Sed atomorum consequuntur te, eu per solet imperdiet.",
                    "subject_id" => 1,
                    "image" => "img-".rand(1,8).".png",
                    "cost" => rand(10,100).rand(0,9)."00",
                    "hours" => rand(10 , 80),
                    "type" => rand(1,8),
                    "level" => rand(1,12),
                    "views" => rand(0,3000),
                    "rating" => rand(0,5) + round((float)rand() / (float)getrandmax(), 1),
                    "num_of_reviews" => rand(10,200)
                ];
                $cnt_t++;
            }else{
                $table = "institute_courses";
                $user_id = DB::select('SELECT * from institutes order by rand() limit 1');
                $user_id = $user_id[0]->user_id;
                $data = [
                    "user_id" => $user_id,
                    "slug" => "demo-course-$cnt_i",
                    "title_en" => "demo-course-$cnt_i",
                    "title_ar" => "كورس تجريبي-رقم-$cnt_i",
                    "title_ar_simplify" => "كورس تجريبي-رقم-$cnt_i",
                    "description" => "Lorem ipsum dolor sit amet, mel id nostrum pertinax, regione omittam fabellas has eu. Commodo aeterno appetere usu no, pro no unum fugit efficiantur. Mel no sensibus splendide, ancillae referrentur ex pro. Minim equidem has at, sit suas audiam te.
                                        Ex duis soleat cum. Ne viris accusata nam, nihil euismod an vim, iudico reprehendunt ea sit. Per at quem prima assentior, usu ad tota semper. An mea cibo semper. Sed atomorum consequuntur te, eu per solet imperdiet.",
                    "subject_id" => 1,
                    "image" => "img-".rand(1,8).".png",
                    "cost" => rand(10,100).rand(0,9)."00",
                    "hours" => rand(10 , 80),
                    "type" => rand(1,8),
                    "level" => rand(1,12),
                    "views" => rand(0,3000),
                    "rating" => rand(0,5) + round((float)rand() / (float)getrandmax(), 1),
                    "num_of_reviews" => rand(10,200),
                    "start_date" => "2019-05-01",
                    "finish_date" => "2019-09-01",
                    "start_hour" => rand(0,23),
                    "has_certificate" => rand(0,1),
                ];
                $cnt_i++;
            }
            DB::table($table)->insert($data);
        }
    }
}
