<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiValidation;

class ValidationController extends Controller
{
    public function create(ApiValidation $request)
    {
        return response()->json(['result' => true]);
    }
}
