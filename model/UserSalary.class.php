<?php

//subclass from user

class UserSalary extends User implements UserInterface{             
    
    function __construct($ag, $accn, $val, $name) {
        parent::__construct();
        parent::setAgency($ag);
        parent::setAccountNumber($accn);
        parent::setBalance($val);
        parent::setName($name);
        parent::setType("Basic");
    }
    
    function UserSave(){
        
        $return = FALSE;

        $query  = "INSERT INTO user";   
        $query .= "(name, agency, number, balance, type)"; 
        $query .= " VALUES";
        $query .= "(:name, :agency, :number, :balance, :type)";

        $params = array(

            ':name' => parent::getName(),
            ':agency' => parent::getAgency(),
            ':number'=> parent::getAccountNumber(),
            ':balance' => parent::getBalance(),
            ':type' => parent::getType()
        );

        $this->ExecuteSQL($query, $params);

        $return = TRUE;
        return $return;
    }

    function Deposit($agency, $account_number, $value){
        $idUser = parent::getUserID($agency,$account_number);
        $return = FALSE;

        if($idUser != 0){
            parent::AttBalance($value);
            $deposit = new Deposit();
            $id = $deposit->SaveDeposit($idUser, $value);
            $historic = new Historic();
            $historic->SaveHistoric($idUser, "Deposit", $id);
        }
    }


    function Transfer($agency, $account_number, $value, $bank_dest,$agency_dest, $account_number_dest){
        $idUser = parent::getUserID($agency,$account_number);
        $idUserRec = parent::getUserID($agency_dest,$account_number_dest);
        $return = FALSE;

        if($idUser != 0 && $idUserRec != 0  && $value <= parent::getBalance()){

            parent::AttBalance(-$value);
            $transfer = new Transfer();
            $balance = $transfer -> getBalanceRec($idUserRec);//recover balance from REC
            $transfer -> AttBalanceRec($idUserRec,$balance, $value);//Att balance from REC
            $id = $transfer->SaveTransfer($idUser, $value, $agency_dest, $account_number_dest);
            $historic = new Historic();
            $historic->SaveHistoric($idUser, "Transfer", $id);
        }
        else{
            parent::Warning();
        }
    }

    function Withdraw($agency, $account_number, $value){
        $idUser = parent::getUserID($agency,$account_number);
        $return = FALSE;

        if($idUser != 0  && $value <= parent::getBalance()){
            parent::AttBalance(-$value-1);
            $withdraw = new Withdraw();
            $id = $withdraw->SaveWithdraw($idUser, $value);
            $historic = new Historic();
            $historic->SaveHistoric($idUser, "Withdraw", $id);
        }
        else{
            parent::Warning();
        }
    }
    
}