<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        // dd($request->validated());
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            // Move the uploaded image to the desired location
            $image->move(public_path('images'), $filename);
            // Update the user's image attribute with the filename or path of the uploaded image
            $user = $request->user();
            $user->image = $filename;
        }

        $request->user()->save();

        // return Redirect::route('profile.edit')->with('status', 'Profile-updated');
        return Redirect::route('profile.edit')->with('success', 'Profile-updated');
    }





    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $user = $request->user();

    //     // Update other user fields
    //     $user->fill($request->validated());

    //     // Check if the request has an image file
    //     if ($request->hasFile('image')) {
    //         // Get the uploaded file
    //         $image = $request->file('image');

    //         // Store the image in the storage
    //         $imagePath = $image->store('images', 'public');

    //         // Update the user's image path
    //         $user->image = $imagePath;
    //     }

    //     // Check if the email is being updated and reset email verification if so
    //     if ($user->isDirty('email')) {
    //         $user->email_verified_at = null;
    //     }

    //     // Save the updated user record
    //     $user->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
