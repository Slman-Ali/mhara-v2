<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Admin;
use App\models\Institute;
use App\models\Student;
use App\models\Tutor;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $types = [
        "student" ,
        "student" ,
        "student" ,
        "tutor" ,
        "tutor" ,
        "institute"
    ];
    public function run(Faker $faker){

        // $faker = new Faker();

        for($i = 0; $i<700;++$i){
            $typo = $this->types[ random_int(0,5) ];
            $namo = $this->generate_name_of_type($typo."s");
            $typo = 2;
            if($namo[0]=='t')$typo = 3;
            if($namo[0]=='i')$typo = 4;
            $user = User::create([
                'email' => "$namo@gmail.com",
                'password' => Hash::make('secret'),
                'is_active' => 1,
                'type' => $typo,
                "verified_by_admin" => 1
            ]);
            $data=[];
            if($user->type==4){
                $table= "institutes";
                $data=[
                    'name' => $namo,
                    'tagline' => $faker->text(26),
                    'website' => $faker->url,
                    'mobile' => $faker->phoneNumber,
                    'image' => 'institute-default.jpg', 
                    'phone' => $faker->phoneNumber,
                    'city' => random_int(1,14),
                    'address' => $faker->text(25),
                    'establishment_year' => random_int(1990,2021),
                    'available_time' => random_int(1,5),
                    'available_days' => "0111111",
                    'facebook' => $faker->url,
                    'registered_in_mhara_program' => random_int(0,1),
                    'user_id' => $user->id,
                    'priority_by_admin' => rand(0,1) 
                ];
                Institute::create($data);
            }
            if($user->type==3){
                $table = "tutors" ;
                
                $data=[        
                    'first_name' => $namo,
                    'last_name' => $faker->lastName,
                    'mobile' => $faker->phoneNumber,
                    'image' => 'tutor-default.jpg',
                    'city' => random_int(1,14),
                    'address' => $faker->text(25),
                    'birth_date' => randomDateInRange(new DateTime('1970-05-06'),new DateTime('1998-05-06')),
                    'gender' => random_int(1,2),
                    'available_time' => random_int(1,5),
                    'tagline' => $faker->text(30),
                    'facebook' => $faker->url,
                    'user_id' => $user->id,
                    'priority_by_admin' => rand(0,3) 
                ];
                Tutor::create($data);
            }
            if($user->type==2){
                $table = "students" ;
                
                $data=[
                    'first_name' => $namo,
                    'last_name' => $faker->lastName,
                    'mobile' => $faker->phoneNumber,
                    'image' => 'student-default.jpg',
                    'city' => random_int(1,14),
                    'birth_date' => $faker->dateTimeBetween(),
                    'gender' => random_int(1,2),
                    'facebook' => $faker->url,
                    'user_id' => $user->id
                ];
                Student::create($data);
            }
            
        }
        $user = User::create([
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'is_active' => 1,
            'type' => 1,
        ]);

        Admin::create([
            'user_id' => $user->id,
            'name' => 'admin'
        ]);

    }


    public function generate_name_of_type($type){
        return substr($type,0,strlen($type)-1) . (DB::table($type)->count() + 1)  ;
    }
}
