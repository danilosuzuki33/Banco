<?php  

//CREATE A NEW ACCOUNT FUNCTION -> SAVE ON DB
class Clientes extends Conexao{

	public function CreateNewAccount($cli_name, $cli_agency, $cli_account, $cli_balance, $cli_selectType, $cli_password){
        

            $query  = "INSERT INTO user";   
            $query .= "(name, agency, number, balance, type, password)"; 
            $query .= " VALUES";
            $query .= "(:name, :agency, :account, :balance, :type, :password)";

            $params = array(

                ':name' => $cli_name,
                ':agency' => $cli_agency,
                ':account'=> $cli_account,
                ':balance' => $cli_balance,
                ':type' => $cli_selectType,
                ':password'=> $cli_password
            );
            echo $query;
            $this->ExecuteSQL($query, $params);
    }
}

?>