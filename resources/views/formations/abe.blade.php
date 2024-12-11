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

        a:before {
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
                <td>
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
                            {{-- 
                            <td>
                                <p style="font-weight: bold;">ONFP/DG/DEC/{{ $formation?->initiale_evaluateur_onfp }}</p>
                                <p style="text-align: center; font-weight: bold;">Dakar, le</p><br>
                                <p style="text-align: left; font-weight: bold; font-style: italic">Le Directeur général
                                </p>
                            </td> --}}
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <table class="information">
                        <tr>
                            <td>
                                <h2 style="text-align: center;">ATTESTATION DE BONNE EXECUTION DE FORMATION</h2>

                                <p style="text-align : justify;">
                                    <b>OPERATEUR </b> :
                                    {{ $formation?->operateur?->user?->operateur }}
                                    @if (!empty($formation?->operateur?->user?->username))
                                        {{ '(' . $formation?->operateur?->user?->username . ')' }}
                                    @endif
                                </p>
                                <p style="text-align : justify;">
                                    <span><b>MODULE </b> :
                                        @isset($formation?->module?->name)
                                            {{ $formation?->module?->name }}
                                        @endisset
                                        @isset($formation?->collectivemodule?->module)
                                            {{ $formation?->collectivemodule?->module }}
                                        @endisset
                                    </span>
                                    <br>
                                </p>
                                <p style="text-align : justify;">
                                    <span>
                                        <b>NIVEAU DE QUALIFICATION VISE </b> :
                                        @if (!empty($formation?->referentiel?->titre))
                                            {{ $formation?->referentiel?->titre . ', ' . $formation?->referentiel?->categorie . ' de la ' . $formation?->referentiel?->convention?->name }}
                                        @else
                                        {{ $formation?->titre }}
                                        @endif
                                    </span>
                                </p>
                                <p>
                                    <span>
                                        <b>REF CONVENTION D'ASSISTANCE </b> :
                                        {{ $formation?->numero_convention . '/ONFP/DG/DIOF/' . $formation->ingenieur->initiale . ' du ' . $formation?->date_convention?->format('d/m/Y') }}
                                    </span>
                                </p>
                                <p>
                                    <span>
                                        <b>PERIODE DE LA FORMATION </b> :
                                        @isset($formation?->date_debut)
                                            {{ 'Du ' . $formation?->date_debut?->format('d/m/Y') }}
                                        @endisset
                                        @isset($formation?->date_fin)
                                            {{ ' au ' . $formation?->date_fin?->format('d/m/Y') }}
                                        @endisset
                                    </span>
                                </p>
                                <p>
                                    <span>
                                        <b>LIEU DE LA FORMATION </b> :
                                        {{ $formation?->departement?->nom }}
                                    </span>
                                </p>

                                <p><b>NOMBRE DE BENEFICIAIRES RETENUS </b>:
                                    {{ ' H : ' . str_pad($retenus_h_count, 2, '0', STR_PAD_LEFT) }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    {{ ' F : ' . str_pad($retenus_f_count, 2, '0', STR_PAD_LEFT) }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    {{ ' T : ' . str_pad($retenus_total, 2, '0', STR_PAD_LEFT) }}
                                </p>

                                <p>
                                    <span>
                                        <b>LOCALITE DES BENEFICIAIRES </b> :
                                        {{ $formation?->lieu }}
                                    </span>
                                </p>

                                <p><b>NOMBRE DE BENEFICIAIRES EFFECTIVEMENT FORMES </b>:
                                    {{ ' H : ' . str_pad($formes_h_count, 2, '0', STR_PAD_LEFT) }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    {{ ' F : ' . str_pad($formes_f_count, 2, '0', STR_PAD_LEFT) }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    {{ ' T : ' . str_pad($formes_total, 2, '0', STR_PAD_LEFT) }}
                                </p>

                                <p>
                                    <span>
                                        <b>TYPE DE CERTIFICATION DÉLIVRÉE </b> :
                                        {{ $formation?->niveau_qualification }}
                                    </span>
                                </p>

                                <p><b>NOMBRE DE BÉNÉFICIAIRES CERTIFIÉS </b>:
                                    {{ ' H : ' . str_pad($admis_h_count, 2, '0', STR_PAD_LEFT) }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    {{ ' F : ' . str_pad($admis_f_count, 2, '0', STR_PAD_LEFT) }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </p>

                                <p>
                                    Je soussigné(nom et qualité) {{ $formation->evaluateur_onfp }} certifie, au nom de
                                    l'ONFP, que l'opérateur a exécuté la formation conformément à la convention
                                    d'assistance sus mentionnée.
                                </p>

                                <p>
                                    <span>
                                        <b>Recommandations éventuelles </b> :
                                        {{ $formation?->recommandations }}
                                    </span>
                                </p>

                                <p style="text-align: right; font-style: italic">
                                    {{ 'Fait à ' . $formation?->departement?->nom . ' le ' . $formation?->date_pv?->translatedFormat('l d F Y') }}
                                </p>
                                <p style="text-align: right; font-style: italic">
                                    <span>
                                        <b>Prénom, Nom et Signature </b><br>
                                        {{ $formation->evaluateur_onfp }}
                                    </span>
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
