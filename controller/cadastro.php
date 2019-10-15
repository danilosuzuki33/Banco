<?php  
date_default_timezone_set('America/Sao_Paulo');

$smarty = new Template();

//verify fields
if(isset($_POST['cli_name']) and isset($_POST['cli_agency']) and isset($_POST['cli_account']) and isset($_POST['cli_balance']) and isset($_POST['selectType']) and isset($_POST['cli_password'])){
    //create variables
	$cli_name = $_POST['cli_name'];
    $cli_password = $_POST['cli_password'];
	$cli_agency = $_POST['cli_agency'];
    $cli_account = $_POST['cli_account'];
    $cli_balance = $_POST['cli_balance'];
    $cli_selectType = $_POST['selectType'];

    //Create a new cliente
    $clientes = new Clientes();
    $clientes->CreateNewAccount($cli_name,$cli_password,$cli_agency,$cli_account,$cli_balance,$cli_selectType);

    //assign for template
    $smarty->assign('SITE', Config::SITE_NOME);
    $smarty->assign('PAG_MINHA_CONTA', Rotas::pag_ClienteConta());
    $smarty->assign('SITE_HOME', Rotas::get_SiteHOME());

    echo '<div class="alert alert-success"> Great! Welcome to our bank. <br>'.'Try to login now!</div>';
    Rotas::Redirecionar(5, Rotas::pag_ClienteLogin());

}else{
	$smarty->display('cadastro.tpl');
}

?>