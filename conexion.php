<?php


class Conexion{

      public $servidor='localhost';
      public $usuario='root';
      public $password='';
      public $database='metacalor';
      public $port='3306';

    public function conectar(){
        
        return mysqli_connect(
             $this->servidor,
             $this->usuario,
             $this->password,
             $this->database,
             $this->port,
        );
    }

    
    public function PDU(){
         
        try{
            $handler= new PDO('mysql:host=127.0.0.1:3307;dbname=metacalor','root','');
            $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "<h1>hola</h1>";

        }
        catch(PDOException $e){
            echo $e->getMessage();
        }

    }

}


?>