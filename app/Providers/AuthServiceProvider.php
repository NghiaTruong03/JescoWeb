<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //admin,warehouse-staff ,merchandiser 

        Gate::define('admin',function(User $user){
            return $user->role == 1;
        });

        Gate::define('merchandiser',function(User $user){
            return $user->role == 2;
        });

        Gate::define('warehouse-staff',function(User $user){
            return $user->role == 3;
        });
        
    }
}
