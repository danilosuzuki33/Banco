<?php 

Class Rotas{

	public static $pag;
	private static $pasta_controller = 'controller';
	private static $pasta_view = 'view';

	static function get_SiteHOME(){
		return Config::SITE_URL . '/' .Config::SITE_PASTA;
	}

	static function get_SiteRAIZ(){
		return $_SERVER['DOCUMENT_ROOT'] . '/' .Config::SITE_PASTA;
	}

	static function get_SiteTEMA(){
		return  self::get_SiteHOME(). '/' .self::$pasta_view;
	}

	static function pag_MinhaConta(){
		return self::get_SiteHOME(). '/minhaconta';
	}

	static function pag_Withdraw(){
		return  self::get_SiteHOME(). '/withdraw';
	}

	static function pag_Deposit(){
		return  self::get_SiteHOME(). '/deposit';
	}

	static function pag_Transfer(){
		return  self::get_SiteHOME(). '/transfer';
	}

	static function pag_Logoff(){
		return  self::get_SiteHOME(). '/logoff';
	}

	static function pag_ClienteLogin(){
		return self::get_SiteHOME(). '/login';
	}

	static function pag_ClienteCadastro(){
		return self::get_SiteHOME(). '/cadastro';
	}

	static function get_Pasta_Controller(){
		return self::$pasta_controller;
	}

	static function Redirecionar($tempo, $pagina){
		$url = '<meta http-equiv="refresh" content="'.$tempo.'; url='. $pagina .'">';
		echo $url;
	}


	static function get_Pagina(){
		if(isset($_GET['pag'])){

			$pagina = $_GET['pag'];

			self::$pag = explode('/', $pagina);
			
			//echo '<pre>';
			//var_dump(self::$pag);
			//echo '</pre>';


			$pagina = 'controller/' .self::$pag[0] . '.php';
			//$pagina = 'controller/' .$_GET['pag'] . '.php';
			
			if(file_exists($pagina)){
				include $pagina;
			}else{
		}

		}else{
			include 'home.php';
		}
	}

}

 ?>