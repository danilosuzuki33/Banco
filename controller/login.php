<?php  

date_default_timezone_set('America/Sao_Paulo');

$smarty = new Template();

$login = new Login();
// verify if intro data are correct
if(isset($_POST['txt_agency']) && isset($_POST['txt_account']) && isset($_POST['txt_password'])){
	$account = $_POST['txt_account'];
	$agency = $_POST['txt_agency'];
	$password = $_POST['txt_password'];
	$login->GetLogin($agency, $account ,$password);
}
//verification for logged in accounts
if(Login::Logado()){

	$smarty->assign('USER', $_SESSION['CLI']['cli_name']);
	$smarty->assign('PAG_LOGOFF', Rotas::pag_Logoff());
	Login::MenuCliente();//

}
//assigns for the template
$smarty->assign('LOGADO', Login::Logado());
$smarty->assign('PAG_CADASTRO', Rotas::pag_ClienteCadastro());
//display
$smarty->display('login.tpl');

?>