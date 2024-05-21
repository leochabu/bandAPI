<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    public function hello($name, Request $request): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            "string" =>"hello post Controller {$name}",
            "foo" =>$request->all()
        ]);
    }
}
