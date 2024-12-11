@extends('layout.user-layout')
@section('title', 'ONFP - toutes les notifications')
@section('space-work')
    @can('user-view')
        @can('employe-view')
            <div class="pagetitle">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Accueil</a></li>
                        <li class="breadcrumb-item">Tables</li>
                        <li class="breadcrumb-item active">Notifications</li>
                    </ol>
                </nav>
            </div>
            <section class="section faq">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                        {{-- @forelse (Auth::user()->unReadNotifications as $notification)
                            <a class="dropdown-item d-flex align-items-centers"
                                href="{{ route('courriers.showFromNotification', ['courrier' => $notification->data['courrierId'], 'notification' => $notification->id]) }}">
                                <div>
                                    <h4>{!! $notification->data['firstname'] !!}&nbsp;{!! $notification->data['name'] !!}</h4>
                                    <p>{!! $notification->data['courrierTitle'] !!}</p>
                                    <p>{!! $notification->created_at->diffForHumans() !!}</p>
                                </div>
                            </a>
                            <hr>
                        @empty
                            <div class="alert alert-info">Aucun commentaire non lu pour ce courrier
                            </div>
                        @endforelse --}}

                        @if (isset(Auth::user()->employee->arrives))
                            <div class="accordion">
                                <div class="accordion-item">
                                    <div class="accordion-body">
                                        <div class="activity">
                                            @forelse (Auth::user()->unReadNotifications as $notification)
                                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                                    <div class="row">
                                                        {{-- <a class="align-items-centers"
                                                            href="{{ route('courriers.showFromNotification', ['courrier' => $notification->data['courrierId'], 'notification' => $notification->id]) }}"> --}}
                                                        <div class="accordion-body">
                                                            <span class="card-title">{!! $notification->data['firstname'] . ' ' . $notification->data['name'] !!}</span>
                                                            <div class="activity-item d-flex">
                                                                <div
                                                                    class="activite-label col-2 col-md-2 col-lg-2 col-sm-2 col-xs-2 col-xxl-2 small fst-italic">
                                                                    {!! $notification->created_at->diffForHumans() !!} <br>
                                                                    <a
                                                                        href="{{ route('courriers.showFromNotification', ['courrier' => $notification->data['courrierId'], 'notification' => $notification->id]) }}"><button
                                                                            type="button"
                                                                            class="btn btn-outline-info btn-sm">Lire</button></a>
                                                                </div>
                                                                {{--  &nbsp;
                                                                    <i
                                                                        class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                                                                    &nbsp; --}}
                                                                <div
                                                                    class="activity-content col-10 col-md-10 col-lg-10 col-sm-10 col-xs-10 col-xxl-10">
                                                                    <p>{!! $notification->data['courrierTitle'] !!}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- </a> --}}
                                                        <hr>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="alert alert-info">Aucun commentaire non lu disponible</div>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="alert alert-info"> {{ __("Vous n'avez pas de courrier à votre nom") }} </div>
                        @endif
                    </div>
                </div>
            </section>
        @endcan
    @endcan
@endsection
