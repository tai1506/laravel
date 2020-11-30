<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
		Gate::define('update-post', function ($user, $post){
		return $user->id == $post->user_id;});
		Gate::resource('posts', 'PostPolicy');
		Gate::define('posts.view', 'PostPolicy@view');
		Gate::define('posts.create', 'PostPolicy@create');
		Gate::define('posts.update', 'PostPolicy@update');
		Gate::define('posts.delete', 'PostPolicy@delete');
		/*if (Gate::forUser($quyen == 1)->allows('update-post', $post)){
			//The user can update the post
		}
		if (Gate::forUser($quyen == 0)->denies('update-post', $post)){
			//The user can't update the post
		}*/
    }
}
