<?php  


//class for login utilities

class Login extends Conexao{
	private $agency, $password, $account;

	function __construct(){
		parent::__construct();
	}

	//verify if loggin data are correct, if they do, redirect for home version logged in
	function GetLogin($agency, $account ,$password){
		
		$this->setAgency($agency);
		$this->setAccount($account);
		$this->setPassword($password);

		$query = "SELECT * FROM user WHERE number = :account AND agency = :agency AND password = :password";

		$params = array(

			':account' => $this->getAccount(),
			':agency' => $this->getAgency(),
			':password' => $this->getPassword()
		);

		$this->ExecuteSQL($query, $params);

		if($this->TotalDados() > 0){
			$lista = $this->ListarDados();

			$_SESSION['CLI']['cli_id']        =  $lista['idUser'];
			$_SESSION['CLI']['cli_name']      =  $lista['name'];
            $_SESSION['CLI']['cli_agency'] =  $lista['agency'];
            $_SESSION['CLI']['cli_account']  =  $lista['number'];
            $_SESSION['CLI']['cli_balance']    =  $lista['balance'];
            $_SESSION['CLI']['cli_type']    =  $lista['type'];
            $_SESSION['CLI']['cli_password']    =  $lista['password'];			
			Rotas::Redirecionar(0, Rotas::get_SiteHOME());//redirect fo

		}else{
			 echo '<div class="alert alert-danger alert-dismissible show" role="alert"><strong>Holy Cassoulet!</strong> Please check your info, or create a new account.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
		}

	}

	//function for deny access
	static function AcessoNegado(){
		echo '<div class="alert alert-danger"> Acesso Negado, faça Login </div> <a href="'.Rotas::pag_ClienteLogin().'" class = "btn btn-danger"> Login </a>';
	}

	//verify if accounts are logged in
	static function Logado(){
		if(isset($_SESSION['CLI']['cli_agency']) && isset($_SESSION['CLI']['cli_account'])&& isset($_SESSION['CLI']['cli_password'])){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	//log off from account
	static function Logoff(){
		unset($_SESSION['CLI']);
		echo '<h4 class = "alert alert-success"> Saindo... </h4>';
		Rotas::Redirecionar(1, Rotas::pag_ClienteLogin());
	}

	//function as controller of home version logged in.
	static function MenuCliente(){
        
    //double check for logged in accounts 
    if(!self::Logado()):
                self::AcessoNegado();//if neg, reject
                Rotas::Redirecionar(1, Rotas::pag_ClienteLogin());//redirect for login page
                exit();//exit
        else: //if there's an account logged in
         
        //instantiate variables
        $smarty = new Template();
        $historic = new Historic();
		//check for posts signals and verify if they are clear or on standard option - for each one of the possiblilities it calls a correspodent function
		if( isset($_POST['selectAction']) && isset($_POST['inputDate']) && $_POST['selectAction'] != "Choose" && $_POST['inputDate'] != ""){
			$historic->Get_HitoricActionDate($_SESSION['CLI']['cli_id'], $_POST['selectAction'], $_POST['inputDate'] );
			$smarty -> assign('GET_HISTORIC',$historic->GetItens());
		}
		else if( isset($_POST['selectAction']) && isset($_POST['inputDate']) && $_POST['selectAction'] != "Choose" ){
			$historic->Get_HitoricAction($_SESSION['CLI']['cli_id'],$_POST['selectAction']);
			$smarty -> assign('GET_HISTORIC',$historic->GetItens());
		}
		else if(isset($_POST['selectAction']) && isset($_POST['inputDate']) && $_POST['inputDate'] != "" ){
			$historic->Get_HitoricDate($_SESSION['CLI']['cli_id'],$_POST['inputDate']);
			$smarty -> assign('GET_HISTORIC',$historic->GetItens());
		}
		else if( isset($_POST['selectAction']) && isset($_POST['inputDate']) && $_POST['selectAction'] != "Choose" && $_POST['inputDate'] != ""){
			$historic->Get_Hitoric($_SESSION['CLI']['cli_id']);
			$smarty -> assign('GET_HISTORIC',$historic->GetItens());
		}
		else{
			$historic->Get_Hitoric($_SESSION['CLI']['cli_id']);
			$smarty -> assign('GET_HISTORIC',$historic->GetItens());
		}
		//assigns before displaying
        $smarty->assign('PAG_LOGOFF', Rotas::pag_Logoff());
        $smarty->assign('USER', $_SESSION['CLI']['cli_name']);
		$smarty->assign('AGENCY', $_SESSION['CLI']['cli_agency']);
		$smarty->assign('ACCOUNT', $_SESSION['CLI']['cli_account']);
		$smarty->assign('BALANCE', $_SESSION['CLI']['cli_balance']);
		$smarty->assign('TYPE', $_SESSION['CLI']['cli_type']);
		//display
        $smarty->display('menu_cliente.tpl');
        
    endif;
    }


    // ** GETTERS AND SETTERS ** 
	private function setAgency($agency){
		$this->agency = $agency;
	}

	private function setAccount($account){
		$this->account = $account;
	}

	private function setPassword($password){
		//$this->senha = Sistema::Criptografia($senha);
		$this->password = $password;
	}

	function getAgency(){
		return $this->agency;
	}

	function getAccount(){
		return $this->account;
	}

	function getPassword(){
		return $this->password;
	}
	// ** END GETTERS AND SETTERS **
}


?>