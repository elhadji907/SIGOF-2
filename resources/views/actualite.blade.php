<div class="card">
    <div class="card-body pb-0">
        <h5 class="card-title">Actualités <span>| Derniers événements</span></h5>
        <div class="news mb-5">
            @foreach (App\Models\Poste::orderBy("created_at", "desc")->limit(5)->get() as $poste)
                <div class="post-item clearfix" data-bs-toggle="modal" data-bs-target="#ShowPostModal{{ $poste->id }}">
                    <img src="{{ asset($poste->getPoste()) }}" class="w-20" alt="{{ $poste->legende }}">
                    <h4><a href="#">{{ $poste->legende }}</a></h4>
                    <p>{{ substr($poste->name, 0, 90) }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</div>
@foreach (App\Models\Poste::all() as $poste)
    <div
        class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12 d-flex flex-column align-items-center justify-content-center">
        <div class="modal fade" id="ShowPostModal{{ $poste->id }}" tabindex="-1">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <form method="post" action="#" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header text-center bg-gradient-default">
                            <h1 class="h4 text-black mb-0">{{ $poste->legende }}</h1>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">

                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xxl-12">
                                    <img src="{{ asset($poste->getPoste()) }}" class="d-block w-100"
                                        alt="{{ $poste->legende }}">
                                </div>
                                <p>{{ $poste->name }}</p>

                            </div>
                            <div class="modal-footer mt-5">
                                <button type="button" class="btn btn-secondary btn-sm"
                                    data-bs-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
