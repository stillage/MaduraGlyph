<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionnaire;
use App\Models\Question;

class QuestionController extends Controller
{
    public function create($questionnaire)
    {
        $questionnaire = Questionnaire::findOrFail($questionnaire);

        return view('question.create', compact('questionnaire'));
    }

    public function store($questionnaire)
    {
        $questionnaire = Questionnaire::findOrFail($questionnaire);
        
        //dd(request()->all());

        $data = request()->validate([
            'question.question' => 'required',
            'answers.*.answer' => 'required',
        ]);

        //dd($data);

        $question = $questionnaire->questions()->create($data['question']); 

        $question->answers()->createMany($data['answers']);

        return redirect('/questionnaires/'.$questionnaire->id);  
    }

    public function destroy($questionnaire, $question)
    {
        $questionnaire = Questionnaire::findOrFail($questionnaire);
        $question = Question::findOrFail($question);

        $question->answers()->delete();
        $question->delete();

        return redirect('/questionnaires/'.$questionnaire->id);
    }
}
