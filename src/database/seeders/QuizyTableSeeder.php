<?php

use Illuminate\Database\Seeder;

class QuizyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quizy')->insert(
            [
                'question_id'=>1,
                'name'=>'たかなわ',
                'valid'=>1,
            ],[
                'question_id'=>1,
                'name'=>'こうわ',
                'valid'=>0,
            ],[
                'question_id'=>1,
                'name'=>'たかわ',
                'valid'=>0,
            ],[
                'question_id'=>2,
                'name'=>'こうよう',
                'valid'=>0,
            ],[
                'question_id'=>2,
                'name'=>'ゆきひら',
                'valid'=>0,
            ],[
                'question_id'=>2,
                'name'=>'むかいなだ',
                'valid'=>1,
            ]

        );
    }
}
