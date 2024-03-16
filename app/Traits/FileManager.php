<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait FileManager
{
    /**
     * Uploads a file from the request and updates the request data accordingly.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $path
     * @param string $fileName
     * @return void
     */
    public function uploadFile(\Illuminate\Http\Request &$request, string $path, string $fileName): void
    {
        $this->deleteFile($request, $fileName);
        // Check if the file exists in the request
        if ($request->hasFile($fileName)) {
            $file = $request->file($fileName); // Get the uploaded file object
            $path = $file->store($path, ['disk' => 'public']); // Store the file in the specified path

            // Update the request data with the file path
            $request[$fileName] = $path;
        }
    }

    public function deleteFile($model, $filename): void
    {
        $old_file = $model[$filename];

        if ($old_file){
            Storage::disk('public')->delete($old_file);
        }
    }

    public function storeImage($image): void
    {
        $image = uniqid() . '-' . $image;
    }
}
