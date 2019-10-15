<?php 

date_default_timezone_set('America/Sao_Paulo');

if(!isset($_SESSION)){
	session_start();	
}

require './lib/autoload.php';

$smarty = new Template();

//valores para o template
$smarty->assign('GET_TEMA', Rotas::get_SiteTEMA());
$smarty->assign('GET_NOME', Config::SITE_NOME);
$smarty->assign('GET_SITE_HOME', Rotas::get_SiteHOME());
$smarty->assign('PAG_WITHDRAW', Rotas::pag_Withdraw());
$smarty->assign('PAG_DEPOSIT', Rotas::pag_Deposit());
$smarty->assign('PAG_TRANSFER', Rotas::pag_Transfer());
$smarty->assign('PAG_MINHACONTA', Rotas::pag_MinhaConta());
$smarty->assign('TITULO_SITE', Config::SITE_NOME);$smarty->assign('DATA', Sistema::DataAtualBr());
$smarty->assign('PAG_LOGOFF', Rotas::pag_Logoff());
$smarty->assign('LOGADO', Login::Logado());

if(Login::Logado()){
	$smarty->assign('USER', $_SESSION['CLI']['cli_name']);
	$smarty->assign('AGENCY', $_SESSION['CLI']['cli_agency']);
	$smarty->assign('ACCOUNT', $_SESSION['CLI']['cli_account']);
	$smarty->assign('BALANCE', $_SESSION['CLI']['cli_balance']);
	$smarty->assign('TYPE', $_SESSION['CLI']['cli_type']);
	$smarty->assign('LOGADO','TRUE');
}
else{
	$smarty->assign('LOGADO','FALSE');
	$smarty->assign('USER', "");
}

$smarty->display('index.tpl');

?>