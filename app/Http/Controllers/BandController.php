<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BandController extends Controller
{
    public function getAll()
    {
        $bands = $this->getBands();
        return response()->json($bands);
    }

    public function getByID($id): \Illuminate\Http\JsonResponse
    {
        $bands = $this->getBands();
        $band = array_filter($bands, function ($band) use ($id) {
            return $band["id"] == $id;
        });

        return empty($band) ? response()->json(["error" => "Band not found"], 404) : response()->json($band);
    }

    public function getByGender($gender): \Illuminate\Http\JsonResponse
    {
        $gender = strtolower($gender);
        $bands = $this->getBands();
        $band = array_filter($bands, function ($band) use ($gender) {
            if(strpos(strtolower($band["gender"]), $gender) !== false)
            {
                return $band;
            }

            return false;

        });

        return empty($band) ? response()->json(["error" => "Gender not found"], 404) : response()->json($band);

    }

    public function getBands(): array
    {
        return [
            [
                "id" => 1,
                "name" => "The Beatles",
                "gender" => "Rock, Pop"
            ],
            [
                "id" => 2,
                "name" => "Led Zeppelin",
                "gender" => "Rock, Blues, Hard Rock"
            ],
            [
                "id" => 10,
                "name" => "U2",
                "gender" => "Rock, Alternative Rock "
            ],
            [
                "id" => 11,
                "name" => "Black Sabbath",
                "gender" => "Heavy Metal, Rock"
            ],
            [
                "id" => 12,
                "name" => "The Strokes",
                "gender" => "Soft, Emo core"
            ]
        ];
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validate  = $request->validate([
            'name' => 'required|min:3',
            'gender' => 'required|string|min:3'
        ]);

        return response()->json($request->all(), 201);
    }
}
