@extends('layout.user-layout')
@section('title', 'ONFP - toutes les validations')
@section('space-work')

    <div class="pagetitle">
        {{-- <h1>Data Tables</h1> --}}
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Accueil</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Validations</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <span class="d-flex mt-2 align-items-baseline"><a href="{{ route('individuelles.show', $individuelle->id) }}"
            class="btn btn-success btn-sm" title="retour"><i class="bi bi-arrow-counterclockwise"></i></a>&nbsp;
        <p> | Retour</p>
    </span>
    @foreach ($individuelle->validationindividuelles as $count => $validationindividuelle)
        {{-- <i class="bi bi-exclamation-circle text-warning"></i> --}}
        {{-- <img src="{{ asset($validationindividuelle->user->getImage()) }}" alt="" class="rounded-circle w-20" width="40" height="auto"> --}}
        {{-- @if ($validationindividuelle->action == 'Rejetée') --}}
        <div class="d-flex justify-content-between align-items-center mt-3">
            <h4>{{ $validationindividuelle->user->firstname . ' ' . $validationindividuelle->user->name }}
            </h4>
            <p>
                <span class="{{ $validationindividuelle->action }}">{{ $validationindividuelle->action }}</span>
            </p>
        </div>
        {{-- @endif --}}
        <div>
            <p>
            <p>{!! $validationindividuelle?->motif !!}</p>
            </p>
            <p>{!! $validationindividuelle->created_at->diffForHumans() . ',' !!}
                {{ 'le (' . $validationindividuelle->created_at->format('d/m/Y, H:i:s') . ')' }}
            </p>
        </div>
        <hr class="dropdown-divider">
    @endforeach
@endsection
