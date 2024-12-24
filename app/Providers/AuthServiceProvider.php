<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Collective;
use App\Models\Depart;
use App\Models\Individuelle;
use App\Models\Interne;
use App\Models\Operateur;
use App\Models\User;
use App\Policies\CollectivePolicy;
use App\Policies\DepartPolicy;
use App\Policies\IndividuellePolicy;
use App\Policies\InternePolicy;
use App\Policies\OperateurPolicy;
use App\Policies\UserPolicy;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Individuelle::class => IndividuellePolicy::class,
        Collective::class => CollectivePolicy::class,
        Operateur::class => OperateurPolicy::class,
        Interne::class => InternePolicy::class,
        Depart::class => DepartPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
       /*  $this->registerPolicies();

        Gate::define('view-dashboard', function ($user) {
            return $user->isAdmin();
        }); */
        
    VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
        return (new MailMessage)
            ->subject('ONFP - Vérification adresse e-mail')
            ->line('Cliquez sur le bouton ci-dessous pour vérifier votre adresse e-mail.')
            ->action('Cliquer ici pour vérifier l\'adresse e-mail', $url);
    });
    }
}
