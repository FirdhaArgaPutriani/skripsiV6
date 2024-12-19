<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        return view('profile.index', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|email|max:30|unique:users,email,' . $id,
            'avatar' => 'nullable|image|max:800',
            'old_password' => 'nullable|string',
            'password' => 'nullable|required_with:old_password|string|confirmed|min:6'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('old_password')) {
            if (Hash::check($request->old_password, $user->password)) {
                $user->update([
                    'password' => Hash::make($request->password)
                ]);
            } else {
                return back()
                    ->withErrors(['old_password' => __('Please enter the correct password')])
                    ->withInput();
            }
        }

        if ($request->hasFile('avatar')) {
            if ($user->avatar && file_exists(storage_path('app/public/avatars/' . $user->photo))) {
                Storage::delete('app/public/avatars/' . $user->avatar);
            }
            $path = $request->file('avatar');
            $pathName = $path->hashName() . '.' . $path->getClientOriginalExtension();
            $request->avatar->move(storage_path('app/public/avatars'), $pathName);
            $user->avatar = $pathName;
        }

        $user->save();

        return redirect()->back()->with('status', 'Profile updated successfully!');
    }
}
