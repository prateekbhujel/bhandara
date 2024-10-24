<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;

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

        throw new \Exception('No Image file provided or Image file upload error.');

    }
    
    /**
     * Handle image update: delete the old image if it exists and upload a new one.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $inputName
     * @param  string  $path
     * @param  string|null  $oldPath
     * @return string|null
     */
    public function updateImage(Request $request, string $inputName, string $path, string $oldPath = null): string|null
    {
        if ($request->hasFile($inputName)) {
            if (File::exists(public_path($oldPath)))
                File::delete(public_path($oldPath));

            $image = $request->file($inputName);
            $imageName = 'media_' . Str::random(40) . '.' . $image->getClientOriginalExtension();

            $image->move(public_path($path), $imageName);

            return $path . '/' . $imageName;
        }
        return null;
    }//End Method

    public function uploadMultiImage(Request $request, string $inputName, string $path): string|array
    {
        $imagePaths = [];

        if ($request->hasFile($inputName)) {
            $images = $request->file($inputName);
            foreach ($images as $image) {
                $imageName = 'media_' . Str::random(40) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path($path), $imageName);

                $imagePaths[] = $path . '/' . $imageName;
            }

            return $imagePaths;

        }

        throw new \Exception('No Image file provided or Image file upload error.');

    }

    /**
     * Delete the specified image from storage.
     *
     * @param  string  $path  The path of the image to be deleted.
     * @return void
     */
    public function deleteImage(string $path): void
    {
        // Check if the file exists at the given path
        if (File::exists(public_path($path))) {
            // Delete the file from storage
            File::delete(public_path($path));
        }
    }//End Method
}
