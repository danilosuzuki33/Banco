<?php

//class for transfer save  and some utilities

class Transfer extends Conexao{             

    function __construct() {
        parent::__construct();
    }

    public function SaveTransfer($idUser, $value, $ag_dest, $acc_number_dest){
        
        	//$historic = new Historic();

        	$query  = "INSERT INTO transfer";   
	        $query .= "(idUser, value, date, bank_dest, agency_dest, account_number_dest)"; 
	        $query .= " VALUES";
	        $query .= "(:idUser, :value, :date, :bank_dest, :agency_dest, :account_number_dest)";

	        $params = array(

	            ':idUser' => $idUser,
	            ':value' => (double)$value,
	            ':date'=> Sistema::DataAtualUS(),
	            ':bank_dest' => "NoCartorioBank",
	            ':agency_dest' => $ag_dest,
	            ':account_number_dest'=> $acc_number_dest
	            
	        );

	        $this->ExecuteSQL($query, $params);

	        $id = $this->getTransferID();

        return $id;
    }

    function getTransferID(){
        $query = "SELECT MAX(idTransfer) FROM transfer";
    
        $this->ExecuteSQL($query);

        $i = 1;

        $lista = $this->ListarDados();
        $this->itens[$i] = $lista['MAX(idTransfer)'];
        

        return (int) $this->GetItens()[1];
    }

    function getBalanceRec($idUser){
    	$query = "SELECT balance FROM user WHERE idUser = $idUser";

    	$this->ExecuteSQL($query);

        $i = 1;

        $lista = $this->ListarDados();
        $this->itens[$i] = $lista['balance'];
        

        return (int) $this->GetItens()[1];
    }

    function AttBalanceRec($idUser, $balance, $value){
        $att = $balance + $value;
        $query = "UPDATE user SET balance = $att WHERE iduser = $idUser"; //save on DB query
        if($this->ExecuteSQL($query)){ // saving on DB
            return true;
        }
        else{
            return false;
        }
    }

}