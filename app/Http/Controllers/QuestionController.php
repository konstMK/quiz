<?php

namespace App\Http\Controllers;

use App\Answer;
use App\QuestionStat;
use App\Services\QuestionServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    private $questionService;

    public function __construct(QuestionServiceInterface $questionService)
    {
        $this->questionService = $questionService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function checkAnswer(Request $request)
    {
        $userId = Auth::user()->id;

        $questionId = $request->get('question_id');
        /** @var Collection $quizObject */
        $answerCollection = $this->questionService->getQuestionById($questionId)->answers;

        $answerId = $request->get('choice');
        $answer = $answerCollection->where('id', '=', $answerId)->first();
        if ($answer->score > 0) {
            QuestionStat::create([
                'score' => $answer->score,
                'user_id' => $userId,
                'question_id' => $questionId,
                'answer_id' => $answerId
            ]);
            return response()->json([
                'status' => 'success',
                'answer_id' => $answerId
            ]);
        } else {
            $correctAnswer = $answerCollection->where('score', '>', 0)->first();
            return response()->json([
                'status' => 'error',
                'answer_id' => $answerId,
                'correct_answer' => $correctAnswer->id
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = $this->questionService->getQuestionById($id);
        $answers = Answer::where('question_id', '=', $id)->get();
        return view('question.show', ['question' => $question, 'answers' => $answers]);

    }

    public function getStat()
    {
        $userId = Auth::id();
        /** @var Collection $stat */
        $stat = QuestionStat::where('user_id', '=', $userId)->get();

        $totalScore = 0;
        $stat->each(function($value) use (&$totalScore) {
            $totalScore = $totalScore + $value->score;
        });

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
