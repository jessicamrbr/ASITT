<?php

namespace App\Policies;

use App\User;
use App\Timeline;
use Illuminate\Auth\Access\HandlesAuthorization;

class TimelinePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the timeline.
     *
     * @param  \App\User  $user
     * @param  \App\Timeline  $timeline
     * @return mixed
     */
    public function view(User $user, Timeline $timeline)
    {
        //
    }

    /**
     * Determine whether the user can create timelines.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the timeline.
     *
     * @param  \App\User  $user
     * @param  \App\Timeline  $timeline
     * @return mixed
     */
    public function update(User $user, Timeline $timeline)
    {
        //
    }

    /**
     * Determine whether the user can delete the timeline.
     *
     * @param  \App\User  $user
     * @param  \App\Timeline  $timeline
     * @return mixed
     */
    public function delete(User $user, Timeline $timeline)
    {
        //
    }
}
