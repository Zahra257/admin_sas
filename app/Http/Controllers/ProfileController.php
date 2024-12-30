<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Validator;


class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' .Auth::user()->id,
            'phone' => 'required|string|max:20|regex:/^[0-9()+\-.\s]+$/',
            'birthday' => 'nullable|date|before:today',
            'imageUrl' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('profile')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::find(Auth::user()->id);
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        
        if ($user->email !== $request->input('email')) {
            $user->email = $request->input('email');
        }

        $user->phone = $request->input('phone');
        $user->birthday = $request->input('birthday');

        // Handle the image upload if a file is provided
        if ($request->hasFile('imageUrl')) {
            // Store the new image
            $image_path = $request->file('imageUrl')->store('users', ['disk' => 'public']);

            // Delete the old image if it exists
            if ($user->imageUrl) {
                Storage::disk('public')->delete($user->imageUrl);
            }

            // Update the user's image URL
            $user->imageUrl = $image_path;
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Your profile was updated.');

    }
}
