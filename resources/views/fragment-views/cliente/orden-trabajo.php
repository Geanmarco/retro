<?php

	require_once "app/models/Cliente.php";

	$c_cliente = new Cliente();
	$c_cliente->setIdEmpresa($_SESSION['id_empresa']);

?>
<div class="page-title-box" style="padding: 12px 0;">
    <div class="row align-items-center">
        <div class="col-md-12">
            <h6 class="page-title text-center">ORDEN DE TRABAJO</h6>

        </div>

    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#agregarModal"
                                class="btn btn-primary"><i class="fa fa-plus"></i> Agregar
                        </button>
                        <!--   <button type="button" data-bs-toggle="modal" data-bs-target="#editarModal" class="btn btn-warning">Editar</button> -->
                    </div>

                    <!--<div class="col-md-6 text-end">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#importarModal"
                                class="btn btn-success"><i class="fa fa-file-excel"></i> Importar
                        </button>
                    </div>-->
                </div>
            </div>
            <div id="conte-vue-modals">
                <div class="card-body">
                    <!-- MODAL DE AGREGAR CLIENTE -->
                    <div class="modal fade" id="agregarModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <form class="modal-content" id="frmClientesAgregar" v-on:submit.prevent>
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Nuevo informe tecnico</h5>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <div class="row">
                                            <div class="col-md-4 form-group mb-3">
                                                <div class="col-lg-12">
                                                    <div class="input-group">
                                                        <input id="input_datos_cliente" v-model="orden.num_doc"
                                                               v-bind:required="isRequired"
                                                               @keyup="buscarcliente" type="text"
                                                               placeholder="Ingrese Documento" class="form-control"
                                                               maxlength="11" :min="8" :max="11">
                                                        <div class="input-group-prepend">
                                                            <button @click="buscarclienteboton"
                                                                    class="btn btn-primary"
                                                                    type="button">
                                                                <i class="fa fa-search"></i>
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-8 form-group  mb-3">
                                                <div class="col-lg-12">
                                                    <input type="text" v-model="orden.nom_cli"
                                                           v-bind:required="isRequired" :min="5"
                                                           placeholder="Nombre del cliente"
                                                           class="form-control ui-autocomplete-input"
                                                           autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-12 form-group mb-3">
                                                <label class="control-label">Tipo de orden</label>
                                                <select v-model="orden.idorden" class="form-control" name="idorden"
                                                        v-bind:required="isRequired">
                                                    <option value="" disabled selected>Seleccione
                                                    </option>
													<?php foreach ($ordenes_tipo as $m): ?>
                                                        <option value="<?=$m->id?>"><?=$m->nombre?>
                                                        </option>
													<?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="col-lg-6 col-md-12 mb-3">
                                                <label for="N° factura">num_factura</label>
                                                <input v-model="orden.num_factura" type="text" class="form-control"
                                                       v-bind:required="isRequired"
                                                       placeholder="N° factura">
                                            </div>




                                            <div class="col-lg-12 col-md-12 mb-3">
                                                <label for="lugar">Lugar</label>
                                                <input v-model="orden.lugar" type="text" class="form-control"
                                                       v-bind:required="isRequired"
                                                       placeholder="Departamento">
                                            </div>


                                            <!--<div class="col-lg-4 col-md-12 mb-3">
                                                <label for="departamento">Departamento</label>
                                                <input v-model="orden.departamento" type="text" class="form-control"
                                                       v-bind:required="isRequired"
                                                       placeholder="Departamento">
                                            </div>
                                            <div class="col-lg-4 col-md-12 mb-3">
                                                <label for="provincia">Provincia</label>
                                                <input v-model="orden.provincia" type="text" class="form-control"
                                                       v-bind:required="isRequired"
                                                       placeholder="Provincia">
                                            </div>
                                            <div class="col-lg-4 col-md-12 mb-3">
                                                <label for="distrito">Distrito</label>
                                                <input v-model="orden.distrito" type="text" class="form-control"
                                                       v-bind:required="isRequired"
                                                       placeholder="Distrito">
                                            </div>-->


                                            <div class="col-lg-4 col-md-12 mb-3">
                                                <label for="departamento">Marca</label>
                                                <input v-model="orden.marca" type="text" class="form-control"
                                                       v-bind:required="isRequired"
                                                       placeholder="Marca">
                                            </div>
                                            <div class="col-lg-4 col-md-12 mb-3">
                                                <label for="equipo">Equipo</label>
                                                <input v-model="orden.equipo" type="text" class="form-control"
                                                       v-bind:required="isRequired"
                                                       placeholder="Equipo">
                                            </div>
                                            <div class="col-lg-4 col-md-12 mb-3">
                                                <label for="modelo">Modelo</label>
                                                <input v-model="orden.modelo" type="text" class="form-control"
                                                       v-bind:required="isRequired"
                                                       placeholder="Modelo">
                                            </div>
                                            <div class="col-lg-4 col-md-12 mb-3">
                                                <label for="serie_aquina">Serie Maquina</label>
                                                <input v-model="orden.serie_aquina" type="text" class="form-control"
                                                       v-bind:required="isRequired"
                                                       placeholder="Serie Maquina">
                                            </div>
                                            <div class="col-lg-4 col-md-12 mb-3">
                                                <label for="serie_motor">Serie Motor</label>
                                                <input v-model="orden.serie_motor" type="text" class="form-control"
                                                       v-bind:required="isRequired"
                                                       placeholder="Serie Motor">
                                            </div>
                                            <div class="col-lg-4 col-md-12 mb-3">
                                                <label for="horometro">Horómetro</label>
                                                <input v-model="orden.horometro" type="text" class="form-control"
                                                       v-bind:required="isRequired"
                                                       placeholder="Horómetro">
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger cerrar" data-bs-dismiss="modal">Cerrar
                                    </button>
                                    <button type="submit" class="btn btn-primary" @click="guardar">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- EDITAR MODAL -->
                    <div class="modal fade" id="editarModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <form class="modal-content" id="clientesEditar" v-on:submit.prevent>>
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Editar Orden de Trabajo</h5>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <div class="row">
                                            <div class="col-md-4 form-group mb-3">
                                                <div class="col-lg-12">
                                                    <div class="input-group">
                                                        <input id="input_datos_cliente2" v-model="orden_edt.num_doc"
                                                               v-bind:required="isRequired"
                                                               @keyup="buscarcliente" type="text"
                                                               placeholder="Ingrese Documento" class="form-control"
                                                               maxlength="11" :min="8" :max="11">
                                                        <div class="input-group-prepend">
                                                            <button @click="buscarclienteboton"
                                                                    class="btn btn-primary"
                                                                    type="button">
                                                                <i class="fa fa-search"></i>
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-8 form-group  mb-3">
                                                <div class="col-lg-12">
                                                    <input type="text" v-model="orden_edt.nom_cli"
                                                           v-bind:required="isRequired" :min="5"
                                                           placeholder="Nombre del cliente"
                                                           class="form-control ui-autocomplete-input"
                                                           autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-12 form-group mb-3">
                                                <label class="control-label">Tipo de orden</label>
                                                <select v-model="orden_edt.idorden" class="form-control" name="idorden"
                                                        v-bind:required="isRequired">
                                                    <option value="" disabled selected>Seleccione
                                                    </option>
													<?php foreach ($ordenes_tipo as $m): ?>
                                                        <option value="<?=$m->id?>"><?=$m->nombre?>
                                                        </option>
													<?php endforeach; ?>
                                                </select>
                                            </div>



                                            <div class="col-lg-6 col-md-12 mb-3">
                                                <label for="N° factura">num_factura</label>
                                                <input v-model="orden_edt.num_factura" type="text" class="form-control"
                                                       v-bind:required="isRequired"
                                                       placeholder="N° factura">
                                            </div>



                                            <div class="col-lg-12 col-md-12 mb-3">
                                                <label for="lugar">Lugar</label>
                                                <input v-model="orden_edt.lugar" type="text" class="form-control"
                                                       v-bind:required="isRequired"
                                                       placeholder="Departamento">
                                            </div>

                                            <!--<div class="col-lg-4 col-md-12 mb-3">
                                                <label for="departamento">Departamento</label>
                                                <input v-model="orden_edt.departamento" type="text" class="form-control"
                                                       v-bind:required="isRequired"
                                                       placeholder="Departamento">
                                            </div>
                                            <div class="col-lg-4 col-md-12 mb-3">
                                                <label for="provincia">Provincia</label>
                                                <input v-model="orden_edt.provincia" type="text" class="form-control"
                                                       v-bind:required="isRequired"
                                                       placeholder="Provincia">
                                            </div>
                                            <div class="col-lg-4 col-md-12 mb-3">
                                                <label for="distrito">Distrito</label>
                                                <input v-model="orden_edt.distrito" type="text" class="form-control"
                                                       v-bind:required="isRequired"
                                                       placeholder="Distrito">
                                            </div>-->


                                            <div class="col-lg-4 col-md-12 mb-3">
                                                <label for="departamento">Marca</label>
                                                <input v-model="orden_edt.marca" type="text" class="form-control"
                                                       v-bind:required="isRequired"
                                                       placeholder="Marca">
                                            </div>
                                            <div class="col-lg-4 col-md-12 mb-3">
                                                <label for="equipo">Equipo</label>
                                                <input v-model="orden_edt.equipo" type="text" class="form-control"
                                                       v-bind:required="isRequired"
                                                       placeholder="Equipo">
                                            </div>
                                            <div class="col-lg-4 col-md-12 mb-3">
                                                <label for="modelo">Modelo</label>
                                                <input v-model="orden_edt.modelo" type="text" class="form-control"
                                                       v-bind:required="isRequired"
                                                       placeholder="Modelo">
                                            </div>
                                            <div class="col-lg-4 col-md-12 mb-3">
                                                <label for="serie_aquina">Serie Maquina</label>
                                                <input v-model="orden_edt.serie_aquina" type="text" class="form-control"
                                                       v-bind:required="isRequired"
                                                       placeholder="Serie Maquina">
                                            </div>
                                            <div class="col-lg-4 col-md-12 mb-3">
                                                <label for="serie_motor">Serie Motor</label>
                                                <input v-model="orden_edt.serie_motor" type="text" class="form-control"
                                                       v-bind:required="isRequired"
                                                       placeholder="Serie Motor">
                                            </div>
                                            <div class="col-lg-4 col-md-12 mb-3">
                                                <label for="horometro">Horómetro</label>
                                                <input v-model="orden_edt.horometro" type="text" class="form-control"
                                                       v-bind:required="isRequired"
                                                       placeholder="Horómetro">
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger cerrar" data-bs-dismiss="modal">Cerrar
                                    </button>
                                    <button type="submit" class="btn btn-primary" @click="update">Guardar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!---->
                    <!---->
                    <!---->
                    <div class="card-title-desc">
                        <div class="table-responsive" id="table-ordenes">
                            <!---->
                            <!---->
                            <!---->

							<?php include('resources/views/fragment-views/cliente/orden-trabajo-lista.php'); ?>
                            <!---->
                            <!---->
                            <!---->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>

    $(document).ready(function () {
        const app = new Vue({
            el: " #conte-vue-modals",
            data: {
                orden: {
                    idcliente: 0,
                    dir_pos: 1,
                    nom_cli: '',
                    num_doc: '',
                    dir_cli: '',
                    idorden: '',
                    num_factura: '',

                    marca: '',
                    equipo: '',
                    modelo: '',
                    serie_aquina: '',
                    serie_motor: '',
                    horometro: '',


                    lugar: '',
                    departamento: '',
                    provincia: '',
                    distrito: '',
                },
                ordenresset: {
                    idcliente: 0,
                    dir_pos: 1,
                    nom_cli: '',
                    num_doc: '',
                    dir_cli: '',
                    idorden: '',
                    num_factura: '',

                    marca: '',
                    equipo: '',
                    modelo: '',
                    serie_aquina: '',
                    serie_motor: '',
                    horometro: '',


                    lugar: '',
                    departamento: '',
                    provincia: '',
                    distrito: '',
                },
                orden_edt: {
                    idcliente: 0,
                    dir_pos: 1,
                    nom_cli: '',
                    num_doc: '',
                    dir_cli: '',
                    idorden: '',
                    num_factura: '',

                    marca: '',
                    equipo: '',
                    modelo: '',
                    serie_aquina: '',
                    serie_motor: '',
                    horometro: '',


                    lugar: '',
                    departamento: '',
                    provincia: '',
                    distrito: '',
                },
                isRequired: true,
                miTemporizador: null
            },
            mounted() {
                $("#tabla_clientes").DataTable({
                    paging: true,
                    bFilter: true,
                    ordering: true,
                    searching: true,
                    destroy: true
                });
            },
            methods: {
                buscarclienteboton() {
                    var vue = this
                    if (this.orden.num_doc.length == 8 || this.orden.num_doc.length == 11) {
                        $("#loader-menor").show()
                        //this.venta.dir_pos = 1
                        _ajax("/ajs/consulta/doc/cliente", "POST", {
                                doc: vue.orden.num_doc
                            },
                            function (resp) {
                                $("#loader-menor").hide()
                                console.log(resp);
                                if (resp.res) {
                                    vue.orden.nom_cli = (resp.data.nombre ? resp.data.nombre : '') + (resp.data.razon_social ? resp.data.razon_social : '')
                                    if (typeof resp.data.direccion !== 'undefined') {
                                        vue.orden.lugar = resp.data.direccion.trim().length > 0 ? resp.data.direccion : '-'
                                    }

                                } else {
                                    alertAdvertencia("Documento no enocntrado")
                                }
                            }
                        )
                    } else {
                        alertAdvertencia("Documento, DNI es 8 digitos y RUC 11 digitos")
                    }
                },
                buscarcliente() {
                    var vue = this
                    clearTimeout(this.miTemporizador);
                    vue.miTemporizador = setTimeout(function () {
                        $("#input_datos_cliente").autocomplete({
                            source: _URL + "/ajs/buscar/cliente/datos",
                            minLength: 1,
                            select: function (event, ui) {
                                event.preventDefault();
                                vue.orden.idcliente = ui.item.codigo
                                vue.orden.dir_pos = 1
                                vue.orden.nom_cli = ui.item.datos
                                vue.orden.num_doc = ui.item.documento
                                vue.orden.dir_cli = ui.item.direccion
                            }
                        });
                    }, 500);
                },
                guardar() {
                    var vue = this
                    _ajax("/ajs/orden/save", "POST",
                        {orden: this.orden},
                        function (resp) {
                            if (resp.res) {
                                alertExito("guardado")
                                vue.reset('frmClientesAgregar');
                                vue.cargarTabla();
                            } else {
                                alertAdvertencia("No se pudo Guardar la orden")
                            }
                        });
                },
                update(id) {
                    var vue = this
                    _ajax("/ajs/orden/update", "POST",
                        {orden: this.orden_edt},
                        function (resp) {
                            if (resp.res) {
                                alertExito("guardado")
                                vue.reset('clientesEditar');
                                vue.cargarTabla();
                            } else {
                                alertAdvertencia("No se pudo Guardar la orden")
                            }
                        });
                },
                reset(dom) {
                    document.getElementById(dom).reset();
                    document.querySelector("#" + dom + " .cerrar").click();
                    this.orden = this.ordenresset;
                    this.orden_edt = this.orden_edt_resset;
                },
                cargarTabla() {
                    _ajaxDOM('/ajs/orden/lista', 'table-ordenes');
                }
            }
        })

        $(document).on('click', '.btnEditar', function () {
            var id = this.getAttribute('data-id');
            _ajax("/ajs/orden/get/" + id, "POST",
                {},
                function (resp) {
                    if (resp.res) {
                        console.log(resp.res);
                        resp.res.num_doc = resp.res.numdocumento;
                        resp.res.nom_cli = resp.res.cliente;
                        app.orden_edt_resset = app.orden_edt;
                        app.orden_edt = resp.res;
                    } else {
                        alertAdvertencia("No existe orden")
                    }
                });
        });

        $(document).on('click', '.btnBorrar', function () {
            var id = this.getAttribute('data-id');
            Swal.fire({
                title: 'Eliminar orden',
                text: "¿Esta seguro de eliminar esta orden?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    _ajax("/ajs/orden/delete/" + id, "POST",
                        {},
                        function (resp) {
                            if (resp.res) {
                                app.cargarTabla();
                                alertExito("Eliminado !!")
                            } else {
                                alertAdvertencia("No se pudo eliminar !!")
                            }
                        });
                }
            })
            _ajax("/ajs/orden/get/" + id, "POST",
                {},
                function (resp) {
                    if (resp.res) {
                        resp.res.num_doc = resp.res.numdocumento;
                        resp.res.nom_cli = resp.res.cliente;
                        app.orden_edt_resset = app.orden_edt;
                        app.orden_edt = resp.res;
                    } else {
                        alertAdvertencia("No existe orden")
                    }
                });
        });

        /* function editar(id) {

			 console.log(id)
			 console.log(id)
			 console.log(id)
			 var vue = this
			 _ajax("/ajs/orden/get/" + id, "POST",
				 {orden: this.orden},
				 function (resp) {
					 if (resp.res) {
						 resp.res.num_doc = resp.res.numdocumento;
						 resp.res.nom_cli = resp.res.cliente;
						 vue.orden_edt_resset = vue.orden_edt;
						 vue.orden_edt = resp.res;
						 console.log(vue.orden_edt)
					 } else {
						 alertAdvertencia("No existe orden")
					 }
				 });
		 }*/

    });

</script>
<style>
    .ui-widget-content {
        z-index: 11000;
    }
</style>