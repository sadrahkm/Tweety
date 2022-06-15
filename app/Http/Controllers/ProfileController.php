<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        $tweets = $user->tweets()->withLikes()->paginate(50);
        return view('profile', compact('user','tweets'));
    }

    public function edit(User $user)
    {
        return view('edit', compact('user'));
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'username' => ['required', 'max:255', 'string', Rule::unique('users')->ignore($user)],
            'name' => ['required', 'max:255', 'string'],
            'email' => ['required', 'max:255', 'email', 'string', Rule::unique('users')->ignore($user)],
            'avatar' => ['file'],
            'banner' => ['nullable','file'],
            'description' => 'nullable',
            'password' => ['max:255', 'confirmed']
        ]);
        if (request()->has('avatar')) {
            $attributes['avatar'] = request()->file('avatar')->store('avatars', 'public');
        }
        if (request()->has('banner')) {
            $attributes['banner'] = request()->file('banner')->store('banners', 'public');
        }
        $user->update($attributes);

        return redirect($user->path());

    }
}
