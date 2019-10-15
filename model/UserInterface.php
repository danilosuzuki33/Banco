<?php
	
	//the interface for user's classes

	Interface UserInterface {
		function UserSave(); //Method to Save on DB user's info
		function Deposit($agency, $account_number, $value); //Method to do some depoist
		function Transfer($agency, $account_number, $value, $bank_dest, $agency_dest, $account_number_dest); //Method to do some transfer
		function Withdraw($agency, $account_number, $value); //Method to do some withdraw
	} 
?>