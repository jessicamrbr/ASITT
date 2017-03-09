<?php

namespace App\Providers;

use App\Publication;
use App\Rank;
use App\Ranks_meta_tag;
use App\Timeline;
use App\User;

use App\Policies\PublicationPolicy;
use App\Policies\RankPolicy;
use App\Policies\Ranks_meta_tagPolicy;
use App\Policies\TimelinePolicy;
use App\Policies\UserPolicy;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
      Publication::class => PublicationPolicy::class,
      Rank::class => RankPolicy::class,
      Ranks_meta_tag::class => Ranks_meta_tagPolicy::class,
      Timeline::class => TimelinePolicy::class,
      User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
      $this->registerPolicies();

      Gate::define('admPrivilege', function ($user) {
        return $user->privilege === "adm";
      });
    }
}
