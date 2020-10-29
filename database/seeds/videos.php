<?php

use Illuminate\Database\Seeder;
use App\models\Video;
class videos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20 ; $i++) {
            $seed=New App\models\Video;
            $seed->name="amin";
            $seed->meta_keywords="phone";
            $seed->meta_des="new";
            $seed->des="forget it";
            $seed->youtube="http://localhost/webApp/public/admin/users";
            $seed->image="asas";
            $seed->published=1;
            $seed->user_id=1;
            $seed->cat_id=1;
            $seed->save();
        }
    }
}
