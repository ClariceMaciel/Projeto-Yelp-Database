<?php

class RetornarComentarios{
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
        
        
    }//fim class listarUser
    
    public function RetornarNegocioQueUsuarioComentou($id_usuario){
	try {
        	$connection = new PDO("mysql:host=138.68.7.117;dbname=yelp_db","admin","123456");
		$sql = "SELECT distinct business.id, business.name FROM review
		INNER JOIN business  
		ON business.id = review.business_id
		WHERE review.user_id = :id_usuario;";
                
                $preparedStatment = $connection->prepare($sql);					
				
		$preparedStatment->bindParam(":id_usuario", $id_usuario);
		if ($preparedStatment->execute() == TRUE) {
        		return $preparedStatment->fetchAll();
		}else {
			return array();
                      }
		} catch (PDOException $ex) {
                    if ((isset($connection)) && ($connection->inTransaction())) {
			$connection->rollBack();
			}
                    print $ex->getMessage();
               	} finally {
                    if (isset($connection)) {
                    unset($connection);
                    }
        	}
	}// fim class RetornarComentarioDoNegocioUser
        
	public function RetornarCometarioDoUsuarioSobreNegocio($id_usuario,$id_negocio){
		try {
                    $connection = new PDO("mysql:host=138.68.7.117;dbname=yelp_db","admin","123456");
                    $sql = "SELECT * from review
                    WHERE review.user_id = :id_usuario
                    AND review.business_id = :id_negocio;";
		
                    $preparedStatment = $connection->prepare($sql);					
			
		    $preparedStatment->bindParam(":id_usuario", $id_usuario);
                    $preparedStatment->bindParam(":id_negocio", $id_negocio);
                    
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
			
			} finally {
                           	if (isset($connection)) {
                                unset($connection);
                            }
                        }
		} //fim class RetornarComentarioDoUsuarioSobreNegocio        
    
}
