<?php

use LDAP\Result;

class contactos{
    public $conn;

    public function __construct(){
        $this->conn = new sql();
    }

    public function crear($id, $contacto, $puesto, $empresa, $tipo, $prioridad, $telefono, $correo, $nota, $foto ){
       $sql = "insert into contacto(id, contacto, puesto, empresa, tipo, prioridad, telefono, correo, nota, foto) values('" .$this->llave($id) ."','" .$contacto ."','" .$puesto ."','".$empresa ."','". $tipo ."','".$prioridad."','".$telefono ."','".$correo ."','".$nota ."','".$foto ."')";

       $result = $this->conn->select($sql);
    }

    public function llave($id){
        $line = $id.date("dmy").rand();
        return $line;
    }

    public function mostrar(){
        //echo 'y';
        $sql = "SELECT * FROM contacto";
        $result = $this->conn->select($sql);
        $tabla = '<table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Empresa</th>
                    <th>Contacto</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>';

        if ($result->num_rows >0) {
            while ($row = $result->fetch_assoc()) {
                $tabla .='<tr>
                    <td><img src="'. $row["foto"].'" class="foto" alt="logo"></td>
                    <td>'.$row["empresa"].'</td>
                    <td>'.$row["contacto"].'</td>
                    <td><button class="btn btn-primary" onclick="actualizar(\'' .$row["id"].'\')"><img src="images/lapiz.png" width="30px"></button></td>
                </tr>';
            }
        }
        $tabla .='</tbody>
        </table>';
        return $tabla;
    }

    public function mostrar2(){
        //echo 'y';
        $sql = "SELECT * FROM contacto";
        $result = $this->conn->select($sql);
        $tabla = '<table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Empresa</th>
                    <th>Contacto</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>';

        if ($result->num_rows >0) {
            while ($row = $result->fetch_assoc()) {
                $tabla .='<tr>
                    <td><img src="'. $row["foto"].'" class="foto" alt="logo"></td>
                    <td>'.$row["empresa"].'</td>
                    <td>'.$row["contacto"].'</td>
                    <td><button class="<btn btn-danger" onclick="eliminarItem(\'' .$row["id"].'\')"><img src="images/del2.png" width="30px"></button></td>
                </tr>';
            }
        }
        $tabla .='</tbody>
        </table>';
        return $tabla;
    }

    function modificarPlantilla($id){
        $sql = "SELECT * FROM contacto where id='" . $id . "'";
        $result = $this->conn->select($sql);

        $contacto = "";
        $puesto = "";
        $empresa = "";
        $tipo = "";
        $prioridad = "";
        $telefono = "";
        $correo = "";
        $nota = "";
        $foto = "";

        if ($result->num_rows >0) {
            while ($row = $result->fetch_assoc()) {
                $contacto = $row["contacto"];
                $puesto = $row["puesto"];
                $empresa = $row["empresa"];
                $tipo = $row["tipo"];
                $prioridad = $row["prioridad"];
                $telefono = $row["telefono"];
                $correo = $row["correo"];
                $nota = $row["nota"];
                $foto = $row["foto"];
            }
        }

        $aux = '<div class="col-12 col-sm-4">
        <div class="mb-3 mt-3">
           <label for="contacto" class="form-label">Contacto:</label>
           <input type="hidden" class="form-control" id="id" name="id" value="'.$id.'">
           <input type="text" class="form-control" id="contacto" name="contacto" value="'.$contacto.'">
        </div>
        <div class="mb-3 mt-3">
           <label for="puesto" class="form-label">Puesto:</label>
           <input type="text" class="form-control" id="puesto" name="puesto" value="'.$puesto.'">
        </div>
        <div class="mb-3 mt-3">
           <label for="empresa" class="form-label">Empresa:</label>
           <input type="text" class="form-control" id="empresa" name="empresa" value="'. $empresa.'">
        </div>
        <div class="mb-3 mt-3">
           <label for="tipo" class="form-label">Tipo:</label>
           <input type="text" class="form-control" id="tipo" name="tipo" value="'.$tipo.'">
        </div>
        <div class="mb-3 mt-3">
           <label for="prioridad" class="form-label">Prioridad:</label>
           <input type="text" class="form-control" id="prioridad" name="prioridad" value="'.$prioridad.'">
        </div>
        <div class="mb-3 mt-3">
           <label for="telefono" class="form-label">Telefono:</label>
           <input type="text" class="form-control" id="telefono" name="telefono" value="'.$telefono.'">
        </div>
        <div class="mb-3 mt-3">
           <label for="correo" class="form-label">Correo:</label>
           <input type="text" class="form-control" id="correo" name="correo" value="'.$correo.'">
        </div>
        <div class="mb-3 mt-3">
           <label for="nota" class="form-label">Nota:</label>
           <input type="text" class="form-control" id="nota" name="nota" value="'.$nota.'">
        </div>
        <div class="mb-3 mt-3">
           <label for="foto" class="form-label">Foto:</label>
           <input type="file" class="form-control" id="foto" name="foto" value="'.$foto.'">
        </div>
    </div>';
    return $aux;
    }

    function modificar($id, $contacto, $puesto, $empresa, $tipo, $prioridad, $telefono, $correo, $nota, $foto ){
        $sql = "insert into contacto(id, contacto, puesto, empresa, tipo, prioridad, telefono, correo, nota, foto) values('" .$this->llave($id) ."','" .$contacto ."','" .$puesto ."','".$empresa ."','". $tipo ."','".$prioridad."','".$telefono ."','".$correo ."','".$nota ."','".$foto ."')";
 
        $sql = "UPDATE contacto SET contacto = '" .$contacto ."', puesto = '" .$puesto ."', empresa = '".$empresa ."', prioridad = '".$prioridad."', telefono = '".$telefono ."', correo = '".$correo ."', nota = '".$nota ."', foto = '".$foto ."' WHERE id = '".$id ."'";

        $result = $this->conn->select($sql);
    }

    function eliminar($id){
        $sql = "delete from contacto where id = '".$id ."'";
        $result = $this->conn->select($sql);
        
    }
}
