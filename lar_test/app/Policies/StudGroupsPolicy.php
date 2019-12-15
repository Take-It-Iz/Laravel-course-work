<?php

namespace App\Policies;

use App\Group;
use App\User;
use App\UserRight;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class StudGroupsPolicy
{
    use HandlesAuthorization;

    const MODAL_NAME = 'group';

    public function __construct()
    {
        //
    }

    private function checkRight(User $user, String $right) {
        return UserRight::where('user_id', $user->id)
            ->where('right', $right)
            ->where('model', self::MODAL_NAME)
            ->exists();
    }

    public function update(User $user) {
        return $this->checkRight($user, 'update');
    }

    public function updviewate(User $user) {
        return $this->checkRight($user, 'view');
    }
}
