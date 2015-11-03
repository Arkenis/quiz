<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Quiz;
use App\Result;
use App\Test;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::get();
        return view('tests.index', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $test = Test::where('quiz_id', $request->get('quiz_id'))
            ->where('user_id', $request->get('user_id'))
            ->first();

        if ($test == null) {
            $test = Test::create($request->all());
        }

        $test->results()->delete();

        $score = 0;

        $quiz = Quiz::find($request->get('quiz_id'));
        foreach ($quiz->questions as $question)
        {
            if ($request->has($question->id)) {
                $result = Result::create([
                    'quiz_id'     => $request->get('quiz_id'),
                    'user_id'     => $request->get('user_id'),
                    'test_id'     => $test->id,
                    'question_id' => $question->id,
                    'answer_id'   => $request->get($question->id)
                ]);

                $answer = Answer::find($request->get($question->id));
                if ($answer->correct) {
                    $score += 1;
                }
            }
        }

        $test->score = $score;
        $test->save();

        Redirect::route('quizzes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
