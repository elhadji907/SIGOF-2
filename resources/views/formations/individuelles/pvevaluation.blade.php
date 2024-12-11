<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>{{ $title }}</title>
    {{-- <style>
        @page {
            margin: 0cm 0cm;
        }

        .invoice-box {
            max-width: 1000px;
            margin: auto;
            padding: 30px;
            font-size: 12px;
            line-height: 20px;
            color: color: rgb(0, 0, 0);
            ;
        }

        .rtl {
            imputation: rtl;
        }

        .invoice-box table tr.heading td {
            background: rgb(255, 255, 255);
            border: 1px solid #000000;
            font-weight: bold;
        }

        .invoice-box table tr.total td {
            border-top: 2px solid #eee;
            border-bottom: 1px solid #eee;
            border-left: 1px solid #eee;
            border-right: 1px solid #eee;
            background: #eee;
            font-weight: bold;
        }

        .invoice-box table tr.item td {
            border: 1px solid #000000;
        }

        table {
            border-left: 0px solid rgb(0, 0, 0);
            border-right: 0;
            border-top: 0px solid rgb(0, 0, 0);
            border-bottom: 0;
            width: 100%;
            border-spacing: 0px;
        }

        table td,
        table th {
            border-left: 0;
            border-right: 0px solid rgb(0, 0, 0);
            border-top: 0;
            border-bottom: 0px solid rgb(0, 0, 0);
        }
    </style> --}}
    <style>
        @page {
            margin: 0cm 0cm;
        }

        .invoice-box {
            max-width: 1000px;
            margin: auto;
            /* padding: 30px; */
            font-size: 12px;
            line-height: 15px;
            color: color: rgb(0, 0, 0);
            ;
        }

        /** RTL **/
        .rtl {
            imputation: rtl;
        }

        .invoice-box table tr.heading td {
            background: rgb(255, 255, 255);
            border: 1px solid #000000;
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
            /* border-left: 0;
            border-right: 0px solid rgb(0, 0, 0);
            border-top: 0;
            border-bottom: 0px solid rgb(0, 0, 0); */
            border: 1px solid;
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
        {{-- <b>REPUBLIQUE DU SENEGAL<br></b>
        Un Peuple - Un But - Une Foi<br>
        <b>********<br>
            MINISTERE DE LA FORMATION PROFESSIONNELLE<br>
            ********<br>
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/logo-onfp.jpg'))) }}"
                style="width: 100%; max-width: 300px" />
        </b> --}}
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/entete_lettre_mission.png'))) }}"
            style="width: 100%; max-width: 300px" />
    </h6>
    <div class="invoice-box">
        <table class="table table-responsive">
            <thead>
                <tr class="heading" style="text-align: center;">
                    <td colspan="11"><b>{{ __("PROCES VERBAL D'EVALUATION DE FORMATION") }}</b>
                    </td>
                </tr>
                <tr class="heading">
                    <td colspan="5"><b>{{ __('Période: ') }}</b>
                        @isset($formation?->date_debut)
                            {{ 'du ' . $formation?->date_debut?->format('d/m/Y') }}
                        @endisset
                        @isset($formation?->date_fin)
                            {{ ' au ' . $formation?->date_fin?->format('d/m/Y') }}
                        @endisset
                    </td>
                    <td colspan="6"><b>{{ __('Intitulé formation: ') }}</b> {{ $formation?->module?->name }}
                    </td>
                </tr>
                <tr class="heading">
                    <td colspan="5"><b>{{ __('Lieu: ') }}</b> {{ $formation?->lieu }}
                    </td>
                    <td colspan="6"><b>{{ __('Opérateur: ') }}</b>
                        {{ $formation?->operateur?->user?->operateur . ' (' . $formation?->operateur?->user?->username . ')' }}
                    </td>
                </tr>
                <tr class="heading">
                    <td colspan="2"><b>{{ __('Code: ') }}</b> {{ $formation?->code }}
                    </td>
                    <td colspan="3"><b>{{ __('Niveau qualification: ') }}</b>
                        {{ $formation?->niveau_qualification }}
                    </td>
                    <td colspan="6"><b>{{ __('Titre: ') }}</b> {{ $formation?->titre }}
                    </td>
                </tr>
                <tr class="heading">
                    {{--  <td colspan="7">
                        <b>{{ __('Ingénieur en charge : ') }}</b>{{ $formation?->ingenieur?->name . '(' . $formation?->ingenieur?->initiale . ')' }}
                    </td> --}}
                    <td rowspan="2" class="item" style="text-align: center;"><b>N°</b></td>
                    <td rowspan="2" class="item" style="text-align: center;"><b>CIN</b></td>
                    <td rowspan="2" class="item" style="text-align: center;"><b>Civilité</b></td>
                    <td rowspan="2" class="item" style="text-align: center;"><b>Prénom</b></td>
                    <td rowspan="2" class="item" style="text-align: center;"><b>NOM</b></td>
                    <td rowspan="2" class="item" style="text-align: center;"><b>Date naissance</b></td>
                    <td rowspan="2" class="item" style="text-align: center;"><b>Lieu de naissance</b></td>
                    <td rowspan="2" class="item" style="text-align: center;"><b>Téléphone</b></td>
                    <td colspan="3" style="text-align: center;"><b>{{ __('DECISION DU JURY') }}</b>
                    </td>
                </tr>
                <tr class="item" style="text-align: center;">
                    <td><b>Note</b></td>
                    <td><b>Niveau de maitrise</b></td>
                    <td><b>Observations</b></td>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($formation->individuelles as $individuelle)
                    <tr class="item" style="text-align: center;">
                        <td>{{ $i++ }}</td>
                        <td>{{ $individuelle->user->cin }}</td>
                        <td>{{ $individuelle?->user?->civilite }}</td>
                        <td>{{ ucwords($individuelle?->user?->firstname) }}</td>
                        <td>{{ strtoupper($individuelle?->user?->name) }}</td>
                        <td>{{ $individuelle?->user?->date_naissance?->format('d/m/Y') }}</td>
                        <td>{{ strtoupper($individuelle?->user?->lieu_naissance) }}</td>
                        <td>{{ $individuelle?->user?->telephone }}</td>
                        <td>{{ $individuelle?->note_obtenue ?? '' }}</td>
                        <td>{{ $individuelle?->appreciation }}</td>
                        <td>{{ $individuelle?->observations }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h4 valign="top">
            <b><u>SIGNATURE DES MEMBRES DU JURY</u></b> : @isset($formation?->date_pv)
                <span
                    style="float: right; font-style: italic">{{ $formation?->departement?->nom . ', ' . $formation?->departement?->region?->nom . ', le ' . $formation?->date_pv?->format('d/m/Y') }}</span>
            @endisset
            <br>
            <?php $i = 1; ?>
            {{ $formation?->evaluateur?->name . ', ' . $formation?->evaluateur?->fonction }}<br>
            {{ $formation?->onfpevaluateur?->name . ', ' . $formation?->onfpevaluateur?->fonction }}<br>
            @isset($membres_jury)
                @foreach ($membres_jury as $item)
                    {{ $item }} <br>
                    {{-- {{ $i++ . '/' . $count_membres . '. ' . $item }} <br><br> --}}
                @endforeach
            @endisset
        </h4>
    </div>
    {{-- <footer>
        {{ __("Cité SIPRES 1 lot 2 - 2 voies liberté 6 extension VDN  Tél. : 33 827 92 51- Fax : 33 827 92 55
                B.P. 21013 Dakar-Ponty  E-mail : onfp@onfp.sn - site web www.onfp.sn") }}
    </footer> --}}
</body>

</html>
