<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        $postCount = Cache::remember('count.post.'.$user->id, now()-> addSeconds(30), function() use ($user) {
            return $user->posts->count();
        });
        return view('profiles.index', compact('user', 'postCount'));
    }

    public function edit(User $user)
    {

        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);
        $data = request()->validate([
            'bio' => 'required',
            'image' => '',
        ]);

        // dd($data);

        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));
        return redirect("/profile/{$user->id}");
    }
}
