<?php 
//same as deposit.php
date_default_timezone_set('America/Sao_Paulo');

if(!isset($_SESSION)){
	session_start();	
}

require './lib/autoload.php';


$smarty = new Template();

$smarty->assign('GET_TEMA', Rotas::get_SiteTEMA());
$smarty->assign('PAG_MINHACONTA', Rotas::pag_MinhaConta());
$smarty->assign('PAG_TRASNFER', Rotas::pag_Transfer());
$smarty->assign('TITULO_SITE', Config::SITE_NOME);$smarty->assign('DATA', Sistema::DataAtualBr());
$smarty->assign('PAG_LOGOFF', Rotas::pag_Logoff());
$smarty->assign('LOGADO', Login::Logado());


if( (isset($_POST['transferInputValue']) && isset($_POST['transferInputAg']) && isset($_POST['transferInputAcc']) ) && ($_POST['transferInputValue'] > 0) && ($_POST['transferInputValue'] <= $_SESSION['CLI']['cli_balance']) &&  (($_POST['transferInputAg'] != $_SESSION['CLI']['cli_agency'] || $_POST['transferInputAcc'] != $_SESSION['CLI']['cli_account'])) ){
	if($_SESSION['CLI']['cli_type'] == "Basic"){
		$userType = new UserBasic($_SESSION['CLI']['cli_agency'],$_SESSION['CLI']['cli_account'],$_SESSION['CLI']['cli_balance'],$_SESSION['CLI']['cli_name']);
		$userType->Transfer($_SESSION['CLI']['cli_agency'],$_SESSION['CLI']['cli_account'],$_POST['transferInputValue'],'NoCartorioBank',$_POST['transferInputAg'],$_POST['transferInputAcc']);
		$_SESSION['CLI']['cli_balance'] = (double)$_SESSION['CLI']['cli_balance'] - (double)$_POST['transferInputValue'];
		Rotas::Redirecionar(0,'transfer');
	}
	else if($_SESSION['CLI']['cli_type'] == "Premium"){
		$userType = new UserPremium($_SESSION['CLI']['cli_agency'],$_SESSION['CLI']['cli_account'],$_SESSION['CLI']['cli_balance'],$_SESSION['CLI']['cli_name']);
		$userType->Transfer($_SESSION['CLI']['cli_agency'],$_SESSION['CLI']['cli_account'],$_POST['transferInputValue'],'NoCartorioBank',$_POST['transferInputAg'],$_POST['transferInputAcc']);
		$_SESSION['CLI']['cli_balance'] = (double)$_SESSION['CLI']['cli_balance'] - (double)$_POST['transferInputValue'];
		Rotas::Redirecionar(0,'transfer');
	}
	else{
		$userType = new UserSalary($_SESSION['CLI']['cli_agency'],$_SESSION['CLI']['cli_account'],$_SESSION['CLI']['cli_balance'],$_SESSION['CLI']['cli_name']);
		$userType->Transfer($_SESSION['CLI']['cli_agency'],$_SESSION['CLI']['cli_account'],$_POST['transferInputValue'],'NoCartorioBank',$_POST['transferInputAg'],$_POST['transferInputAcc']);
		$_SESSION['CLI']['cli_balance'] = (double)$_SESSION['CLI']['cli_balance'] - (double)$_POST['transferInputValue'];
		Rotas::Redirecionar(0,'transfer');
	}

}
else if( isset($_POST['transferInputValue']) && isset($_POST['transferInputAg']) && isset($_POST['transferInputAcc']) && ($_POST['transferInputValue'] <= 0) && ($_POST['transferInputValue'] > $_SESSION['CLI']['cli_balance']) ){
	echo '<div class="alert alert-danger alert-dismissible show" role="alert"><strong>Holy guacamole!</strong> You entered a negative number. Please try again with a positive one.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
}

if(Login::Logado()){
	$smarty->assign('USER', $_SESSION['CLI']['cli_name']);
	$smarty->assign('AGENCY', $_SESSION['CLI']['cli_agency']);
	$smarty->assign('ACCOUNT', $_SESSION['CLI']['cli_account']);
	$smarty->assign('BALANCE', $_SESSION['CLI']['cli_balance']);
	$smarty->assign('TYPE', $_SESSION['CLI']['cli_type']);
	$smarty->display('transfer.tpl');
}
else{
	$smarty->display('home.tpl');
}

?>