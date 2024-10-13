<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }
    public function update()
    {

        $userId = auth()->id();
        $data = request()->validate([
            'name' => 'required | min:3',
            'email' => 'required | email',
            'password' => 'nullable |  min:8',
            'image' => ['mimes:jpg,jpeg,png']
        ]);

        if (request()->has('password') && !empty(request('password'))) {
            $data['password'] = Hash::make(request('password'));
        } else {
            unset($data['password']);
        }
        if (request()->hasFile('image')) {
            $path = request('image')->store('users');
            dd($path);
            $data['image'] = $path;
        }

        User::FindOrFail($userId)->update($data);
        return back();
    }
}
