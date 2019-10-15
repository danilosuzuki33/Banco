<?php 

date_default_timezone_set('America/Sao_Paulo');

//create a session and start it

if(!isset($_SESSION)){
	session_start();	
}

require './lib/autoload.php';


//initiate smarty and assign for template
$smarty = new Template();
$smarty->assign('LOGADO', Login::Logado());

//verify if we has a post from deposit input and if it's greater than 0
if(isset($_POST['depositInput']) && ($_POST['depositInput'] > 0)){
	//verify which type of account is loged in
	if($_SESSION['CLI']['cli_type'] == "Basic"){ //for basic
		$userType = new UserBasic($_SESSION['CLI']['cli_agency'],$_SESSION['CLI']['cli_account'],$_SESSION['CLI']['cli_balance'],$_SESSION['CLI']['cli_name']); //instantiate a Basic account
		$userType->Deposit($_SESSION['CLI']['cli_agency'],$_SESSION['CLI']['cli_account'],$_POST['depositInput']); // do the deposit
		$_SESSION['CLI']['cli_balance'] = (double)$_SESSION['CLI']['cli_balance'] + (double)$_POST['depositInput'];// att session data
		Rotas::Redirecionar(0,'deposit');//refresh
	}
	else if($_SESSION['CLI']['cli_type'] == "Premium"){//for premium
		$userType = new UserPremium($_SESSION['CLI']['cli_agency'],$_SESSION['CLI']['cli_account'],$_SESSION['CLI']['cli_balance'],$_SESSION['CLI']['cli_name']);
		$userType->Deposit($_SESSION['CLI']['cli_agency'],$_SESSION['CLI']['cli_account'],$_POST['depositInput']);
		$_SESSION['CLI']['cli_balance'] = (double)$_SESSION['CLI']['cli_balance'] + (double)$_POST['depositInput'] + 1; //manual att of bonus income
		Rotas::Redirecionar(0,'deposit');
	}
	else{ //for salary
		$userType = new UserSalary($_SESSION['CLI']['cli_agency'],$_SESSION['CLI']['cli_account'],$_SESSION['CLI']['cli_balance'],$_SESSION['CLI']['cli_name']);
		$userType->Deposit($_SESSION['CLI']['cli_agency'],$_SESSION['CLI']['cli_account'],$_POST['depositInput']);
		$_SESSION['CLI']['cli_balance'] = (double)$_SESSION['CLI']['cli_balance'] + (double)$_POST['depositInput'];
		Rotas::Redirecionar(0,'deposit');
	}

}
else if(isset($_POST['depositInput']) && ($_POST['depositInput'] <= 0)){//if for somereason we get post signal from input but it's neg
	echo '<div class="alert alert-danger alert-dismissible show" role="alert"><strong>Holy guacamole!</strong> You entered a negative number. Please try again with a positive one.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
}

//verify if we're logged in
if(Login::Logado()){
	//assign and display deposit page
	$smarty->assign('USER', $_SESSION['CLI']['cli_name']);
	$smarty->display('deposit.tpl');
}
else{
	//display home
	$smarty->display('home.tpl');
}

?>