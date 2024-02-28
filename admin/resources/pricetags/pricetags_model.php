<?php
require_once("../../conexion/conexion.php");

class Pricetags extends Conectar{

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    /* * * * * * * * * * * * * * * FUNCIONES PARA GESTIONAR PRECIOS Y SERVICIOS * * * * * * * * * * * * * * * * * * * */

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
    
    public function getpricetags(){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();

        //QUERY

            $sql="SELECT * FROM pricetags";

        
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    }
    
    public function deletepricetags($tagsid){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();

        //QUERY

            $sql="DELETE FROM pricetags WHERE id ='$tagsid'";

        
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();

        return $sql;

    }

    public function countpricetags($tagsid){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();

        //QUERY

            $sql="SELECT * FROM pricetags WHERE id = '$tagsid'";

        
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function savepricetags($nametags,$pricetags,$viewtags){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
		$conectar= parent::conexion();
		parent::set_names();

 		//QUERY

			$sql="INSERT INTO pricetags (tags,price,status) VALUES(?,?,?)";

		//PREPARACION DE LA CONSULTA PARA EJECUTARLA.
		$sql = $conectar->prepare($sql);
		$sql->bindValue(1, $nametags);
        $sql->bindValue(2, $pricetags);
        $sql->bindValue(3, $viewtags);

		return $sql->execute();

	}

    public function updatepricetags($tagsid,$nametags,$costtags,$viewtags){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();


        ///QUERY

        $sql="UPDATE pricetags  SET tags  = '$nametags', price  = '$costtags', status  = '$viewtags' WHERE id = '$tagsid'";

        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    /* * * * * * * * *  * * * * FUNCIONES PARA GESTIONAR LOS ITEM'S DE LOS SERVICIOS * * * * * * * * * * * * * * * */

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    public function getitemtags(){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();

        //QUERY

            $sql="SELECT i.id,i.item,i.tags AS itags, p.tags AS dtags
            FROM itemstags as i
            INNER JOIN pricetags AS p ON i.tags = p.id";

        
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function countitemstags($itemtagsid){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();

        //QUERY

            $sql="SELECT * FROM itemstags WHERE id = '$itemtagsid'";

        
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function saveitemstags($nameitemtags,$itemtags){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
		$conectar= parent::conexion();
		parent::set_names();

 		//QUERY

			$sql="INSERT INTO itemstags (item,tags) VALUES(?,?)";

		//PREPARACION DE LA CONSULTA PARA EJECUTARLA.
		$sql = $conectar->prepare($sql);
		$sql->bindValue(1, $nameitemtags);
        $sql->bindValue(2, $itemtags);

		return $sql->execute();

	}

    public function searchitem($itemtagsid){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();

        //QUERY

            $sql="SELECT * FROM pricetags WHERE tags = '$itemtagsid'";

        
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function updateitemtags($itemtagsid,$nameitemtags,$itemtags){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();


        ///QUERY

        $sql="UPDATE itemstags  SET item  = '$nameitemtags', tags  = '$itemtags'  WHERE id = '$itemtagsid'";

        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    /* * * * * * * * *  * * *FUNCIONES PARA GESTIONAR LAS DESCRIPCIONES DE LOS SERVICIOS * * * * * * * * * * * * * */

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */


}