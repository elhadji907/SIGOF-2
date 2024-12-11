<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>{{ $title }}</title>

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon-onfp.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <style>
        @page {
            margin: 0cm 0cm;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 25px;
            border: 0px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 13px;
            line-height: 22px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        /** RTL **/
        .rtl {
            imputation: rtl;
        }

        .invoice-box table tr.heading td {
            background: rgb(255, 255, 255);
            border: 0px solid #000000;
            border-collapse: collapse;
            font-weight: bold;
        }


        .invoice-box table tr.total td {
            /* border-top: 2px solid #eee;
            border-bottom: 1px solid #eee;
            border-left: 1px solid #eee;
            border-right: 1px solid #eee; */
            /* background: #eee;
            font-weight: normal; */
        }

        /* .invoice-box table tr.item td {
            border: 1px solid #000000;
        } */

        table {
            /* border-left: 0px solid rgb(0, 0, 0);
            border-right: 0;
            border-top: 0px solid rgb(0, 0, 0);
            border-bottom: 0; */
            width: 100%;
            /* border-spacing: 0px; */
            border-collapse: collapse;
        }

        table td,
        table th {
            border-left: 1px solid rgb(0, 0, 0);
            border-right: 1px solid rgb(0, 0, 0);
            border-top: 1px solid rgb(0, 0, 0);
            border-bottom: 1px solid rgb(0, 0, 0);
            border: 1px solid;
        }

        .Oui {
            color: #198754;
            text-align: center;
        }

        .Non {
            color: #DC3545;
            padding: 4px 8px;
            text-align: center;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;

            /** Extra personal styles **/
            background-color: #ffffff;
            color: rgb(0, 0, 0);
            text-align: center;
            line-height: 1.5cm;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//db.onlinewebfonts.com/c/dd79278a2e4c4a2090b763931f2ada53?family=ArialW02-Regular" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <h6 valign="top" style="text-align: center;">
        <b>REPUBLIQUE DU SENEGAL<br></b>
        Un Peuple - Un But - Une Foi<br>
        <b>********<br>
            MINISTERE DE LA FORMATION PROFESSIONNELLE<br>
            ********<br>
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/logo-onfp.jpg'))) }}"
                style="width: 100%; max-width: 300px" />
        </b>
    </h6>
    <h4 style="text-align: center;">FICHE DE SYNTHESE DU DOSSIER D'AGREMENT
        {{ 'DU ' . $commission?->date?->format('d/m/Y') }}</h4>
    @foreach ($commission?->operateurs as $operateur)
        <div class="invoice-box">
            <table class="table table-responsive">
                <thead>
                    <tr class="heading">
                        <td colspan="3" width="40%">DOSSIER D'AGREMENT N° : <span
                                style="color: red">{{ $operateur?->numero_dossier }}</span></td>
                        <td colspan="2"></td>
                        <td colspan="3" width="40%">COURRIER ARRIVEE N° : <span
                                style="color: red">{{ $operateur?->numero_arrive }}</span></td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="item">
                        <td><b>{{ __("DENOMINATION DE L'OPERATEUR") }}</b></td>
                        <td colspan="6">{{ $operateur?->user?->operateur }}
                            @if (!empty($operateur?->user?->username))
                                {{ '(' . $operateur?->user?->username . ')' }}
                            @endif
                        </td>
                        <td colspan="1" width="10%" style="text-align: center;">
                            <b>{{ __('VISITE DE CONFORMITE') }}</b>
                        </td>
                    </tr>
                    <tr class="item">
                        <td><b>{{ __('RESPONSABLE') }}</b></td>
                        <td colspan="6">
                            @if (!empty($operateur?->user?->firstname))
                                {{ $operateur?->user?->firstname }}
                            @endif
                            @if (!empty($operateur?->user?->name))
                                {{ $operateur?->user?->name }}
                            @endif
                        </td>
                        <td rowspan="13" colspan="1" width="10%" style="text-align: center;">
                            @if (!empty($operateur?->visite_conformite))
                                <span
                                    class="{{ $operateur?->visite_conformite }}">{{ $operateur?->visite_conformite }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="item">
                        <td><b>{{ __('CIVILITE') }}</b></td>
                        <td colspan="6">
                            @if (!empty($operateur?->user?->civilite))
                                {{ $operateur?->user?->civilite }}
                            @endif
                        </td>
                    </tr>
                    <tr class="item">
                        <td><b>{{ __('TITRE') }}</b></td>
                        <td colspan="6">
                            @if (!empty($operateur?->user?->fonction_responsable))
                                {{ $operateur?->user?->fonction_responsable }}
                            @endif
                        </td>
                    </tr>
                    <tr class="item">
                        <td><b>{{ __('ADRESSE') }}</b></td>
                        <td colspan="6">
                            @if (!empty($operateur?->user?->adresse))
                                {{ $operateur?->user?->adresse }}
                            @endif
                        </td>
                    </tr>
                    <tr class="item">
                        <td><b>{{ __('CONTACTS') }}</b></td>
                        <td colspan="3">
                            @if (!empty($operateur?->user?->fixe))
                                Tél 1 : <a
                                    href="tel:+{{ $operateur?->user?->fixe }}">{{ $operateur?->user?->fixe }}</a>
                            @endif
                            @if (!empty($operateur?->user?->telephone))
                                / <a
                                    href="tel:+{{ $operateur?->user?->telephone }}">{{ $operateur?->user?->telephone }}</a>
                            @endif
                            <br>
                            @if (!empty($operateur?->user?->telephone_parent))
                                Tél 2 : <a
                                    href="tel:+{{ $operateur?->user?->telephone_parent }}">{{ $operateur?->user?->telephone_parent }}</a>
                            @endif
                        </td>
                        <td colspan="3">
                            @if (!empty($operateur?->user?->email))
                                Email 1 : <a
                                    href="mailto:{{ $operateur?->user?->email }}">{{ $operateur?->user?->email }}</a>
                            @endif
                            <br>
                            @if (!empty($operateur?->user->email_responsable))
                                Email 2 : <a
                                    href="mailto:{{ $operateur?->user?->email_responsable }}">{{ $operateur?->user?->email_responsable }}</a>
                            @endif
                            <br>
                            @if (!empty($operateur?->user?->web))
                                Web : {{ $operateur?->user?->web }}
                            @endif
                        </td>
                    </tr>
                    <tr class="item">
                        <td><b>{{ __('STATUT JURIDIQUE') }}</b></td>
                        <td colspan="6">
                            @if (!empty($operateur?->statut))
                                {{ $operateur?->statut }}
                            @endif
                        </td>
                    </tr>
                    <tr class="item">
                        <td rowspan="7"><b>{{ __('DOSSIERS FOURNIS') }}</b></td>
                        <td colspan="6">
                            Demande d'agrément signée :
                            @if (!empty($operateur?->demande_signe))
                                {{ $operateur?->demande_signe }}
                            @else
                                Non
                            @endif
                        </td>
                    </tr>
                    <tr class="item">
                        <td colspan="6">
                            Formulaire de demande d'agrément renseigné, daté et signé :
                            @if (!empty($operateur?->formulaire_signe))
                                {{ $operateur?->formulaire_signe }}
                            @else
                                Non
                            @endif
                        </td>
                    </tr>
                    <tr class="item">
                        <td colspan="3" rowspan="3">
                            Actes de création de l'entreprise
                        </td>
                        <td colspan="3">
                            RCCM / NINEA : {{ $operateur?->user?->rccm }}
                        </td>
                    </tr>
                    <tr class="item">
                        <td colspan="3">
                            Numéro : <span style="color: red">{{ $operateur?->user?->ninea }}</span>
                        </td>
                    </tr>
                    <tr class="item">
                        <td colspan="3">
                            Arrêté :
                            @if (!empty($operateur?->arrete_creation))
                                {{ $operateur?->arrete_creation }}
                            @else
                                Non
                            @endif
                        </td>
                    </tr>
                    <tr class="item">
                        <td colspan="6">
                            CV formateur(s) daté(s) et signé(s) :
                            {{ $operateur?->cvsigne }}
                        </td>
                    </tr>
                    <tr class="item">
                        <td colspan="6">
                            Quitus fiscal ou récépissé de dépôt du quitus fiscal :
                            {{ $operateur?->quitusfiscal }}
                        </td>
                    </tr>
                </tbody>
            </table>

            <div style="page-break-after: always;"></div>

            <div class="invoice-box">
                <table class="table table-responsive mt-10">
                    <tbody>
                        <tr class="item">
                            <td rowspan="{{ count($operateur?->operateurmodules) + 1 }}">
                                <b>{{ __("DOMAINES D'INTERVENTION") }}</b>
                            </td>

                            <td colspan="3">
                                <b>DOMAINE</b>
                            </td>

                            <td colspan="4">
                                <b>MODULE</b>
                            </td>
                        </tr>
                        @foreach ($operateur?->operateurmodules as $operateurmodule)
                            <tr class="item">
                                <td colspan="3">
                                    {{ $operateurmodule?->domaine }}
                                </td>

                                <td colspan="4">
                                    {{ $operateurmodule?->module }}
                                </td>
                            </tr>
                        @endforeach
                        <tr class="item">
                            <td rowspan="{{ count($operateur->operateurformateurs) + 1 }}">
                                <b>{{ __('COMPETENCES DISPONIBLES (formateurs)') }}</b>
                            </td>

                            <td colspan="3">
                                <b>Nom formateur</b>
                            </td>

                            <td colspan="4">
                                <b>Champs profes. et années d'expérience</b>
                            </td>
                        </tr>
                        @foreach ($operateur?->operateurformateurs as $operateurformateur)
                            <tr class="item">
                                <td colspan="3">
                                    {{ $operateurformateur?->name }}
                                </td>

                                <td colspan="4">
                                    {{ $operateurformateur?->domaine . ' (' . $operateurformateur?->nbre_annees_experience . ' ans)' }}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div style="page-break-after: always;"></div>

            <div class="invoice-box">
                <table class="table table-responsive mt-10">
                    <tbody>
                        <tr class="item">
                            <td rowspan="{{ count($operateur->operateurequipements) + 1 }}">
                                <b>{{ __('MOYENS PEDAGOGIQUES') }}</b>
                            </td>

                            {{--  <td colspan="3" width="100%">
                                <b>Type</b>
                            </td> --}}

                            <td colspan="6" width="100%">
                                <b>Type & Désignation</b>
                            </td>
                            <td style="text-align: center">
                                <b>Qté</b>
                            </td>
                            <td style="text-align: center">
                                <b>Etat</b>
                            </td>
                        </tr>
                        @foreach ($operateur?->operateurequipements as $operateurequipement)
                            <tr class="item">
                                {{--  <td colspan="3">
                                    {{ $operateurequipement?->type }}
                                </td> --}}

                                <td colspan="6">
                                    <b><u>Type</u></b> : {{ $operateurequipement?->type }} <br>
                                    <b><u>Désignation</u></b> : {{ $operateurequipement?->designation }} <br>
                                </td>
                                <td style="text-align: center">
                                    {{ $operateurequipement?->quantite }}
                                </td>
                                <td style="text-align: center">
                                    {{ $operateurequipement?->etat }}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div style="page-break-after: always;"></div>

            <div class="invoice-box">
                <table class="table table-responsive mt-10">
                    <tbody>

                        <tr class="item">
                            <td rowspan="{{ count($operateur?->operateureferences) + 1 }}">
                                <b>{{ __('EXPERIENCES') }}</b>
                            </td>

                            {{-- <td colspan="4">
                                <b>Référence & Année</b>
                            </td> --}}

                            <td colspan="7">
                                <b>Référence & Activités</b>
                            </td>
                        </tr>
                        @foreach ($operateur?->operateureferences as $operateureference)
                            <tr class="item">
                                {{-- <td colspan="4">
                                    {{ $operateureference?->organisme . ',' }}
                                    {{ $operateureference?->periode }} <br>
                                    Tél : <a
                                        href="tel:+{{ $operateureference?->contact }}">{{ $operateureference?->contact }}</a>
                                </td> --}}

                                <td colspan="7">
                                    <b><u>Référence</u></b> : {{ $operateureference?->organisme . ',' }}
                                    {{ $operateureference?->periode }} <br>
                                    @if (!empty($operateureference?->contact))
                                        Tél : <a
                                            href="tel:+{{ $operateureference?->contact }}">{{ $operateureference?->contact }}</a>
                                        <br>
                                    @endif
                                    <b><u>Description</u></b> : {{ $operateureference?->description }}
                                </td>
                            </tr>
                        @endforeach

                        <tr class="item">
                            <td><b>{{ __('OBSERVATIONS') }}</b></td>
                            <td colspan="7">
                                @if (!empty($operateur?->observations))
                                    {{ $operateur?->observations }}
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- <div style="page-break-after: always;"></div> --}}
        </div>
        <div style="page-break-after: always;"></div>
    @endforeach

</body>

</html>
