<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    public function update(User $user, array $input): void
    {
        $user = User::find($user->id);


        if ($input['image']) {
            if ($input['old_image']) {
                @unlink('uploads/' . $input['old_image']);
            }
            $image = $input['image'];
            $new_image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/', $new_image_name);
            $user->image = $new_image_name;
        } else {
            $user->first_name = $input['first_name'];
            $user->last_name = $input['last_name'];
            $user->email = $input['email'];
            $user->phone = $input['phone'];
            $user->address = $input['address'];
        }
        $user->save();

        notify()->success('Profile updated successfully!');
    }

    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
