<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request){
              // Store the uploaded file and get the path
              $path = Storage::disk('public')->put('avatars',$request->file('avatar'));
              //$path = $request->file('avatar')->store('avatars','public');

              // Dump and die to check the value of $path
              // dd($path);
            if($OldAvatar = $request->user()->avatar)
            {
                Storage::disk('public')->delete($OldAvatar);
            }
              // Update the user's avatar
             auth()->user()->update(['avatar' =>$path]);

              // Redirect back to the profile edit page with a success message
              return redirect(route('profile.edit'))->with('message', 'Avatar is Updated');
    }
}
