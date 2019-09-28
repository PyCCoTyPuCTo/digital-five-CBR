<?php

use App\Vote;
use Illuminate\Database\Seeder;

class VotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Vote::class, 3)->state('closed_question_subject-1')->create();
        factory(Vote::class, 2)->state('closed_question_subject-2')->create();
        factory(Vote::class, 4)->state('closed_question_subject-3')->create();
    }
}