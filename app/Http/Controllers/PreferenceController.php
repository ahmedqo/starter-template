<?php

namespace App\Http\Controllers;

use App\Functions\Neo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class PreferenceController extends Controller
{
    public function patch_view()
    {
        $data = Neo::preference();
        return view('preference.patch', compact('data'));
    }

    public function patch_action(Request $Request)
    {
        $validator = Validator::make($Request->all(), [
            'language' => ['required', 'string'],
            'currency' => ['required', 'string'],
            'date_format' => ['required', 'string'],
            'theme_color' => ['required', 'string'],
            'report_frequency' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        Neo::preference()->update($Request->all());

        return Redirect::back()->with([
            'message' => __('Updated successfully'),
            'type' => 'success'
        ]);
    }
}
