<?php
class agenda2023{
    public $conn;
    public $sql; // Instancia de la clase sql

    public function __construct() {
        $this->sql = new sql(); // Crear una nueva instancia de la clase sql
        $this->conn = $this->sql->conn; // Asignar la conexión a $conn si es necesario
    }
    public function agregar($nom, $app, $tel, $llave){
        
        $sql = "INSERT INTO agenda2023 (nom, app, tel, clave) VALUES ('$nom', '$app', '$tel', '$llave')";
        $result = $this->conn->query($sql);

        return $result;

        //localhost:8080/agendaWeb/?tipo=1&nom=Juan&app=Hernandez&tel=1234567890&llave=1234567890
    }

    public function update($nom, $app, $tel, $llave){
        $sql = "UPDATE agenda2023 SET nom='$nom', app='$app', tel='$tel' WHERE clave='$llave'";
        $result = $this->conn->query($sql);
        return $result;
        //localhost:8080/agendaWeb/?tipo=2&nom=Juan&app=Hernandez&tel=1234567890&llave=1234567890
    }

    public function delete($id, $llave){
        $sql = "DELETE FROM agenda2023 WHERE id='$id' AND clave='$llave'";
        $result = $this->conn->query($sql);
        return $result;
        //localhost:8080/agendaWeb/?tipo=3&id=1&llave=1234567890
    }

    public function consultar($llave){
        $sql = "SELECT * FROM agenda2023 WHERE clave='$llave'";
        $result = $this->conn->query($sql);
        
        $line = '{"lista":[';
        $aux = "";
        while($row = mysqli_fetch_object($result)){
           $line = $line.$aux.'{"id":"'.$row->id.'","nom":"'.$row->nom.'","app":"'.$row->app.'","tel":"'.$row->tel.'"}';
           $aux = $aux == "" ? "," : ",";
        }
        $line .="]}";
        return $line;
        //localhost:8080/agendaWeb/?tipo=4&llave=1234567890

    }

    
}
?>