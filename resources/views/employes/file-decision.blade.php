<!DOCTYPE html>
<html lang="fr">
<title>{{ $title }}</title>

<head>

    <meta charset="utf-8" />
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            font-size: 14px;
            line-height: 20px;
            color: color: rgb(0, 0, 0);
            ;
        }

        /** RTL **/
        .rtl {
            imputation: rtl;
        }

        .invoice-box table tr.heading td {
            background: rgb(255, 255, 255);
            border: 1px solid #ffffff;
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
            border: 1px solid #ffffff;
        }

        table {
            border-left: 0px solid rgb(255, 255, 255);
            border-right: 0;
            border-top: 0px solid rgb(255, 255, 255);
            border-bottom: 0;
            width: 100%;
            border-spacing: 0px;
        }

        table td,
        table th {
            border-left: 0;
            border-right: 0px solid rgb(255, 255, 255);
            border-top: 0;
            border-bottom: 0px solid rgb(255, 255, 255);
        }

        /* Create two unequal columns that floats next to each other */
        .column {
            float: left;
            padding: 10px;
            height: 0px;
            /* Should be removed. Only for demonstration */
        }

        .left {
            width: 2%;
        }

        .right {
            width: 98%;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//db.onlinewebfonts.com/c/dd79278a2e4c4a2090b763931f2ada53?family=ArialW02-Regular" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    {{--  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">  --}}
</head>

<body>
    <div class="invoice-box">
        <table class="table table-responsive">
            <tbody>
                <tr>
                    <td colspan="2" align="left" valign="top" style="text-align: center;">
                        <b>REPUBLIQUE DU SENEGAL<br>
                            <small> Un Peuple - Un But - Une Foi</small><br>
                            ----------<br>
                            Ministère de la Formation Professionnelle (MFP)<br>
                            ----------<br>
                        </b>
                    </td>
                    <td colspan="2" valign="top">
                        <p align="right">
                            <b> {{ __('ONFP/DG/DRH/DIVagp') }} </b>
                        </p>
                        <p align="center">
                            <b> <br> {{ __('Dakar, le') }} </b>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table table-responsive">
            <tbody>
                <tr>
                    <td colspan="2" align="left">
                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/logo-onfp.jpg'))) }}"
                            style="width: 100%; max-width: 300px" />
                    </td>
                </tr>
            </tbody>
        </table>
        <h3 align="right"><u>DECISION</u> :
            @foreach ($employe->nomminations as $nommination)
                {{ $nommination?->name }}
            @endforeach
        </h3>
        <h3 align="right"><i>Le Directeur général</i></h3>
        <table class="table table-responsive">
            <tbody>
                <tr>
                    <td style="float:right;" colspan="4" valign="top">
                        <table class="table table-responsive table-striped">
                            <tbody align="justify">
                                @foreach ($employe->lois as $loi)
                                    <tr class="item">
                                        <td valign="top">
                                            <b>{{ __('Vu') }}</b>
                                        </td>
                                        <td colspan="2" style="padding-left: 20px;">
                                            {{ $loi?->name }};
                                        </td>
                                    </tr>
                                @endforeach
                                @foreach ($employe->decrets as $decret)
                                    <tr class="item">
                                        <td valign="top">
                                            <b>{{ __('Vu') }}</b>
                                        </td>
                                        <td colspan="2" style="padding-left: 20px;">
                                            {{ $decret?->name }};
                                        </td>
                                    </tr>
                                @endforeach
                                @foreach ($employe->procesverbals as $procesverbal)
                                    <tr class="item">
                                        <td valign="top">
                                            <b>{{ __('Vu') }}</b>
                                        </td>
                                        <td colspan="2" style="padding-left: 20px;">
                                            {{ $procesverbal?->name }};
                                        </td>
                                    </tr>
                                @endforeach
                                @foreach ($employe->decisions as $decision)
                                    <tr class="item">
                                        <td valign="top">
                                            <b>{{ __('Vu') }}</b>
                                        </td>
                                        <td colspan="2" style="padding-left: 20px;">
                                            {{ $decision?->name }};
                                        </td>
                                    </tr>
                                @endforeach
                                <tr class="item">
                                    <td valign="top">
                                        <b>{{ __('Vu') }}</b>
                                    </td>
                                    <td colspan="2" style="padding-left: 20px;">
                                        {{ __('le dossier de l’intéressé') }};
                                    </td>
                                </tr>
                                <tr class="item">
                                    <td valign="top">
                                        <b>{{ __('Vu') }}</b>
                                    </td>
                                    <td colspan="2" style="padding-left: 20px;">
                                        {{ __('les dispositions budgétaires') }};
                                    </td>
                                </tr>
                                <tr class="item">
                                    <td valign="top">
                                        <b>{{ __('Vu') }}</b>
                                    </td>
                                    <td colspan="2" style="padding-left: 20px;">
                                        {{ __('les nécessités de service') }};
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        {{-- Lois --}}
        <div align="justify">
            {{--    @foreach ($employe->lois as $loi)
                <div class="row">
                    <p class="column left">
                        <b>Vu</b>
                    </p>
                    <p class="column right">
                        {{ $loi?->name }};
                    </p>
                </div>
            @endforeach --}}
            {{-- Decrets --}}
            {{--  @foreach ($employe->decrets as $decret)
                <div class="row">
                    <p class="column left">
                        <b>Vu</b>
                    </p>
                    <p class="column right">
                        {{ $decret?->name }};
                    </p>
                </div>
            @endforeach --}}
            {{-- PV --}}
            {{-- @foreach ($employe->procesverbals as $procesverbal)
                <div class="row">
                    <p class="column left">
                        <b>Vu</b>
                    </p>
                    <p class="column right">
                        {{ $procesverbal?->name }};
                    </p>
                </div>
            @endforeach --}}

            {{-- Décision --}}
            {{-- @foreach ($employe->decisions as $decision)
                <div class="row">
                    <p class="column left">
                        <b>Vu</b>
                    </p>
                    <p class="column right">
                        {{ $decision?->name }};
                    </p>
                </div>
            @endforeach --}}
            {{--  <p>
                @foreach ($employe->lois as $loi)
                    <b>Vu</b>
                    <span style="margin-left:10px">{{ $loi?->name }};<br></span>
                @endforeach
                @foreach ($employe->decrets as $decret)
                    <b>Vu</b>
                    <span style="margin-left:10px">{{ $decret?->name }};<br></span>
                @endforeach
                @foreach ($employe->procesverbals as $procesverbal)
                    <b>Vu</b>
                    <span style="margin-left:10px">{{ $procesverbal?->name }};<br></span>
                @endforeach
                @foreach ($employe->decisions as $decision)
                    <b>Vu</b>
                    <span style="margin-left:10px">{{ $decision?->name }};<br></span>
                @endforeach
                <b>Vu</b>
                <span style="margin-left:10px">{{ __('le dossier de l’intéressé') }};<br></span>
                <b>Vu</b>
                <span style="margin-left:10px">{{ __('les dispositions budgétaires') }};<br></span>
                <b>Vu</b>
                <span style="margin-left:10px">{{ __('les nécessités de service') }};<br></span>
            </p> --}}
            <h2 align="center">DECIDE:</h2>
            <table class="table table-responsive">
                <tbody>
                    <tr>
                        <td style="float:right;" colspan="4" valign="top">
                            <table class="table table-responsive table-striped">
                                <tbody align="justify">
                                    <tr class="item">
                                        {{-- <td valign="top">
                                                <b>{{ __('Article premier : ') }}</b>
                                            </td> --}}
                                        <td colspan="4">
                                            <b><u>Article premier</u> :
                                                {{ $employe->user->civilite . ' ' . $employe->user->firstname . ' ' . $employe->user->name . ', ' }}
                                            </b>
                                            {{ ' né le ' . $employe->user->date_naissance?->translatedFormat('d F Y') . ' à ' . $employe->user->lieu_naissance . ', titulaire d\'un(e) ' }}
                                            <b> {{ $employe->diplome . ', ' }} </b> matricule de solde
                                            <b>{{ $employe->matricule . ', ' }}</b> précédemment <b>
                                                {{ $employe->fonction_precedente . ', ' }} </b> est nommé(e)
                                            <b>{{ $employe->fonction?->name }}.</b>
                                        </td>
                                    </tr><br>
                                    <tr class="item">
                                        <td colspan="4">
                                            <b><u>Article 2</u> :
                                                {{ $employe->user->civilite . ' ' . $employe->user->firstname . ' ' . $employe->user->name }}</b>
                                            percevra un salaire mensuel de base de
                                            <b>{{ $employe->category->salaire_lettre . '(' . number_format($employe->category->salaire, 0, ',', ' ') . ')' . 'Francs CFA ' }}</b>
                                            correspondant à la catégorie <b>{{ $employe->category->name }}</b> de la
                                            grille salariale du personnel de l'ONFP
                                            adoptée par le Conseil d'Administration du 21 Août 2014.
                                        </td>
                                    </tr><br>
                                    <tr class="item">
                                        <td colspan="4">
                                            <?php $i = 2; ?>
                                            @foreach ($employe->articles as $article)
                                                <b><u>Article {{ ++$i }}</u> :</b>
                                                {{ $article?->name }};<br><br>
                                            @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            {{--  <?php $i = 2; ?> --}}
            {{-- <p><b>Article premier : </b>
                <span style="margin-left:10px"><b>{{ $employe->user->civilite . ' ' . $employe->user->firstname . ' ' . $employe->user->name . ', ' }}
                    </b>
                    {{ ' né le ' . $employe->user->date_naissance?->translatedFormat('d F Y') . ' à ' . $employe->user->lieu_naissance . ', titulaire d\'un(e) ' }}
                    <b> {{ $employe->diplome . ', ' }} </b> matricule de solde
                    <b>{{ $employe->matricule . ', ' }}</b> précédemment <b>
                        {{ $employe->fonction_precedente . ', ' }} </b> est nommé(e)
                    <b>{{ $employe->fonction?->name }}</b>
            </p></span> --}}
            {{-- @foreach ($employe->articles as $article)
                <p><b>Article {{ $i++ }} :</b>
                    <span style="margin-left:10px">{{ $article?->name }};
                </p></span>
            @endforeach --}}
        </div>
        <div
            style="position: fixed;
            bottom: -10px;
            left: 0px;
            right: 0px;
            height: 50px;
            background-color: rgb(255, 255, 255);
            color: rgb(0, 0, 0);
            text-align: center;
            line-height: 10px;">
            <span>
                <hr>
                {{ __('Cité Sipres 1 lot 2 - 2 voies liberté 6, extension VDN, Tel : 33 827 92 51, Email: onfp@onfp.sn, site web: www.onfp.sn') }}
            </span>
        </div>
    </div>
</body>

</html>
