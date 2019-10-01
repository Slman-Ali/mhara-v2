<?php

use App\Helpers\MyHelper;
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
      
        for($i = 0; $i<100;++$i){
            $type = rand(0,1);
            if(!$type){
                $table = "tutor_courses";
                $tutor = DB::select('SELECT * from tutors order by rand() limit 1');
                $user_id = $tutor[0]->user_id;
                $initial_price = rand(10,100).rand(0,9)."00";
                $data = [
                    "user_id" => $user_id,
                    "title" => "demo-course-$cnt_t",
                    "description" => "Lorem ipsum dolor sit amet, mel id nostrum pertinax, regione omittam fabellas has eu. Commodo aeterno appetere usu no, pro no unum fugit efficiantur. Mel no sensibus splendide, ancillae referrentur ex pro. Minim equidem has at, sit suas audiam te.
                                        Ex duis soleat cum. Ne viris accusata nam, nihil euismod an vim, iudico reprehendunt ea sit. Per at quem prima assentior, usu ad tota semper. An mea cibo semper. Sed atomorum consequuntur te, eu per solet imperdiet.",
                    "initial_price" => $initial_price,
                    "discount_price" => rand(1,$initial_price-1),
                    "hours" => rand(10 , 80),
                    "type" => rand(1,8),
                    "level" => rand(1,12),
                    "views" => rand(0,3000),
                    "stars_num" => rand(0,5) + round((float)rand() / (float)getrandmax(), 1),
                    "num_of_reviews" => rand(10,200)
                ];
                $cnt_t++;
            }else{
                $table = "institute_courses";
                $institute = DB::select('SELECT * from institutes order by rand() limit 1');
                $user_id = $institute[0]->user_id;
                $initial_price = rand(10,100).rand(0,9)."00";
                $start_date = randomDateInRange(new DateTime('2019-09-01'),new DateTime('2019-11-11'));
                $data = [
                    "user_id" => $user_id,
                    "title" => "demo-course-$cnt_i",
                    "description" => "Lorem ipsum dolor sit amet, mel id nostrum pertinax, regione omittam fabellas has eu. Commodo aeterno appetere usu no, pro no unum fugit efficiantur. Mel no sensibus splendide, ancillae referrentur ex pro. Minim equidem has at, sit suas audiam te.
                                        Ex duis soleat cum. Ne viris accusata nam, nihil euismod an vim, iudico reprehendunt ea sit. Per at quem prima assentior, usu ad tota semper. An mea cibo semper. Sed atomorum consequuntur te, eu per solet imperdiet.",
                    "initial_price" => $initial_price,
                    "discount_price" => ($institute[0]->registered_in_mhara_program? rand(1,$initial_price - 100) : 0),
                    "hours" => rand(10 , 80),
                    "type" => rand(1,8),
                    "level" => rand(1,12),
                    "views" => rand(0,3000),
                    "stars_num" => rand(0,5) + round((float)rand() / (float)getrandmax(), 1),
                    "num_of_reviews" => rand(10,200),
                    "start_date" => $start_date,
                    "finish_date" => randomDateInRange(new DateTime($start_date),new DateTime('2019-11-11')),
                ];
                $cnt_i++;
            }
            DB::table($table)->insert($data);
        }
    }
}
