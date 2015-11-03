<?php namespace App\Http\Controllers;


use App\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $quizzes = Quiz::all();

        return view('quiz.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('quiz.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // die;

        $quiz = $request
            ->user()
            ->quizzes()
            ->create([
                'subject' => $request->get('subject'),
            ]);

        foreach ($request->get('questions') as $q)
        {
            $question = \App\Question::create(['text' => $q['text'], 'quiz_id' => $quiz->id]);

            $answers = $q['answers'];

            for ($i=0; $i < 4; $i++) { 
                \App\Answer::create(['text' => $answers[$i], 'correct' => ($i == $q['correct_answer']), 'question_id' => $question->id]);
            }
        }

        return redirect()->route('quizzes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
