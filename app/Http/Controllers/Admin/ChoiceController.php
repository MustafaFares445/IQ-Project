<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Choice;
use App\Traits\FileManager;
use Illuminate\Http\Request;

class ChoiceController extends Controller
{
    use FileManager;
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->uploadFile($request , 'choices' , 'img');
        Choice::create($request->all());

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Choice $choice)
    {
        $this->deleteFile($choice , 'img');
        $this->uploadFile($request , 'choices' , 'img');
        $choice->update($request->all());

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Choice $choice)
    {
        $this->deleteFile($choice , 'img');
        $choice->delete();

        return redirect()->back();
    }
}
