    <?php

        include "Auth.php";
        $id=$_GET['id'];

        $Auth=new Auth();

        if($Auth->getReporteDiario($id)){
            $fila=$Auth->getReporteDiario($id);
            $array = json_encode($fila);
            header("Location: reporteDiario.php?variable=".urlencode($array));
        }

    ?>

