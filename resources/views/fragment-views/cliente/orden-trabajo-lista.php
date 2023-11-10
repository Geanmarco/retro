<?php setlocale(LC_TIME, 'es_ES'); ?>

<table id="tabla_clientes"
       class="table table-bordered dt-responsive">
    <thead>
    <tr>
        <th>Item</th>
        <th>N° Factura</th>
        <th>Tipo O. T.</th>
        <th>Nº O. T.</th>
        <th>Cliente</th>
        <th>N° Documento</th>
        <th>fecha</th>
        <th>Lugar</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
	<?php foreach ($ordenes as $index => $m): ?>
        <tr>
            <td><?=($index + 1)?></td>
            <td><?=$m->num_factura?></td>
            <td><?=$m->ot_tipo?></td>
            <td><?=$m->num_orden?></td>
            <td><?=$m->cliente?></td>
            <td><?=$m->numdocumento?></td>
            <td><?=strftime("%e de %B, %Y %H:%M", strtotime($m->fecha))?></td>
            <td><?=$m->lugar?></td>
            <td>
                <div class="text-center">
                    <div class="btn-group btn-sm">
                        <a data-bs-toggle="modal" data-bs-target="#editarModal"
                           class="btn btn-sm btn-warning btnEditar" data-id="<?=$m->id?>"
                           style="margin-left: 5px">
                            <i class="fa fa-edit"></i>
                        </a>

                        <a href="<?=DOMINIO?>/orden-trabajo/exportar/<?=$m->id?>" target="_blank"
                           style="margin-left: 5px"
                           class="btn btn-sm btn-info">
                            <i class="fas fa-file-pdf"></i>
                        </a>

                        <a class="btn btn-sm  btn-danger btnBorrar"  data-id="<?=$m->id?>"
                           style="margin-left: 5px">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>
                </div>
            </td>
        </tr>
	<?php endforeach; ?>
    </tbody>
</table>
