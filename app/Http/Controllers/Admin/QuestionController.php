<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Traits\FileManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
{
    use FileManager;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $questions = Question::with('type')->orderBy('category')->get();

       return view('question.index' , compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $path = $request->file('img')->storeAs('public', $request->file('img')->getClientOriginalName());

        $file = $request->file('img');
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('questions'), $fileName);



        $path = explode('/', $path);

        Question::create([
            'title' => $request->title,
            'img' => $path[1] ?? null,
            'category' => $request->category,
            'typeId' => $request->typeId
        ]);

        return redirect()->route('home');
    }
    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $this->deleteFile($question , 'img');
        $question->delete();

        return redirect()->route('home');
    }

}
