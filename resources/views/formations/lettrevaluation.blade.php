<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>{{ $title }}</title>

    <style>
        @page {
            margin: 0cm 0cm;
        }

        .invoice-box {
            max-width: 700px;
            margin: auto;
            padding: 30px;
            /* border: 1px solid #eee; */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 14px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            /* color: #555; */
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 0px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Arial, 'Helvetica Neue', 'Helvetica', Helvetica, Tahoma, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }

        ul {
            list-style-type: none;
        }

        span:before {
            content: '- ';
        }
    </style>
</head>

<body>
    {{--  <h6 valign="top" style="text-align: center;">
        <b>REPUBLIQUE DU SENEGAL<br></b>
        Un Peuple - Un But - Une Foi<br>
        <b>********<br>
            MINISTERE DE LA FORMATION PROFESSIONNELLE<br>
            ********<br>
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/logo-onfp.jpg'))) }}"
                style="width: 100%; max-width: 300px" />
        </b>
    </h6> --}}
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/entete_lettre_mission.png'))) }}"
                                    style="width: 100%; max-width: 300px" />

                                {{--  REPUBLIQUE DU SENEGAL<br>
                                Un Peuple - Un But - Une Foi<br>
                                ********<br>
                                MINISTERE DE LA FORMATION PROFESSIONNELLE<br>
                                ********<br>
                                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/logo-onfp.jpg'))) }}"
                                    style="width: 100%; max-width: 300px" /> --}}
                            </td>

                            <td>
                                <p style="font-weight: bold;">ONFP/DG/DEC/{{ $formation?->initiale_evaluateur_onfp }}</p>
                                <p style="text-align: center; font-weight: bold;">Dakar, le</p><br>
                                <p style="text-align: left; font-weight: bold; font-style: italic">Le Directeur général
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <table class="information">
                        <tr>
                            <td>
                                <h2 style="text-align: center;">LETTRE DE MISSION</h2>

                                <p style="text-align : justify;">
                                    <b>{{ $formation?->onfpevaluateur?->name . ', ' . $formation->onfpevaluateur?->fonction }},</b>
                                    tel n° {{ $formation?->onfpevaluateur?->telephone }}, est sollicité
                                    pour être membre du jury de certification selon les procédures de l'ONFP pour la
                                    formation ci-après:
                                </p>

                                <p><b>Intitulé de la formation </b>:
                                    @if (!empty($formation?->module?->name))
                                        {{ $formation?->module?->name }}
                                    @elseif (!empty($formation?->collectivemodule?->module))
                                        {{ $formation?->collectivemodule?->module }}
                                    @else
                                        {{ $formation?->module?->name }}
                                    @endif
                                </p>
                                <p><b>Niveau de qualification </b>: {{ $formation?->niveau_qualification }} </p>
                                <p><b>Nombre de bénéficiaires </b>:
                                    {{ ' H: ' . str_pad($formation->prevue_h, 2, '0', STR_PAD_LEFT) }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    {{ ' F: ' . str_pad($formation->prevue_f, 2, '0', STR_PAD_LEFT) }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    {{ ' T: ' . str_pad($formation->effectif_prevu, 2, '0', STR_PAD_LEFT) }}
                                </p>
                                <p><b>Opérateur d'exécution </b>:
                                    {{ $formation?->operateur?->user?->operateur }}
                                    @if (!empty($formation?->operateur?->user?->username))
                                        {{ '(' . $formation?->operateur?->user?->username . ')' }}
                                    @endif
                                </p>
                                <p><b>Lieu de formation </b>:
                                    {{ $formation?->lieu }}
                                </p>
                                <p><b>Document attendu </b>:
                                <ol>
                                    <span>
                                        Procès-verbal (PV) de certification<br />
                                    </span>
                                </ol>
                                </p>
                                <p><b>Documents de référence </b>:
                                <ol>
                                    <span>
                                        Convention d'assistance n°
                                        {{ $formation?->numero_convention . ' du ' . $formation?->date_convention?->format('d/m/Y') }}<br />
                                    </span>
                                    <span>
                                        DETF<br />
                                    </span>
                                    <span>
                                        Guide d'évaluation<br />
                                    </span>
                                </ol>
                                </p>
                                <p><b>Date de l'évaluation </b>:
                                    {{ 'Le ' . $formation?->date_pv?->translatedFormat('l d F Y') }} </p>
                                <p><b>Montant indemnité de membre </b> :
                                    {{ number_format($formation?->frais_evaluateur, 0, ',', ' ') }} F CFA versé sur
                                    présentation d'une demande de paiement
                                    et du PV d'évaluation.
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
