<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class WebController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function generator()
    {
        return view('generator');
    }

    public function images($name)
    {
        return $this->serveMedia('images', $name);
    }

    public function videos($name)
    {
        return $this->serveMedia('videos', $name);
    }

    protected function serveMedia($type, $path)
    {
        if (Storage::disk($type)->exists($path)) {
            return response()->file(Storage::disk($type)->path($path));
        }

        return response('Not found', 404);
    }
}
