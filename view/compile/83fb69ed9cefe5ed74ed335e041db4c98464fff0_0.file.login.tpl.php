<?php
/* Smarty version 3.1.33, created on 2019-06-19 11:06:09
  from 'D:\xampp\htdocs\Loja-Local\view\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d0a4151581e57_94636431',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '83fb69ed9cefe5ed74ed335e041db4c98464fff0' => 
    array (
      0 => 'D:\\xampp\\htdocs\\Loja-Local\\view\\login.tpl',
      1 => 1559052118,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d0a4151581e57_94636431 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['LOGADO']->value == TRUE) {?>



<?php } else { ?>

<section class="row" id="fazerlogin">

    <form name="cliente_login" method="post" action="" >
    
        <div class="col-md-4 text-center">
                        
                
        </div>
     
        <!---  aqui estão os campos -->
        <div class="col-md-4">

     
            <div class="form-group"> 
                <label></i> Email: </label>
                <input type="email"  class="form-control " name="txt_email" value="" placeholder="Digite seu email" required autocomplete="off">        

            </div>


            <div class="form-group"> 
                 <label> Senha: </label>
                 <input type="password"  class="form-control " name="txt_senha" value="" placeholder="Digite sua senha" required>        
           
            </div>


            <div class="form-group"> 
                
                <button class="btn btn-geral btn-block btn-lg"><i class="glyphicon glyphicon-log-in"></i> Entrar </button>
          
                
                
                
            </div>
            <div class="form-group"> 
                
                <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_CADASTRO']->value;?>
" class="btn btn-default "><i class="glyphicon glyphicon-pencil"></i> Me Cadastrar</a>
             
                
                <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_RECOVERY']->value;?>
" class="btn btn-default "><i class="glyphicon glyphicon-question-sign"></i> Esqueci a Senha</a>
           
                
                
            </div>

            
        </div><!-- fim dos campos -->


        <div class="col-md-4 text-center"> 
        
      
        </div>
    
    </form>
    
    
</section>

<?php }
}
}
