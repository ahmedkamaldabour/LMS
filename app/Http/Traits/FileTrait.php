<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\File;

use function time;

trait FileTrait
{
    protected function uploadFile($file, $path, $oldFile = null)
    {
        if (isset($file)) {
            if ($oldFile != null) {
                $this->removeFile($path . $oldFile);
            }
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->move($path, $filename);
            return $filename;
        }
        return $oldFile;
    }

    protected function removeFile($path): void
    {
        if (isset($path) && File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }
}



