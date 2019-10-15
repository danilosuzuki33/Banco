<?php
/* Smarty version 3.1.33, created on 2019-10-14 21:58:26
  from 'C:\xampp\htdocs\Banco\view\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5da519b2d6fe30_90299367',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '705523ef945443c31f625bc9ae9c508d52edd7cd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Banco\\view\\login.tpl',
      1 => 1571101105,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5da519b2d6fe30_90299367 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['LOGADO']->value == TRUE) {?>



<?php } else { ?>

<section class="row" id="fazerlogin">

    <form name="cliente_login" method="post" action="" >
    
        <div class="col-md-4 text-center">
                        
                
        </div>
     
        <!---  aqui estão os campos -->
        <div class="col-md-4">

     
            <div class="form-group"> 
                <label></i> Agency: </label>
                <input type="text"  class="form-control " name="txt_agency" value="" placeholder="Enter your agency..." required autocomplete="off">        

            </div>

             <div class="form-group"> 
                 <label> Account Number: </label>
                 <input type="text"  class="form-control " name="txt_account" value="" placeholder="Enter your account number..." required>        
           
            </div>



            <div class="form-group"> 
                 <label> Password: </label>
                 <input type="password"  class="form-control " name="txt_password" value="" placeholder="Enter your password..." required>        
           
            </div>


            <div class="form-group"> 
                
                <button class="btn btn-geral btn-block btn-lg"><i class="glyphicon glyphicon-log-in"></i> Login </button>
          
                
                
                
            </div>
            <div class="form-group text-center"> 
                <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_CADASTRO']->value;?>
" class="btn btn-default "><i class="glyphicon glyphicon-pencil"></i> Create new account</a>            
            </div>

            
        </div><!-- fim dos campos -->


        <div class="col-md-4 text-center"> 
        
      
        </div>
    
    </form>
    
    
</section>

<?php }
}
}
