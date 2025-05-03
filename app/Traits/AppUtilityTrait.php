<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Str;

trait AppUtilityTrait
{
    //
    function uniqueSlug($model, $title, $object_id = 0): string
    {
        $slug = Str::slug($title);
        $originSlug = $slug;
        $count = 1;
        while (true) {
            if ($object_id > 0) {
                if (!$model::where('slug', $slug)->whereNot('id', $object_id)->first()) {
                    break;
                }
            }
            if (!$model::where('slug', $slug)->first()) {
                break;
            }
            $slug = $originSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }
    function uploadFile(Request $request, string $inputName, string $path, $oldPath = null): string
    {
        if ($request->hasFile($inputName)) {
            $file = $request->{$inputName};
            $ext = $file->getClientOriginalExtension();
            $fileName = "media_" . uniqid() . '.' . $ext;

            if ($oldPath != null) {
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
            }
            $filePath = $file->storeAs($path, $fileName, 'public');


            return $filePath;
        }

        return '';
    }
}