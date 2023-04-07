<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Postagem;
use App\Models\User;
use App\Policies\PostagemPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\User' => 'App\Policies\UserPolicy',
        User::class => UserPolicy::class,
        Postagem::class => PostagemPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
