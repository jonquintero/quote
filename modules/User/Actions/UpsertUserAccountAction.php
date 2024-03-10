<?php

namespace Modules\User\Actions;

use Illuminate\Support\Facades\Hash;
use Modules\User\DataTransferObjects\UserAccountData;
use Modules\User\Models\User;

class UpsertUserAccountAction
{
    public function execute(User $user, UserAccountData $userAccountData): void
    {
        $user->name = $userAccountData->name;
        $user->email = $userAccountData->email;
        if ($userAccountData->password){
            $user->password = Hash::make($userAccountData->password);
        }

        $user->save();
        //Auth::login($user);
        //event(new Registered($user));
    }
}
