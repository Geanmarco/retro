<?php
$empresa = $_SESSION['id_empresa'];

$anio1 = date("Y");
$mes1 = date("m");
$anio2='';
$mes2='';
if ($mes1==1){
    $mes2='12';
    $anio2=$anio1-1;
}else{
    $anio2=$anio1;
    $mes2=$mes1-1;
}

$conexion = (new Conexion())->getConexion();
$sql="SELECT (SELECT SUM(total) FROM ventas WHERE id_empresa='$empresa' AND estado = '1' and sucursal='{$_SESSION['sucursal']}' AND YEAR(fecha_emision)='$anio1' AND MONTH(fecha_emision)='$mes1') totalv ,
(SELECT COUNT(*)  FROM  clientes WHERE id_empresa = '$empresa') cnt_cli,
(SELECT SUM(total) FROM ventas WHERE id_empresa='$empresa'  and sucursal='{$_SESSION['sucursal']}' and id_tido =2 AND estado = '1' AND YEAR(fecha_emision)='$anio1' AND MONTH(fecha_emision)='$mes1') totalvF ,
(SELECT SUM(total) FROM ventas WHERE id_empresa='$empresa' and sucursal='{$_SESSION['sucursal']}' and id_tido =1 AND estado = '1' AND YEAR(fecha_emision)='$anio1' AND MONTH(fecha_emision)='$mes1') totalvB,
 (SELECT SUM(total) FROM ventas WHERE id_empresa='$empresa' and sucursal='{$_SESSION['sucursal']}' AND estado = '1' AND YEAR(fecha_emision)='$anio2' AND MONTH(fecha_emision)='$mes2') totalvMA       
       ";

//echo $sql;

$data = $conexion->query($sql)->fetch_assoc();

$dataListVen=[0,0,0,0,0,0,0,0,0,0,0,0];

$sql="SELECT 
    MONTH(fecha_emision) mes,
    SUM(total ) total
  FROM
    ventas 
  WHERE id_empresa = '$empresa' 
    AND estado = '1' 
    and sucursal='{$_SESSION['sucursal']}'
    AND YEAR(fecha_emision) = '$anio1'
    GROUP BY mes";
$resultList = $conexion->query($sql);

foreach ($resultList as $dtTemp){
    $tempValue=0;
    if (doubleval($dtTemp['total'])>0){
        $tempValue=doubleval($dtTemp['total']);
    }
    $dataListVen[intval($dtTemp['mes'])]=$tempValue;
}


?>
<!-- start page title -->
<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h6 class="page-title">Dashboard</h6>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item active">Bienvenido al Sistema de Facturación Hatuna <strong>RETROTRAC</strong></li>
            </ol>
        </div>
        <div class="col-md-4">

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">
                        <img src="<?=URL::to('public/assets/images/services-icon/01.png')?>" alt="">
                    </div>
                    <h5 class="font-size-16 text-uppercase text-white-50">Monto Vendido</h5>
                    <h4 class="fw-medium font-size-24">S/ <?=number_format($data["totalv"],2,".",",")?>  </h4>
                    <div class="mini-stat-label bg-success">
                        <p class="mb-0">Mes</p>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="javascript:void(0)" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                    </div>

                    <p class="text-white-50 mb-0 mt-1">Facturas y Boletas</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">
                        <img src="<?=URL::to('public/assets/images/services-icon/02.png')?>" alt="">
                    </div>
                    <h5 class="font-size-16 text-uppercase text-white-50">Cantidad de Clientes</h5>
                    <h4 class="fw-medium font-size-24"><?=$data["cnt_cli"]?>  </h4>
                    <div hidden class="mini-stat-label bg-danger">
                        <p class="mb-0">Total</p>
                    </div>
                </div>
                <div class="pt-2">
                    <div hidden class="float-end">
                        <a href="javascript:void(0)" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                    </div>

                    <p class="text-white-50 mb-0 mt-1">Total</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">
                        <img src="<?=URL::to('public/assets/images/services-icon/03.png')?>" alt="">
                    </div>
                    <h5 class="font-size-16 text-uppercase text-white-50">Total en Facturas</h5>
                    <h4 class="fw-medium font-size-24">S/ <?=number_format($data["totalvF"],2,".",",")?>  </h4>
                    <div class="mini-stat-label bg-info">
                        <p class="mb-0"> Mes</p>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="javascript:void(0)" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                    </div>

                    <p class="text-white-50 mb-0 mt-1"> </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">
                        <img src="<?=URL::to('public/assets/images/services-icon/04.png')?>" alt="">
                    </div>
                    <h5 class="font-size-16 text-uppercase text-white-50">Total en Boletas</h5>
                    <h4 class="fw-medium font-size-24">S/ <?=number_format($data["totalvB"],2,".",",")?>  </h4>
                    <div class="mini-stat-label bg-warning">
                        <p class="mb-0">Mes</p>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="javascript:void(0)" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                    </div>

                    <p class="text-white-50 mb-0 mt-1"> </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Venta Anual</h4>
                <div class="row">
                    <div class="col-lg-7">
                        <div>
                            <canvas id="chart-with-area" >
                            </canvas>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-center">
                                    <p class="text-muted mb-4">Este Mes</p>
                                    <h3>S/ <?=number_format($data["totalv"],2,".",",")?></h3>
                                    <p class="text-muted mb-5">Ganancias Totales.</p>
                                    <span class="peity-donut"
                                          data-peity='{ "fill": ["#02a499", "#f2f2f2"], "innerRadius": 28, "radius": 32 }'
                                          data-width="72" data-height="72"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-center">
                                    <p class="text-muted mb-4">Mes Anterior</p>
                                    <h3>S/ <?=number_format($data["totalvMA"],2,".",",")?></h3>
                                    <p class="text-muted mb-5">Comparativa Ganancias Totales.</p>
                                    <span class="peity-donut"
                                          data-peity='{ "fill": ["#02a499", "#f2f2f2"], "innerRadius": 28, "radius": 32 }'
                                          data-width="72" data-height="72"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end card -->
    </div>

</div>
<!-- end row -->

<textarea style="display: none" id="listatempdata"><?=json_encode($dataListVen)?></textarea>

<script>
    $(document).ready(function (){
        new Chart("chart-with-area", {
            type: "line",
            data: {
                labels: getMesAbreLinst("es"),
                datasets: [
                    {
                        label: 'Ventas',
                        data: JSON.parse($("#listatempdata").val()),
                        borderColor: "#626ed4",
                        backgroundColor:"rgba(98,110,212,0.36)",
                        fill: true

                    }
                ]
            },

        });
    })
</script>
