<?php

//user superclass + getters and setters


class User extends Conexao{    
    private $agency, $account_number, $balance, $name, $type;          
    
    function __construct() {
        parent::__construct();
    }

    //GETTERS AND SETTERS
    function getAgency() {
        return $this->agency;
    }

    function getAccountNumber(){
        return $this->account_number;
    }

    function getBalance(){
        return (double)$this->balance;
    }

    function getName(){
        return $this->name;
    }

    function getType(){
        return $this->type;
    }

    function setType($type){
        $this->type = $type;
    }

    function setName($name){
        $this->name = $name;
    }
    
    function setAgency($agency){
        $this->agency = $agency;
    }
    
    function setAccountNumber($account_number){
        $this->account_number = $account_number;
    }

    function setBalance($balance){
        $this->balance = (double)$balance;
    }
    //** END GETTERS AND SETTERS **
    
    //DB CATCHES
    function getUserID($agency, $userAccount){
        $query = "SELECT idUser FROM user";
        $query .= " WHERE agency = $agency AND number = $userAccount";
    
        $this->ExecuteSQL($query);

        $i = 1;

        $lista = $this->ListarDados();
        $this->itens[$i] = $lista['idUser'];
        

        return (int) $this->GetItens()[1];
    }

    //ATT BALANCE
    function AttBalance($value){
        (double)$this->balance += (double)$value;
        $query = "UPDATE user SET balance = '".$this->getBalance()."' WHERE agency = '".$this->getAgency()."' AND number = '".$this->getAccountNumber()."'"; //save on DB query
        if($this->ExecuteSQL($query)){ // saving on DB
            return true;
        }
        else{
            return false;
        }
    }

    //CATCH FROM BALANCE
    function Warning(){
        echo '<div class="alert alert-danger alert-dismissible show" role="alert"><strong>Holy guacamole!</strong> Something went wrong! Check the fields and try again.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }

}

?>