<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function show($filename)
    {
        $path = 'profile_pictures/' . $filename;

        // Check if the file exists
        if (Storage::exists($path)) {
            $file = Storage::get($path);
            $type = Storage::mimeType($path);

            return Response::make($file, 200, [
                'Content-Type' => $type,
                'Content-Disposition' => 'inline; filename="' . $filename . '"',
            ]);
        } else {
            // Handle file not found
            abort(404);
        }
    }
}

