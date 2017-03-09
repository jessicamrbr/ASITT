<?php

namespace App\Policies;

use App\User;
use App\Rank_meta_tag;
use Illuminate\Auth\Access\HandlesAuthorization;

class Rank_meta_tagPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the rankMetaTag.
     *
     * @param  \App\User  $user
     * @param  \App\Rank_meta_tag  $rankMetaTag
     * @return mixed
     */
    public function view(User $user, Rank_meta_tag $rankMetaTag)
    {
        //
    }

    /**
     * Determine whether the user can create rankMetaTags.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the rankMetaTag.
     *
     * @param  \App\User  $user
     * @param  \App\Rank_meta_tag  $rankMetaTag
     * @return mixed
     */
    public function update(User $user, Rank_meta_tag $rankMetaTag)
    {
        //
    }

    /**
     * Determine whether the user can delete the rankMetaTag.
     *
     * @param  \App\User  $user
     * @param  \App\Rank_meta_tag  $rankMetaTag
     * @return mixed
     */
    public function delete(User $user, Rank_meta_tag $rankMetaTag)
    {
        //
    }
}
