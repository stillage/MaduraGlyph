<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionnaire;

class SurveyController extends Controller
{
    public function show($questionnaire,$slug)
    {
        $questionnaire = Questionnaire::findOrFail($questionnaire);

        $questionnaire->load('questions.answers');

        return view('survey.show', compact('questionnaire'));
    }

    public function store($questionnaire) 
    {
        $questionnaire = Questionnaire::findOrFail($questionnaire);

        // dd(request()->all());

        $data = request()->validate([
            'responses.*.answer_id' => 'required',
            'responses.*.question_id' => 'required',
            'survey.name' => 'required',
            'survey.email' => 'required|email',
        ]);

        //dd($data);
        $survey = $questionnaire->surveys()->create($data['survey']); 
        $survey->responses()->createMany($data['responses']);

        return 'Thank You';  
    }
}
