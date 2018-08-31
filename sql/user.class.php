<?php

class RetornarUsuarios{
 
    public function ListarUser($buscar_nome){
       try{
           $connection = new PDO("mysql:host=138.68.7.117;dbname=yelp_db","admin","123456");
           $sql = "SELECT id, name FROM user WHERE name LIKE '%{$buscar_nome}%';";
           $preparedStatment = $connection->prepare($sql);
            
           if ($preparedStatment->execute() == TRUE) {
           	return $preparedStatment->fetchAll();
           }
           else {
               	return array();
           } 
        } catch (PDOException $ex) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            print $ex->getMessage();
        }finally {
            if (isset($connection)) {
                unset($connection);
            }
	}
    }//fim ListarUser
    
    public function ListarFriendsUser($id_usuario){
	try {
             $connection = new PDO("mysql:host=138.68.7.117;dbname=yelp_db","admin","123456");
             $sql = "SELECT user.id, user.name FROM friend 
                     INNER JOIN user
		     ON user.id = friend.friend_id
		     WHERE friend.user_id = :id_usuario;";

             $preparedStatment = $connection->prepare($sql);					
				
             $preparedStatment->bindParam(":id_usuario", $id_usuario);
             if ($preparedStatment->execute() == TRUE) {
		return $preparedStatment->fetchAll();
             }
             else {
		return array();
             }
	} catch (PDOException $exc) {
             if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            print $exc->getMessage();
	} finally {
            if (isset($connection)) {
		unset($connection);
            }
	}
    }//fimListarAmigodoUser
    
    
}
