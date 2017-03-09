<?php

namespace App\Policies;

use App\User;
use App\Publication;
use Illuminate\Auth\Access\HandlesAuthorization;

class PublicationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the publication.
     *
     * @param  \App\User  $user
     * @param  \App\Publication  $publication
     * @return mixed
     */
    public function view(User $user, Publication $publication)
    {
        //
    }

    /**
     * Determine whether the user can create publications.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the publication.
     *
     * @param  \App\User  $user
     * @param  \App\Publication  $publication
     * @return mixed
     */
    public function update(User $user, Publication $publication)
    {
        //
    }

    /**
     * Determine whether the user can delete the publication.
     *
     * @param  \App\User  $user
     * @param  \App\Publication  $publication
     * @return mixed
     */
    public function delete(User $user, Publication $publication)
    {
        //
    }
}
