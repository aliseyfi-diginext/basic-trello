<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CatRequest;
use App\Models\Cat;

class CatController extends Controller
{
    public function store(CatRequest $request)
    {
        $data = $request->validated();
        Cat::create($data);
        return back()->with([
            'message' => 'Task Created Successfully'
        ]);
    }
}
