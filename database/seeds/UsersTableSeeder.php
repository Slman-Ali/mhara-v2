<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Admin;
use App\models\Institute;
use App\models\Student;
use App\models\Tutor;
use Illuminate\Support\Facades\DB;

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
    public function run(){
        for($i = 0; $i<100;++$i){
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
                    'tagline' => Str::random(10),
                    'website' => Str::random(10),
                    'mobile' => Str::random(10),
                    'image' => 'institute-default.jpg', 
                    'phone' => Str::random(10),
                    'city' => random_int(1,14),
                    'address' => "Lorem ipsum dolor sit amet",
                    'establishment_year' => random_int(1990,2021),
                    'available_days' => random_int(0,1),
                    'available_time' => random_int(0,1),
                    'facebook' => Str::random(10),
                    'registered_in_mhara_program' => random_int(0,1),
                    'user_id' => $user->id
                ];
                Institute::create($data);
            }
            if($user->type==3){
                $table = "tutors" ;
                
                $data=[        
                    'first_name' => $namo,
                    'last_name' => Str::random(10),
                    'mobile' => Str::random(10),
                    'image' => 'tutor-default.jpg',
                    'city' => random_int(1,14),
                    'address' => "Lorem ipsum dolor sit amet",
                    'birth_date' => date('Y-m-d'),
                    'gender' => random_int(0,1),
                    'tagline' => Str::random(50),
                    'facebook' => Str::random(10),
                    'user_id' => $user->id
                ];
                Tutor::create($data);
            }
            if($user->type==2){
                $table = "students" ;
                
                $data=[
                    'first_name' => $namo,
                    'last_name' => Str::random(10),
                    'mobile' => Str::random(10),
                    'image' => 'student-default.jpg',
                    'city' => random_int(1,14),
                    'birth_date' => date('Y-m-d'),
                    'gender' => random_int(0,1),
                    'facebook' => Str::random(10),
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
