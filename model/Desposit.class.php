<?php


//this class is used for saving some deposit on db and get an deposit id for the first function's return

class Deposit extends Conexao{             

    function __construct() {
        parent::__construct();
    }

    public function SaveDeposit($idUser, $value){
        
        	//$historic = new Historic();

        	$query  = "INSERT INTO deposit";   
	        $query .= "(idUser, value, date)"; 
	        $query .= " VALUES";
	        $query .= "(:idUser, :value, :date)";

	        $params = array(

	            ':idUser' => $idUser,
	            ':value' => (double)$value,
	            ':date'=> Sistema::DataAtualUS()
	        );

	        $this->ExecuteSQL($query, $params);

	        $id = $this->getDepositID();

        return $id;
    }

    function getDepositID(){
        $query = "SELECT MAX(idDeposit) FROM deposit";
    
        $this->ExecuteSQL($query);

        $i = 1;

        $lista = $this->ListarDados();
        $this->itens[$i] = $lista['MAX(idDeposit)'];
        

        return (int) $this->GetItens()[1];
    }


}