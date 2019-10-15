<!DOCTYPE html>

<html>
    <head>
        <title>{$TITULO_SITE}</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="{$GET_TEMA}/tema/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="{$GET_TEMA}/tema/contatos/contatos.css" rel="stylesheet" type="text/css"/>
        <script src="{$GET_TEMA}/tema/js/jquery-2.2.1.min.js" type="text/javascript"></script>
        <script src="{$GET_TEMA}/tema/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="{$GET_TEMA}/tema/contatos/contatos.js" type="text/javascript"></script>
        <!-- meu aquivo pessoal de CSS-->
        <link href="{$GET_TEMA}/tema/css/tema.css" rel="stylesheet" type="text/css"/>
     <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
    <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    </head>
    <body>
        
        <!-- começa  o container geral -->
        <div class="container-fluid">
            
            <!-- começa a div topo -->
            <div class="row" id="topo">
                 
                
                <div class="container">

                    <div class="col-md-6">
                         

                    </div>

                    <div class="col-md-6 text-right">
                        <br>
                        <br>
                        {if $LOGADO eq 'TRUE'}

                            <h6 style="color:white">AGENCY: <strong>{$AGENCY}</strong></h6>
                            <h6 style="color:white">ACCOUNT: <strong>{$ACCOUNT}</strong></h6>
                            <h4 style="color:white">BALANCE: <strong>{$BALANCE}</strong></h4>
                        {/if}
                        
                        
                    </div>
                       
                </div>                 
            
            </div><!-- fim da div topo -->
            
            <!-- começa a barra MENU-->
            <div class="row" id="barra-menu">
                
                <!--começa navBAR-->
                <nav class="navbar navbar-inverse">
                    
                    <!-- container navBAr-->
                    <div class="container">
                        <!-- header da navbar-->
                        <div class="navbar-header">
                           <!-- botao que mostra e esconde a navbar--> 
                           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                               <span class="sr-only">Toggle navigation</span>
                               <span class="icon-bar"></span>
                               <span class="icon-bar"></span>
                               <span class="icon-bar"></span>
                           </button>
                        
                        </div><!--fim header navbar-->  
                        
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="nav navbar-nav">
                                {if $LOGADO eq 'TRUE'}
                                    <li><a href="{$GET_SITE_HOME}" class="nav-item-animado"><i class="glyphicon glyphicon-home"></i> Home </a> </li>
                                    <li><a href="{$PAG_DEPOSIT}" class="nav-item-animado"><i class="glyphicon glyphicon-home"></i> Deposit </a> </li>
                                    <li><a href="{$PAG_TRANSFER}" class="nav-item-animado"><i class="glyphicon glyphicon-home"></i> Transfer </a> </li>
                                    <li><a href="{$PAG_WITHDRAW}" class="nav-item-animado"><i class="glyphicon glyphicon-home"></i> Withdraw </a> </li>
                                    {else}
                                    <li><a href="{$GET_SITE_HOME}" class="nav-item-animado"><i class="glyphicon glyphicon-home"></i> Login </a> </li>
                                {/if}
       
                            </ul>
                                
                            <ul class="nav navbar-nav navbar-right">
                                {if $LOGADO == 'TRUE'}
                                    <h4 style="color: white;">USER: <STRONG>{$USER}</STRONG>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{$PAG_LOGOFF}" class="btn btn-danger"><i class="glyphicon glyphicon-log-out"></i> Sair </a></h4> 
                                {/if}
                            </ul>
                        </div><!-- fim navbar collapse-->   


                    </div> <!--fim container navBar-->
                    
                </nav><!-- fim da navBar-->   
                
                
                
                
                
            </div> <!-- fim barra menu--> 
            
            <!-- começa DIV conteudo-->
            <div class="row" id="conteudo">
            
            <div class="container"> 
                
                <!-- coluna direita CONYEUDO CENTRAL -->
                <div class="col-md-12">
                    
                    
                      
                    <!-- fim do menu breadcrumb-->             
                    
                  {php}

                  Rotas::get_Pagina();
                  //var_dump(Rotas::$pag);
                  {/php}
                    
                </div>  <!--fim coluna direita-->  
            
            </div>   
                
                
            
                
                
                
            </div><!-- fim DIV conteudo-->
            
            <!-- começa div rodape -->
            <div class="row" id="rodape">
                <center>
                    <h4>{$TITULO_SITE}</h4>
                    <P>Todos os Direitos Reservados - Danilo Augusto Corrêa Suzuki - Data Atual: {$DATA}</P>
                </center>
            
            </div><!-- fim div rodape-->
            
            
            
           </div> <!-- fim do container geral -->
        
        
        
        
    </body>
</html>
