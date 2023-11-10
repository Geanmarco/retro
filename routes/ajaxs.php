<?php


	Route::post('/ajs/generar/txt/ventareporte', "GeneradoresController@generarTextLibroVentas")->Middleware([ValidarTokenMiddleware::class]);

	Route::get('/ajs/ventas', "VentasController@listarVentas")->Middleware([ValidarTokenMiddleware::class]);
	Route::post('/ajs/ventas/add', "VentasController@guardarVentas")->Middleware([ValidarTokenMiddleware::class]);
	Route::post('/ajs/ingreso/almacen/add', "VentasController@ingresoAlmacen")->Middleware([ValidarTokenMiddleware::class]);
	Route::post('/ajs/egreso/almacen/add', "VentasController@egresoAlmacen")->Middleware([ValidarTokenMiddleware::class]);
	Route::post('/ajs/ventas/servicios/edit', "VentasController@editVentaServicio")->Middleware([ValidarTokenMiddleware::class]);
	Route::post('/ajs/ventas/productos/edit', "VentasController@editVentaProducto")->Middleware([ValidarTokenMiddleware::class]);
	Route::get('/ajs/cargar/productos/:id', "ConsultasController@buscarProducto")->Middleware([ValidarTokenMiddleware::class]);
	Route::get('/ajs/cargar/productos', "ConsultasController@buscarProductoCoti")->Middleware([ValidarTokenMiddleware::class]);


	/* Route::post('/ajs/cargar/productos/precios',"ConsultasController@cargarPreciosProd")->Middleware([ValidarTokenMiddleware::class]); */

	Route::post('/ajs/cargar/venta/servicios', "ConsultasController@cargarVentaServicios")->Middleware([ValidarTokenMiddleware::class]);
	Route::post('/ajs/cargar/venta/productos', "ConsultasController@cargarVentaProductos")->Middleware([ValidarTokenMiddleware::class]);
	Route::post('/ajs/cargar/venta/info', "ConsultasController@cargarVentaDetalles")->Middleware([ValidarTokenMiddleware::class]);

	Route::post('/login', "UsuarioController@login")->Middleware([ValidarTokenMiddleware::class]);
	Route::post("/ajs/consulta/sn", "ConsultasController@buscarSNdoc")->Middleware([ValidarTokenMiddleware::class]);
	Route::post("/ajs/consulta/ruc", "ConsultasController@consultaRuc")->Middleware([ValidarTokenMiddleware::class]);
	Route::post("/ajs/venta/detalle", "VentasController@detalleVenta")->Middleware([ValidarTokenMiddleware::class]);
	Route::post("/ajs/venta/consultas/tipo/venta", "VentasController@tipoVenta")->Middleware([ValidarTokenMiddleware::class]);
	Route::post("/ajs/venta/anular", "VentasController@anularVenta")->Middleware([ValidarTokenMiddleware::class]);
	Route::post("/ajs/consulta/lista/provincias", "ConsultasController@listarProvincias")->Middleware([ValidarTokenMiddleware::class]);
	Route::post("/ajs/consulta/lista/distrito", "ConsultasController@listarDistri")->Middleware([ValidarTokenMiddleware::class]);
	Route::post("/ajs/consulta/guia/documentofb", "ConsultasController@consultvfb")->Middleware([ValidarTokenMiddleware::class]);


	Route::post("/ajs/guia/remision/coti/:id", "ConsultasController@consultarGuiaXCoti")->Middleware([ValidarTokenMiddleware::class]);
	Route::post("/ajs/guia/remision/coti/cliente/:id", "ConsultasController@consultarGuiaXCotiCliente")->Middleware([ValidarTokenMiddleware::class]);

	Route::post('/ajs/guia/remision/add', "GuiaRemisionController@insertar")->Middleware([ValidarTokenMiddleware::class]);
	Route::post('/ajs/guia/remision/add2', "GuiaRemisionController@insertar2")->Middleware([ValidarTokenMiddleware::class]);

//CRUD AJAX PARA CLIENTES
	Route::post("/ajs/clientes/add", "ClientesController@insertar")->Middleware([ValidarTokenMiddleware::class]);
	Route::post("/ajs/clientes/add/por/lista", "ClientesController@insertarXLista")->Middleware([ValidarTokenMiddleware::class]);
	Route::post("/ajs/clientes/render", "ClientesController@render")->Middleware([ValidarTokenMiddleware::class]);
	Route::post("/ajs/clientes/getOne", "ClientesController@getOne")->Middleware([ValidarTokenMiddleware::class]);
	Route::post("/ajs/clientes/editar", "ClientesController@editar")->Middleware([ValidarTokenMiddleware::class]);
	Route::post("/ajs/clientes/borrar", "ClientesController@borrar")->Middleware([ValidarTokenMiddleware::class]);
	/* Route::post("/ajs/clientes/importAdd","ClientesController@importAdd"); */


	Route::post('/ajs/consulta/doc/cliente', "ConsultasController@buscarDocInfo")->Middleware([ValidarTokenMiddleware::class]);

	Route::get('/ajs/consulta/buscar/dtatranspor', "ConsultasController@buscarTransporteGui")->Middleware([ValidarTokenMiddleware::class]);
	Route::post('/ajs/consulta/add/dtatranspor', "ConsultasController@agregarTransportista")->Middleware([ValidarTokenMiddleware::class]);
	Route::post('/ajs/consulta/prod/coti', "ConsultasController@buscarProdId")->Middleware([ValidarTokenMiddleware::class]);

	Route::get('/ajs/buscar/cliente/datos', "ConsultasController@buscarDataCliente")->Middleware([ValidarTokenMiddleware::class]);

//importal excel
	Route::post("/ajs/clientes/add/exel", "ClientesController@importarExcel")->Middleware([ValidarTokenMiddleware::class]);
	Route::post("/ajs/cuentas/cobrar", "ClientesController@cuentasCobrar")->Middleware([ValidarTokenMiddleware::class]);
	Route::post("/ajs/cuentas/cobrar/estado", "ClientesController@cuentasCobrarEstado")->Middleware([ValidarTokenMiddleware::class]);


	Route::post("/ajs/ingresos/egresos/render", "VentasController@ingresosEgresosRender")->Middleware([ValidarTokenMiddleware::class]);


	Route::get("/ajs/server/sider/productos", "ProductosController@listaProductoServerSide");


	Route::post("/ajs/orden/save", "OrdenTrabajoController@save")->Middleware([ValidarTokenMiddleware::class]);
	Route::post("/ajs/orden/update", "OrdenTrabajoController@update")->Middleware([ValidarTokenMiddleware::class]);
	Route::post("/ajs/orden/delete/:id", "OrdenTrabajoController@delete")->Middleware([ValidarTokenMiddleware::class]);
	Route::post("/ajs/orden/get/:id", "OrdenTrabajoController@get")->Middleware([ValidarTokenMiddleware::class]);
	Route::post("/ajs/orden/lista", "OrdenTrabajoController@lista")->Middleware([ValidarTokenMiddleware::class]);
