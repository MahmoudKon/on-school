<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class TranslateController extends Controller
{
    public function translate (Request $request)
    {
        return __('alerts.' . request()->text);
        $data = [];
        foreach (request()->all() as $key => $value) {
            $data[$key] = __('alerts.' . $key);
        }
        return response()->json($data);
    }
}
