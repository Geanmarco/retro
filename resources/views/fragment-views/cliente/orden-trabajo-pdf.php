<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>3000070958.xlsx</title>
    <meta name="author" content="GENERAL">
    <style type="text/css"> * {
            margin: 0;
            padding: 0;
            text-indent: 0;
        }


        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, tbody {
            vertical-align: top;
            overflow: visible;
        }

        th, td {
            border: 1px solid black;
            padding: 2px;
            text-align: left;
        }


        #scroll {
            height: calc(100vh - 120px);
            padding-bottom: 30px !important;
            overflow-y: auto;
            padding-bottom: 40px;
            display: flex;
            justify-content: center;
        }

        .padding-m {
            padding: 20px;
        }


        <?php

        if ($generar==false):?>
        .pagina {
            background-color: #FFF;
            position: absolute;
            width: 210mm;
            page-break-after: always;
            border: 1px solid #ddd;
            padding: 14mm;
            margin: 40px 0;
        }

        body {
            background-color: #FFF;
            display: flex;
            justify-content: center;
            height: auto !important;
        }

        .pagina p {
            font-size: 13px;
        }

        tr p {
            min-height: 21px;
        }

        .separe {
            height: 15px;
        }

        <?php else:?>

        body {
            background-color: #FFFF;

            display: flex;
            justify-content: center;
            height: auto !important;
        }

        @page {
            margin: 20px 52px !important;
            padding: 0px 0px 0px 0px !important;
            font-family: poppins, 'sans-serif', arial !important;
            border: 0;
            outline: 0;
        }

        .pagina p {
            font-size: 11px;
        }

        tr p {
            min-height: 12px;
        }

        .separe {
            height: 5px;
        }

        <?php endif;?>


        .td-noborder {
            border: unset;
        }

        .text-center {
            text-align: center;
        }


        .items-center {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .center-y {
            display: flex;
            align-items: center;
        }

        .td-vcenter {
            vertical-align: middle;
        }

        .td-hcenter {
            text-align: center;
        }

        #table-firma td {
            border: unset;
        }
    </style>
</head>
<body>
<div id="scroll">
    <main id="pagina" class="page pagina">
		<?php /*var_dump($generar); */ ?>
        <table>
            <tbody>
            <tr>
                <td class="td-noborder">
                    <img width="256" height="71" src="<?=URL::to("public/img/logo.png")?>" alt="">
                </td>
                <td class="td-noborder td-hcenter td-vcenter">
                    <div class="items-center">
                        <h2 style="max-width: 90%;">INFORME TÉCNICO DE SERVICIO CAMPO</h2>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <!---->
        <!---->
        <!---->
        <div class="separe"></div>
        <table>
            <tbody>
            <tr>
                <td style="width:245pt;">
                    <p>
                        Cliente: MUNICIPALIDAD DISTRITAL DE QUITO ARMA
                    </p>
                </td>
                <td style="width:126pt;">
                    <p>
                        Código Cliente: <?=$orden->idcliente?>
                    </p>
                </td>
                <td style="width:106pt;">
                    <p>
                        Tipo Orden: <?=$orden->ot_tipo?>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width:245pt;">
                    <p>
                        Lugar:
                    </p>
                    <p>
						<?=$orden->lugar?>
                    </p>
                </td>
                <td style="width:126pt;">
                    <p>
                        Nº OT:
                    </p>
                    <p>
						<?=$orden->num_orden?>
                    </p>
                </td>
                <td style="width:106pt;">
                    <p>
                        Factura:
                    </p>
                    <p>
						<?=$orden->num_factura?>
                    </p>
                </td>
            </tr>
            </tbody>
        </table>
        <!---->
        <!---->
        <!---->
        <div class="separe"></div>
        <table>
            <tbody>
            <tr>
                <td style="width:37pt;">
                    <p>Marca:</p>
                </td>
                <td style="width:208pt;">
                    <p>
						<?=$orden->marca?>
                    </p>
                </td>
                <td style="width:60pt;">
                    <p>Serie Maquina:</p>
                </td>
                <td style="width:172pt;">
                    <p>
						<?=$orden->serie_aquina?>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width:37pt;">
                    <p>Equipo:</p>
                </td>
                <td style="width:208pt;">
                    <p>
						<?=$orden->equipo?>
                    </p>
                </td>
                <td style="width:60pt;">
                    <p>Serie Motor:</p>
                </td>
                <td style="width:172pt;">
                    <p>
						<?=$orden->serie_motor?>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width:37pt;">
                    <p>Modelo:</p>
                </td>
                <td style="width:208pt;">
                    <p>
						<?=$orden->modelo?>
                    </p>
                </td>
                <td style="width:60pt;">
                    <p>Horómetro:</p>
                </td>
                <td style="width:172pt;">
                    <p>
						<?=$orden->horometro?>
                    </p>
                </td>
            </tr>
            </tbody>
        </table>
        <!---->
        <!---->
        <!---->
        <div class="separe"></div>
        <table>
            <tbody>
            <tr>
                <td style="width:97pt;">
                    <p>DATOS DE CONACTO:</p>
                </td>
                <td style="width:380pt;">
                    <p>

                    </p>
                </td>
            </tr>
            </tbody>
        </table>
        <!---->
        <!---->
        <!---->
        <div class="separe"></div>
        <table>
            <tbody>
            <tr>
                <td style="width:477pt;"
                    colspan="8">
                    <p>
                        DESCRIPCION DE LOS TRABAJOS A REALIZAR:
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width:63pt;">
                    <p>
                        OPERADOR</p>
                </td>
                <td style="width:34pt;">
                    <p>
                        OP.</p>
                </td>
                <td style="width:169pt;">
                    <p>
                        DESCRIPCION
                        DE
                        LA OPERACIÓN</p>
                </td>
                <td style="width:42pt;">
                    <p>
                        HORAS</p>
                    <p>
                        PLAN</p>
                </td>
                <td style="width:42pt;">
                    <p>
                        FECHA</p>
                    <p>
                        INICIO</p>
                </td>
                <td style="width:42pt;">
                    <p>
                        FECHA</p>
                    <p>
                        FIN</p>
                </td>
                <td style="width:43pt;">
                    <p>
                        HORA</p>
                    <p>
                        INICIO</p>
                </td>
                <td style="width:42pt;">
                    <p>
                        HORA</p>
                    <p>
                        FIN</p>
                </td>
            </tr>
            <tr>
                <td style="width:63pt;">
                    <p>

                    </p>
                </td>
                <td style="width:34pt;">
                    <p>

                    </p>
                </td>
                <td style="width:169pt;">
                    <p>

                    </p>
                </td>
                <td style="width:42pt;">
                    <p>

                    </p>
                </td>
                <td style="width:42pt;">
                    <p>

                    </p>
                </td>
                <td style="width:42pt;">
                    <p>

                    </p>
                </td>
                <td style="width:43pt;">
                    <p>

                    </p>
                </td>
                <td style="width:42pt;">
                    <p>

                    </p>
                </td>
            </tr>
            <tr>
                <td style="width:63pt;">
                    <p>

                    </p>
                </td>
                <td style="width:34pt;">
                    <p>

                    </p>
                </td>
                <td style="width:169pt;">
                    <p>

                    </p>
                </td>
                <td style="width:42pt;">
                    <p>

                    </p>
                </td>
                <td style="width:42pt;">
                    <p>

                    </p>
                </td>
                <td style="width:42pt;">
                    <p>

                    </p>
                </td>
                <td style="width:43pt;">
                    <p>

                    </p>
                </td>
                <td style="width:42pt;">
                    <p>

                    </p>
                </td>
            </tr>
            <tr>
                <td style="width:63pt;">
                    <p>

                    </p>
                </td>
                <td style="width:34pt;">
                    <p>

                    </p>
                </td>
                <td style="width:169pt;">
                    <p>

                    </p>
                </td>
                <td style="width:42pt;">
                    <p>

                    </p>
                </td>
                <td style="width:42pt;">
                    <p>

                    </p>
                </td>
                <td style="width:42pt;">
                    <p>

                    </p>
                </td>
                <td style="width:43pt;">
                    <p>

                    </p>
                </td>
                <td style="width:42pt;">
                    <p>

                    </p>
                </td>
            </tr>
            <tr>
                <td style="width:63pt;">
                    <p>

                    </p>
                </td>
                <td style="width:34pt;">
                    <p>

                    </p>
                </td>
                <td style="width:169pt;">
                    <p>

                    </p>
                </td>
                <td style="width:42pt;">
                    <p>

                    </p>
                </td>
                <td style="width:42pt;">
                    <p>

                    </p>
                </td>
                <td style="width:42pt;">
                    <p>

                    </p>
                </td>
                <td style="width:43pt;">
                    <p>

                    </p>
                </td>
                <td style="width:42pt;">
                    <p>

                    </p>
                </td>
            </tr>
            <tr>
                <td style="width:63pt;">
                    <p>

                    </p>
                </td>
                <td style="width:34pt;">
                    <p>

                    </p>
                </td>
                <td style="width:169pt;">
                    <p>

                    </p>
                </td>
                <td style="width:42pt;">
                    <p>

                    </p>
                </td>
                <td style="width:42pt;">
                    <p>

                    </p>
                </td>
                <td style="width:42pt;">
                    <p>

                    </p>
                </td>
                <td style="width:43pt;">
                    <p>

                    </p>
                </td>
                <td style="width:42pt;">
                    <p>

                    </p>
                </td>
            </tr>
            </tbody>
        </table>
        <!---->
        <!---->
        <!---->
        <div class="separe"></div>
        <table>
            <tbody>
            <tr>
                <td style="width:477pt;">
                    <p>PROCESO DE SERVICIO</p>
                </td>
            </tr>
            <tr>
                <td style="width:477pt;">
                    <p><br></p>
                </td>
            </tr>
            <tr>
                <td style="width:477pt;">
                    <p><br></p>
                </td>
            </tr>
            <tr>
                <td style="width:477pt;">
                    <p><br></p>
                </td>
            </tr>
            <tr>
                <td style="width:477pt;">
                    <p><br></p>
                </td>
            </tr>
            <tr>
                <td style="width:477pt;">
                    <p><br></p>
                </td>
            </tr>
            <tr>
                <td style="width:477pt;">
                    <p><br></p>
                </td>
            </tr>
            </tbody>
        </table>
        <!---->
        <!---->
        <!---->
        <div class="separe"></div>
        <table>
            <tbody>
            <tr>
                <td style="width:477pt;">
                    <p>SINTOMA DE FALLA:</p>
                </td>
            </tr>
            <tr>
                <td style="width:477pt;">
                    <p><br></p>
                </td>
            </tr>
            <tr>
                <td style="width:477pt;">
                    <p><br></p>
                </td>
            </tr>
            <tr>
                <td style="width:477pt;">
                    <p><br></p>
                </td>
            </tr>
            </tbody>
        </table>
        <!---->
        <!---->
        <!---->
        <div class="separe"></div>
        <table>
            <tbody>
            <tr>
                <td style="width:477pt;">
                    <p>CAUSA DE FALLA:</p>
                </td>
            </tr>
            <tr>
                <td style="width:477pt;">
                    <p><br></p>
                </td>
            </tr>
            <tr>
                <td style="width:477pt;">
                    <p><br></p>
                </td>
            </tr>
            <tr>
                <td style="width:477pt;">
                    <p><br></p>
                </td>
            </tr>
            </tbody>
        </table>
        <!---->
        <!---->
        <!---->
        <div class="separe"></div>
        <table>
            <tbody>
            <tr>
                <td style="width:477pt;">
                    <p>SOLUCION:</p>
                </td>
            </tr>
            <tr>
                <td style="width:477pt;">
                    <p><br></p>
                </td>
            </tr>
            <tr>
                <td style="width:477pt;">
                    <p><br></p>
                </td>
            </tr>
            <tr>
                <td style="width:477pt;">
                    <p><br></p>
                </td>
            </tr>
            <tr>
                <td style="width:477pt;">
                    <p><br></p>
                </td>
            </tr>
            </tbody>
        </table>
        <!---->
        <!---->
        <!---->
        <div class="separe"></div>
        <table>
            <tbody>
            <tr>
                <td style="width:477pt;">
                    <p>SITUACIÓN GENERAL:</p>
                </td>
            </tr>
            <tr>
                <td style="width:477pt;">
                    <p><br></p>
                </td>
            </tr>
            <tr>
                <td style="width:477pt;">
                    <p><br></p>
                </td>
            </tr>
            <tr>
                <td style="width:477pt;">
                    <p><br></p>
                </td>
            </tr>
            </tbody>
        </table>
        <!---->
        <!---->
        <!---->
        <div class="separe"></div>
        <table>
            <tbody>
            <tr>
                <td style="width:477pt;">
                    <p>HERRAMIENTAS ESPECIALES
                        :</p>
                </td>
            </tr>
            </tbody>
        </table>
        <!---->
        <!---->
        <!---->
        <div class="separe"></div>
        <table>
            <tbody>
            <tr>
                <td style="width:63pt;">
                    <p>CODIGO</p>
                </td>
                <td style="width:118pt;">
                    <p>DESCRIPCIÓN</p>
                </td>
                <td style="width:64pt;">
                    <p>CANT PLAN</p>
                </td>
                <td style="width:63pt;">
                    <p>
                        UM</p>
                </td>
                <td style="width:63pt;">
                    <p>CANT REAL</p>
                </td>
                <td style="width:106pt;">
                    <p>OBSERVACIÓN</p>
                </td>
            </tr>
            <tr>
                <td style="width:63pt;">
                    <p><br></p>
                </td>
                <td style="width:118pt;">
                    <p><br></p>
                </td>
                <td style="width:64pt;">
                    <p><br></p>
                </td>
                <td style="width:63pt;">
                    <p><br></p>
                </td>
                <td style="width:63pt;">
                    <p><br></p>
                </td>
                <td style="width:106pt;">
                    <p><br></p>
                </td>
            </tr>
            <tr>
                <td style="width:63pt;">
                    <p><br></p>
                </td>
                <td style="width:118pt;">
                    <p><br></p>
                </td>
                <td style="width:64pt;">
                    <p><br></p>
                </td>
                <td style="width:63pt;">
                    <p><br></p>
                </td>
                <td style="width:63pt;">
                    <p><br></p>
                </td>
                <td style="width:106pt;">
                    <p><br></p>
                </td>
            </tr>
            <tr>
                <td style="width:63pt;">
                    <p><br></p>
                </td>
                <td style="width:118pt;">
                    <p><br></p>
                </td>
                <td style="width:64pt;">
                    <p><br></p>
                </td>
                <td style="width:63pt;">
                    <p><br></p>
                </td>
                <td style="width:63pt;">
                    <p><br></p>
                </td>
                <td style="width:106pt;">
                    <p><br></p>
                </td>
            </tr>
            </tbody>
        </table>
        <!---->
        <!---->
        <!---->
        <div class="separe"></div>
        <br>
        <br>
        <br>
        <br>
        <table id="table-firma">
            <tbody>
            <tr>
                <td style="width:55.6pt;">
                    <p>

                    </p>
                </td>
                <td style="width:140pt;border-top: 1px solid black">
                    <div class="text-center">
                        <p>TECNICO</p>
                        <p>(Nombre y firma)</p>
                    </div>
                </td>
                <td style="width:55.6pt;">
                    <p>

                    </p>
                </td>
                <td style="width:140pt;border-top: 1px solid black">
                    <div class="text-center">
                        <p>RESPONSABLE CLIENTE</p>
                        <p>(Nombre y firma)</p>
                    </div>
                </td>
                <td style="width:55.6pt;">
                    <p>

                    </p>
                </td>
            </tr>
            </tbody>
        </table>
        <!---->
        <!---->
        <!---->
        <p></p>
    </main>
</div>

</body>
</html>