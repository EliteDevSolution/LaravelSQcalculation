<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Answer;

class Question extends Model
{
    use SoftDeletes;
    protected $table = 'questions';
    public $timestamps = true;

    protected $dates = ['deleted_at'];

    public static $types = ['first', 'second'];


    public function alternatives()
    {
    	return $this->hasMany('App\Alternative');
    }

     public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public static function loadFisrtQuiz($quiz)
    {
    	$question = Question::with(['alternatives'=>function($query){ $query->where('is_active', '<>', 0)->orderBy('weight', 'desc'); }])
    		->where('type', $quiz)
    		->where('is_active', '<>', 0)
    		->orderBy('order', 'asc')
    		->first();

    	return $question;
    }

    //Calculates total score for a quiz
    public static function getTotal($quiz)
    {
    	$total = Question::where('type', $quiz)->where('is_active', '<>', 0)->count();

    	return $total;
    }

    //When we are looping through questions in a quiz, we use this function to grab next one in order
    public static function getNextQuestion($quiz, $taken_questions)
    {
    	$question = Question::with(['alternatives'=>function($query){ $query->where('is_active', '<>', 0)->orderBy('weight', 'desc'); }])
    		->where('type', $quiz)
    		->where('is_active', '<>', 0)
    		->whereNotIn('id', $taken_questions)
    		->orderBy('order', 'asc')
    		->first();

    	return $question;	
    }

    //Grab all questions so we can loop through them later on
    public static function all_questions(){
        $question = Question::where('type','second')->orderBy('order')->get();
        return $question;
    }

    /**
     * get all Questions of Quiz
     * @param  string $quiz 'first' or 'second'
     * @return Collection collections of questions
     */
    public static function getQuestions($quiz)
    {
        $questions = Question::where('type', $quiz)
            ->where('is_active', '<>', 0)
            ->orderBy('order')->get();

        return $questions;
    }



}
