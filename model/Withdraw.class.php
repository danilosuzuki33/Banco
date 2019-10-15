<?php

//save withdraw on DB

class Withdraw extends Conexao{             

    function __construct() {
        parent::__construct();
    }

    public function SaveWithdraw($idUser, $value){
        
        	//$historic = new Historic();

        	$query  = "INSERT INTO withdraw";   
	        $query .= "(idUser, value, date)"; 
	        $query .= " VALUES";
	        $query .= "(:idUser, :value, :date)";

	        $params = array(

	            ':idUser' => $idUser,
	            ':value' => (double)$value,
	            ':date'=> Sistema::DataAtualUS()
	        );

	        $this->ExecuteSQL($query, $params);

	        $id = $this->getWithdrawID();

        return $id;
    }

    function getWithdrawID(){
        $query = "SELECT MAX(idWithdraw) FROM withdraw";
    
        $this->ExecuteSQL($query);

        $i = 1;

        $lista = $this->ListarDados();
        $this->itens[$i] = $lista['MAX(idWithdraw)'];
        

        return (int) $this->GetItens()[1];
    }


}