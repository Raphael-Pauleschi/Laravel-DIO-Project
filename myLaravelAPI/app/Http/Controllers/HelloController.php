<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function hello($name, Request $request)
    {   

        return response()->json([
            'oi' => "hello {$name}?",
            'tchau' => $request->all()
        ]);
    }
}
