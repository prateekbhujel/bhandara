<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait ImageUploadTrait
{
    /**
     * Handle image upload and return the path to store in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $inputName
     * @param  string  $path
     * @return string
     */
    public function uploadImage(Request $request, string $inputName, string $path): string
    {
        if ($request->hasFile($inputName)) {
            $image = $request->file($inputName);
            $imageName = 'media_' . Str::random(40) . '.' . $image->getClientOriginalExtension();

            $image->move(public_path($path), $imageName);

            return $path . '/' . $imageName;
        }

        throw new \Exception('No file provided or file upload error.');

    }
}
