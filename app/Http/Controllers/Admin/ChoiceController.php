<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Choice;
use App\Models\Question;
use App\Traits\FileManager;
use Illuminate\Http\Request;

class ChoiceController extends Controller
{
    use FileManager;

    public function index(string $id)
    {
       $question = Question::with('choices')->find($id);

       return view('choice.index', compact('question'));

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $path = $request->file('img')->storeAs('public', $request->file('img')->getClientOriginalName());

        $file = $request->file('img');
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('choices'), $fileName);


        $path = explode('/', $path);

        Choice::create([
            'description' => $request->description,
            'img' => $path[1],
            'istrue' => $request->istrue,
            'questionId' => $request->questionId,
        ]);

        return redirect()->route('choice.index', $request->questionId);
    }

    /**
     * Update the specified resource in storage.
     */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Choice $choice)
    {
        $this->deleteFile($choice , 'img');
        $choice->delete();

        return redirect()->route('choice.index', $choice->questionId);
    }
}
