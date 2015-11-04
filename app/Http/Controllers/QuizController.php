<?php namespace App\Http\Controllers;

use App\Quiz;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $quizzes = Quiz::latest()->get();
        $user = User::find(Auth::id());
        return view('quiz.index', compact('quizzes', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $quiz = $request
            ->user()
            ->quizzes()
            ->create([
                'subject' => $request->get('subject'),
            ]);

        foreach ($request->get('questions') as $q)
        {
            $question = $quiz->questions()->create([
                'text' => $q['text'],
            ]);

            $answers = $q['answers'];

            foreach (range(0, 3) as $i)
            {
                $question->answers()->create([
                    'text'        => $answers[$i],
                    'correct'     => ($i == $q['correct_answer']),
                    'question_id' => $question->id,
                ]);
            }
        }

        return redirect()->route('quizzes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Quiz  $quiz
     * @return Response
     */
    public function show(Quiz $quiz)
    {
        $choices = ['A', 'B', 'C', 'D'];

        return view('quiz.show', compact('quiz', 'choices'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Quiz $quiz
     * @return Response
     * @internal param int $id
     */
    public function edit(Quiz $quiz)
    {
        return view('quiz.edit', compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param Quiz $quiz
     * @return Response
     * @internal param int $id
     */
    public function update(Request $request, Quiz $quiz)
    {
        $quiz->update([
            'subject' => $request->get('subject'),
        ]);

        foreach ($quiz->questions as $question)
        {
            $q = $request->get('questions')[$question->id];

            $question->text = $q['text'];
            $question->save();

            foreach ($question->answers as $answer)
            {
                $answer->text    = $q['answers'][$answer->id];
                $answer->correct = ($q['correct_answer'] == $answer->id);
                $answer->save();
            }
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Quiz $quiz
     * @return Response
     * @throws \Exception
     * @internal param int $id
     */
    public function destroy(Quiz $quiz)
    {
        $quiz->delete();

        return redirect()->back();
    }
}
