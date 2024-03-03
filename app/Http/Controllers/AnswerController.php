<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Process;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use stdClass;

class AnswerController extends Controller
{

    public function index(){

    }

    public function process_all_info(Request $request){
        $response = array();
        // $validator = Validator::make($request->all(), [
        //     'process'      => 'required',
        // ], [
        //     'process.required'     => __('El proceso es requerido.', 'main'),
        // ]);

        // if ($validator->fails()) {
        //     $response->message->text = __('Faltan campos requeridos', 'main');
        //     $response->message->extra_info = implode('<br>', $validator->messages()->all());
        //     return response($response, 400);
        // }

        $process = Process::whereRaw('LOWER(name) = LOWER(?)', [$request->process])->first();
        $answer = Answer::where('process_id', $process->id)->first();
        $response['career'] = 'test';
        $response['process'] = $process->name;
        $response['steps'] = $answer->steps;
        
        return response()->json($response,200);
    }
}
