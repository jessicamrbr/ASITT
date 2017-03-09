<?php

namespace App\Policies;

use App\User;
use App\Rank;
use Illuminate\Auth\Access\HandlesAuthorization;

class Rank
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the rank.
     *
     * @param  \App\User  $user
     * @param  \App\Rank  $rank
     * @return mixed
     */
    public function view(User $user, Rank $rank)
    {
        //
    }

    /**
     * Determine whether the user can create ranks.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the rank.
     *
     * @param  \App\User  $user
     * @param  \App\Rank  $rank
     * @return mixed
     */
    public function update(User $user, Rank $rank)
    {
        //
    }

    /**
     * Determine whether the user can delete the rank.
     *
     * @param  \App\User  $user
     * @param  \App\Rank  $rank
     * @return mixed
     */
    public function delete(User $user, Rank $rank)
    {
        //
    }
}
