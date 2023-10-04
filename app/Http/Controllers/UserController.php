<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class UserController extends Controller {
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view('user.index');
    }

    public function update(Request $request) {

        $validator = Validator::make($request->all(), [
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
            'phone' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = auth()->user();
        $user->name = $request->input('first_name'). ' ' . $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->save();

        return redirect()->route('user.index')->with('success', 'Профіль успішно оновлено!');
    }
}

