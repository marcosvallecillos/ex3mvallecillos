<?php
class lighting extends Conexion{
    
    function importLamps($fichero){
        $gestor = fopen($fichero, "r");
        if ($gestor !== false) {
            while (($element = fgetcsv($gestor)) !== false) {
               
                $query = "INSERT INTO lamps (lamp_id, lamp_nombre, lamp_modelo, lamp_zona, lamp_encendido) VALUES (?, ?, ?, ?, ?)";
                $statement = $this->conn->prepare($query);
                
                
                $id = $element[0];
                $nombre = $element[1];
                $modelo = $element[2];
                $zona = $element[3];
                $encendido = $element[4];
                
            
                $statement->bind_param("issss", $id, $nombre, $modelo, $zona, $encendido);
                $statement->execute();
            }
            fclose($gestor);
        }
    }
    public function deletelist(){
        $conn = $this->getConn();
        $query = "DELETE FROM lamps"; 
        $conn->query($query);
        
    }
    public function init(){
        $this->deletelist();
        $this->importLamps('lighting.csv');  
    }
    public function getAllLamps(){
        $query  = "SELECT * FROM lamps inner join lamp_zone on lamp.zoneid = zone_id";
        $resultado = $this->conn->query($query);
        if(!$resultado){
            die("Error en la consulta: " . $this->conn->error);
        }
        $lamps =  array();
        while($file  = $resultado->fetch_object()) {
            $lamps[]=$file;
        }
         return $lamps;
    }
    public function drawLampsList(){
        $lamps = $this->getAllLamps();
        {
        $html = "";
        foreach ($lamps as $lamp) {
            $html .= "<td>" . $lamp->getId() . "</td>";
            $html .= "<td>" . $lamp->getNombre() . "</td>";
            if ($lamp->getEncedida() == 'on') {
                $html .= '<td class= ".on-status"><img src="img/bulb-icon-on.png"></td>';
            } else {
                $html .= '<td class= ".off-status"><img src="img/bulb-icon-off.png"></td>';
            }
            $html .= "<td>" . $lamp->getmodelId() . "</td>";
            $html .= "<td>" . $lamp->getPotencia() . "</td>";
            $html .= "<td>" . $lamp->getzonelId() . "</td>";
        }
        return $html;
    }
}
    function getmodelId($lampModel)
    {
        $sql = "SELECT lamp_id FROM lamps WHERE lamp_model = '$lampModel'";
        $result = mysqli_query($this->conn, $sql);
        if ($result && $row = mysqli_fetch_assoc($result)) {
            return $row['lamp_id'];
        } else {
            return null;
        }
    }
    function getzonelId($lampzone)
    {
        $sql = "SELECT lamp_id FROM lamps WHERE lamp_zone = '$lampzone'";
        $result = mysqli_query($this->conn, $sql);
        if ($result && $row = mysqli_fetch_assoc($result)) {
            return $row['lamp_id'];
        } else {
            return null;
        }
    }
     function encotrarID($lamp_id) {
        $query = "SELECT * FROM lamps WHERE lamp_id = $lamp_id";
        $resultado = $this->conn->query($query);
        if ($resultado && $resultado->num_rows > 0) {
            $row = $resultado->fetch_object();
            return $row;
        } else {
            return null; 
    }
}
public function updateTarea($id, $encendida) {


    $query = "UPDATE lamps SET encendida='$encendida' WHERE id=$id";
    $resultado = $this->conn->query($query);

    if (!$resultado) {
        die("Error en la consulta: " . $this->conn->error);
    } 
}

function cambiarImagen(){
    $imagen_actual = "on";
    if( $imagen_actual== "off"){
        return "on";
    }else{
        return "off" ; 
    }
}

}


    
    