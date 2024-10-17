<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{
    public function show(){

        Session::put("nextq", '1');
        Session::put("wrongans", '0');
        Session::put("correctans", '0');
        $q = Question::all()->first();

        return view("question.question")->with(['question'=>$q]);
    }


    public function onSubmit(Request $request){
        $nextq = Session::get('nextq');
        $wrongans =  Session::get('wrongans');
        $correctans =  Session::get('correctans');
        $request->validate([
            'answer'=>['required'],
            'dbanswer'=>['required'],
        ]);


        $nextq += 1;

        if($request->dbanswer == $request->answer){
            $correctans +=1;
        }else{
            $wrongans += 1;
        }

        Session::put("nextq", $nextq);
        Session::put("wrongans", $wrongans);
        Session::put("correctans",  $correctans);

        $i=0;

        $questions = Question::all();

        foreach($questions as $question){

            $i++;

            if($questions->count() < $nextq){

                return view('question.answer');
            }

            if($i == $nextq){
               return view('question.question')->with(['question'=>$question]);
            }
        }
    }



    public function submit(){

        return view("question.question");
    }


    public function store(Request $request){
        $request ->validate([
            "question"=>["required"],
            "answerA"=>["required"],
            "answerB"=>["required"],
            "answerC"=>["required"],
            "answerD"=>["required"],
            "correctAnswer"=>["required"],
        ]);


        Auth::user()->questions()->create([
            "question"=> $request['question'],
            'a'=> $request['answerA'],
            'b'=> $request['answerB'],
            'c'=> $request['answerC'],
            'd'=> $request['answerD'],
            'answer'=> $request['correctAnswer'],
        ]);

        return redirect('/home')->with('success','Question Added Successfully!!!');

    }

    public function update(Request $request, Question $question){
        $validate = $request ->validate([
            "question"=>["required"],
            "a"=>["required"],
            "b"=>["required"],
            "c"=>["required"],
            "d"=>["required"],
            "answer"=>["required"],
        ]);

        $question->update($validate);

        return redirect('/home')->with('success','Question Updated Successfully!!!');

    }
    public function destroy(Question $question){

        $question->delete();

        return redirect('/home')->with('success','Question Deleted Successfully!!!');

    }



}
