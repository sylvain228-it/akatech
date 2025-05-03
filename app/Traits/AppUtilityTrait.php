<?php

namespace App\Traits;

use Illuminate\Http\Request;
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

            if ($oldPath != null && $oldPath != "assets/category/category_cover.jpg") {
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            $file->move(public_path($path), $fileName);


            return $path . '/' . $fileName;
        }

        return '';
    }
}