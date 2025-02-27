<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Venue;
use Illuminate\Auth\Access\Response;

class VenuePolicy
{
    public function modify(User $user, Venue $venue): Response
    {
        return $user->id === $venue->user_id
            ? Response::allow()
            : Response::deny('Not Authorized for this action');
    }
}
