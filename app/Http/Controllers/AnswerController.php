<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Process;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use stdClass;

class AnswerController extends Controller
{
    public function get_answer(Request $request)
    {
        $response = array();


        $process = Process::whereRaw('LOWER(name) = LOWER(?)', [$request->process])->first();
        $answer = Answer::where('processes_id', $process->id);
        if ($request->has('question')) {
            $answer = $answer->byQuestionKey($request->question);
        }
        if ($request->has('career')) {
            $answer = $answer->whereCareer($request->career);
        }


        $answer = $answer->first();

        $documents = $answer->resources;
        $response['status'] = 200;
        $response['career'] = !empty($answer->career) ? $answer->career->title : '';
        $response['process'] = !empty($answer->process) ? $answer->process->name : '';
        $response['question'] = !empty($answer->question) ? $answer->question->title : '';
        $response['answer'] = !empty($answer->description) ? $answer->description : '';
        if (count($documents) > 0) {
            $response['documents'] = json_decode($documents[0]->url)[0]->download_link;
        }
        return response()->json($response, 200);
    }
}
