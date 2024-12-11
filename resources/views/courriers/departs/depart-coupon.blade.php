<!DOCTYPE html>
<html lang="fr">
<title>{{ $title }}</title>

<head>

    <meta charset="utf-8" />
    <style>
        @page {
            margin-top: 0cm;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
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

        .X {
            background-color: #DC3545;
            color: white;
            padding: 4px 8px;
            text-align: center;
            border-radius: 25% 10%;
            /* border-radius: 5px; */
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
        <table class="table table-responsive" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td>
                        {{-- <b>REPUBLIQUE DU SENEGAL<br>
                            Un Peuple - Un But - Une Foi<br>
                            ********<br>
                            MINISTERE DE LA FORMATION PROFESSIONNELLE
                        </b> --}}

                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/entete_lettre_mission.png'))) }}"
                            style="width: 100%; max-width: 300px" />
                    </td>
                    <td colspan="2" align="right">
                        <p>
                            <b> {{ __("Date d'imputation : ") }} </b>
                            @if (isset($courrier->date_imp))
                                {{ $courrier->date_imp?->format('d/m/Y') }} <br />
                            @else
                                {{ __('- - - - - - - - - - - -') }} <br />
                            @endif
                            <b> {{ __("Date départ : ") }} </b>
                            {{ $courrier->date_depart?->format('d/m/Y') }} <br />
                            <b> {{ __('N° du courrier : ') }} </b> <span style="color:red">{{ 'CD-'.$depart?->numero }}</span>
                            <br />
                        <h1><br><u>{{ __("FICHE D'IMPUTATION") }}</u></h1>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        {{-- <table class="table table-responsive">
            <tbody>
                <tr>
                    <td colspan="4" align="left">
                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/logo-onfp.jpg'))) }}"
                            style="width: 100%; max-width: 300px" />
                    </td>
                    <td colspan="4" align="right"><b>
                            <h1><br><u>{{ __("FICHE D'IMPUTATION") }}</u></h1>
                        </b>
                    </td>
                </tr>
            </tbody>
        </table> --}}
        <table class="table table-responsive">
            <tbody>
                <tr>
                    <td colspan="4" align="left" valign="top">
                        <p>
                            <b>{{ __('Expéditeur') }}</u></b> : {{ mb_strtoupper($depart->courrier?->reference) }}<br>
                            @isset($courrier->reference)
                                <b>{{ __('Réf') }}</u></b> : {{ $courrier->numero }}&nbsp;&nbsp;&nbsp;&nbsp;
                                <b>{{ __('du') }}</u></b> :
                                {{ $depart->courrier->date_cores?->format('d/m/Y') }}
                            @endisset
                            <br>
                            <b>{{ __('Objet') }}</u></b> : {{ ucfirst($courrier->objet) }}<br>
                        </p>
                        <table class="table table-responsive table-striped">
                            <tbody>
                                <tr class="item">
                                    <?php $i = 1; ?>
                                    @foreach ($directions as $direction)
                                        <td style="padding-left:5px;">
                                            {!! $direction ?? 'Aucune' !!}
                                            <span style="float:right;">
                                                <span
                                                    style="color: red; padding-right:5px;">{{ in_array($direction, $departDirections) ? 'X' : '' }}</span></span>
                                        </td>
                                        @if ($i % 4 == 0)
                                </tr>
                                <tr class="item">
                                    @endif
                                    <?php $i++; ?>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>

                    </td>
                    <td style="padding-left:10px; padding-top:20px; float:right;" colspan="4" valign="top">
                        <table class="table table-responsive table-striped">
                            <tbody>
                                <tr class="heading">
                                    <td colspan="4" align="center"><b>{{ __('ACTIONS ATTENDUES') }}</b>
                                    </td>
                                </tr>
                                @foreach ($actions as $action)
                                    <tr class="item">
                                        <td colspan="2" style="padding-left:5px;">
                                            {{ $action }}
                                        </td>
                                        <td colspan="2" align="center">
                                            @if ($action == $courrier->description)
                                                <span style="color: red; padding-right:5px;">{{ __('X') }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table table-responsive">
            <tbody>
                <tr>
                    <td colspan="2" align="left" valign="top">
                        @if (isset($courrier->observation))
                            <h4><u>Observations</u></h4>
                            {{ $courrier->observation }}
                        @else
                            <h4><u>Observations</u>:
                        @endif
                        </h4>

                    </td>
                </tr>
            </tbody>
        </table>
        {{--  <table class="table table-responsive">
            <tbody>
                <tr>
                    <td colspan="1" align="left">

                    </td>
                    <td colspan="3" align="right" valign="top">
                        <h4>
                            <b><u> {{ __('Dossier suivi par :') }}</u></b><br>
                            @if ($courrier->employees == '[]')
                                {{ __('_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _') }}
                            @endif

                            @foreach ($courrier->employees->unique('id') as $employee)
                                {{ $employee->user->firstname . ' ' . $employee->user->name }}
                                [{{ $employee->direction->sigle }}]<br>
                            @endforeach

                        </h4>
                    </td>
                </tr>
            </tbody>
        </table> --}}
        {{--  <div
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
                {{ __('Sipres 1 lot 2 - 2 voies liberté 6, extension VDN, Tel : 33 827 92 51, Email: onfp@onfp.sn, site web: www.onfp.sn') }}
            </span>
        </div> --}}
    </div>
</body>

</html>
