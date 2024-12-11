{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Merci de vous être inscrit ! Avant de commencer, pourriez-vous vérifier votre adresse e-mail en cliquant sur le lien que nous venons de vous envoyer par e-mail ? Si vous n\'avez pas reçu l\'e-mail, nous vous en enverrons un autre avec plaisir.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('Un nouveau lien de vérification a été envoyé à l\'adresse e-mail que vous avez fournie lors de votre inscription.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Renvoyer l\'e-mail de vérification') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Se déconnecter') }}
            </button>
        </form>
    </div>
</x-guest-layout> --}}

@extends('layout.user-layout')
@section('title', 'ONFP - demandes operateurs')
@section('space-work')

    <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
        {{-- <h1>ONFP.SN</h1> --}}
        <h4>{{ __("Merci de vous être inscrit ! Avant de commencer, pourriez-vous vérifier votre adresse e-mail en
                                                                                                                                                                    cliquant sur le lien que nous venons de vous envoyer par e-mail ? Si vous n'avez pas reçu l'e-mail,
                                                                                                                                                                    nous vous en enverrons un autre avec plaisir.") }}
        </h4>
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <button type="submit" class="btn btn-outline-primary">{{ __('Renvoyer l\'e-mail de vérification') }}</button>
                {{--  <x-primary-button>
                            {{ __('Renvoyer l\'e-mail de vérification') }}
                        </x-primary-button> --}}
            </div>
        </form>
        {{-- <br>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="btn btn-outline-danger">
                        {{ __('Se déconnecter') }}
                    </button>
                </form> --}}

        {{-- <a class="btn" href="index.html">{{ __('Renvoyer l\'e-mail de vérification') }}</a>
                <img src="assets/img/not-found.svg" class="img-fluid py-5" alt="Page Not Found"> --}}

    </section>

@endsection
