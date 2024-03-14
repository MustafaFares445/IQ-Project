<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $questions = Question::with('type')->get();


       return view('question.index' , compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //TODO:Store Question image
        Question::create($request->all());

        return redirect()->route('home');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $question = Question::with('type')->find($id);

        return view('question.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //TODO:Delete Question image
        //TODO:Store new Question image
        $question->update($request->all());

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //TODO:Delete Question image
        //TODO:Store new Question image
        $question->delete();

        return redirect()->route('home');
    }
}