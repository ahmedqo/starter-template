<?php

namespace App\Http\Controllers;

use App\Functions\Mail as Mailer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;


class UserController extends Controller
{
    public function index_view()
    {
        return view('user.index');
    }

    public function store_view()
    {
        return view('user.store');
    }

    public function patch_view($id)
    {
        $cache = User::addCache("users/$id", ["users:$id", 'user']);

        $data = Cache::rememberForever($cache, function () use ($id) {
            return User::findorfail($id);
        });

        return view('user.patch', compact('data'));
    }

    public function search_action(Request $Request)
    {
        $search = $Request->search ? "/search/$Request->search" : '';
        $cursor = $Request->cursor ? "/cursor/$Request->cursor" : '';
        $cache = User::addCache("users$search$cursor", ['users']);

        $data = Cache::rememberForever($cache, function () use ($Request) {
            $data = User::orderBy('id', 'DESC');
            if ($Request->search) {
                $data = $data->search(urldecode($Request->search));
            }
            return $data->cursorPaginate(50);
        });

        return response()->json($data);
    }

    public function store_action(Request $Request)
    {
        $validator = Validator::make($Request->all(), [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'phone' => ['required', 'string', 'unique:users,phone'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        User::create($Request->merge([
            'password' =>  Hash::make(Str::random(20)),
            'first_name' => strtolower($Request->first_name),
            'last_name' => strtolower($Request->last_name),
        ])->all());

        Mailer::reset($Request->email);

        return Redirect::back()->with([
            'message' => __('Created successfully'),
            'type' => 'success'
        ]);
    }

    public function patch_action(Request $Request, $id)
    {
        $validator = Validator::make($Request->all(), [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email,' . $id],
            'phone' => ['required', 'string', 'unique:users,phone,' . $id],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        User::findorfail($id)->update($Request->merge([
            'first_name' => strtolower($Request->first_name),
            'last_name' => strtolower($Request->last_name)
        ])->all());

        return Redirect::back()->with([
            'message' => __('Updated successfully'),
            'type' => 'success'
        ]);
    }

    public function clear_action($id)
    {
        User::findorfail($id)->delete();

        return Redirect::route('views.users.index')->with([
            'message' => __('Deleted successfully'),
            'type' => 'success'
        ]);
    }
}
