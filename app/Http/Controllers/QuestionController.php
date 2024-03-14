<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionStoreRequest;
use App\Models\Question;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class QuestionController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $validator =  Validator::make($request->all(), ['typeId' => Rule::exists('types' , 'id')]);
        if ($validator->fails()) {
            return $this->failedResponse(message: 'Failed input please try again');
        }

        $questions = Question::with('choices')
            ->where('typeId' , $validator->getValue('typeId'))->get();

        return $this->successResponse(data:  $questions , message: 'The Data successfully retrieved');
    }

    public function store(QuestionStoreRequest $request): JsonResponse
    {
        $question = Question::create($request->validated());

        return $this->successResponse(message: 'The Data successfully retrieved');
    }
}
