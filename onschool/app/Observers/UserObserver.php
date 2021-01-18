<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    public function created(User $user)
    {
        if(substr($user->image, -4) == '.tmp') {
            $user->update(['image' => uploadImage($user->image, 'users') ]);
        }
    }

    public function updated(User $user)
    {
        if(substr($user->image, -4) == '.tmp') {
            $user->update(['image' => uploadImage($user->image, 'users') ]);
        }
    }

    public function forceDeleted(User $user)
    {
        removeImage($user->image, 'users');
    }
}
