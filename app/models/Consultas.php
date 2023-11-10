<?php

class Consultas
{
    private $conectar;

    private $ultimoId;

    public function __construct()
    {
        $this->conectar = (new Conexion())->getConexion();
    }

    /**
     * @return mixed
     */
    public function getUltimoId()
    {
        return $this->ultimoId;
    }

    /**
     * @param mixed $ultimoId
     */
    public function setUltimoId($ultimoId): void
    {
        $this->ultimoId = $ultimoId;
    }

    /**
     * @return mysqli
     */
    public function getConectar(): mysqli
    {
        return $this->conectar;
    }
    public function exeSQLInsert($sql)
    {
        $result = $this->conectar->query($sql);
        if ($result) {
            $this->ultimoId = $this->conectar->insert_id;
        }
        return $result;
    }
    public function exeSQL($sql)
    {
        return $this->conectar->query($sql);
    }
    public function buscarProveedor($termino, $empres)
    {
        $sql = "select * from proveedores 
        where  (proveedores.razon_social like '%$termino%' or proveedores.ruc like '%$termino%') 
        order by razon_social asc";
        return $this->conectar->query($sql);
    }
    public function buscarClientes($termino, $empres)
    {
        $sql = "select * from clientes 
        where id_empresa = '$empres' and (datos like '%$termino%' or documento like '%$termino%') 
        order by datos asc";
        return $this->conectar->query($sql);
    }

    function buscarProductoCoti($id_empresa, $term)
    {
        $sql = "select * from productos 
        where id_empresa = '$id_empresa' and (descripcion like '%$term%' OR codigo like '%$term%') and sucursal='{$_SESSION['sucursal']}' and estado='1'
        order by descripcion asc";
        return $this->conectar->query($sql);
    }
    function buscarProducto($id_empresa, $term, $alma)
    {
        $sql = "SELECT * from productos 
        where id_empresa = '12' 
          and (descripcion like '%$term%' OR codigo like '%$term%') and sucursal='{$_SESSION['sucursal']}' 
          AND almacen = '1' and estado='1' order by descripcion asc limit 500";
        //echo $sql;

        return $this->conectar->query($sql);
    }
    function buscarSNdoc($empresa, $doc)
    {
        $sql = "select * from documentos_empresas where id_empresa='$empresa' and id_tido='$doc' and sucursal='{$_SESSION['sucursal']}'";
        $resp = $this->conectar->query($sql);
        $result = ["serie" => "", "numero" => "",];
        if ($row = $resp->fetch_assoc()) {
            $result["serie"] = $row["serie"];
            $result["numero"] = $row["numero"];
        }
        return $result;
    }
}
