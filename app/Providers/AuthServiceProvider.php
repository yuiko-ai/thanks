<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
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

        //管理者
        Gate::define('mailall', function (User $user) {
            // dd($user->is_admin === true);
            // dd([
            //     'is_admin_value' => $user->is_admin,
            //     'is_admin_type' => gettype($user->is_admin),
            //     'strict_comparison' => $user->is_admin === true,
            //     'loose_comparison' => $user->is_admin == true,
            //     'after_cast' => (bool) $user->is_admin === true,
            // ]);

            return $user->is_admin === 1;
        });
    }
}
