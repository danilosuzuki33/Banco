<?php


//this class is used for saving some historic on db and get show the historic

class Historic extends Conexao{             

    function __construct() {
        parent::__construct();
    }

    public function SaveHistoric($idUser, $action, $idAction){

        	$query  = "INSERT INTO historic";   
	        $query .= "(idUser, action, idAction, date)"; 
	        $query .= " VALUES";
	        $query .= "(:idUser, :action, :idAction, :date)";

	        $params = array(

	            ':idUser' => $idUser,
	            ':action' => $action,
	            ':idAction' => $idAction,
	            ':date'=> Sistema::DataAtualUS()
	        );

	        $this->ExecuteSQL($query, $params);

	        $return = TRUE;


        return $return;
    }

	    function Get_Hitoric($idUser){
			$query = "SELECT idHistoric, idUser, action, idAction, date FROM historic WHERE idUser = $idUser ORDER BY idHistoric DESC";
			$params = array();
			$this->ExecuteSQL($query);

			$this->GetLista();
		}

		function Get_HitoricDate($idUser, $date){
			$query = "SELECT idHistoric, idUser, action, idAction, date FROM historic WHERE idUser = $idUser AND date = '$date' ORDER BY idHistoric DESC";
			$params = array();
			$this->ExecuteSQL($query);

			$this->GetLista();
		}

		function Get_HitoricAction($idUser, $action){
			$query = "SELECT idHistoric, idUser, action, idAction, date FROM historic WHERE idUser = $idUser AND action = '$action' ORDER BY idHistoric DESC";
			$params = array();
			$this->ExecuteSQL($query);

			$this->GetLista();
		}

		function Get_HitoricActionDate($idUser, $action, $date){
			$query = "SELECT idHistoric, idUser, action, idAction, date FROM historic WHERE idUser = $idUser AND action = '$action' AND date = '$date' ORDER BY idHistoric DESC";
			$params = array();
			$this->ExecuteSQL($query);
			$this->GetLista();
		}

		private function GetLista(){
			$i = 1;
			while($lista = $this->ListarDados()):
			$this->itens[$i] = array(
				 'idHistoric' => $lista['idHistoric'],
				 'idUser'  => $lista['idUser'],  
		         'action'  => $lista['action'],
		         'idAction' => $lista['idAction'],
		         'date' => $lista['date']
				);
			$i++;
			endwhile;
		}




}