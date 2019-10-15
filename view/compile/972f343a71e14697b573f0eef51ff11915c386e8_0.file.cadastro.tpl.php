<?php
/* Smarty version 3.1.33, created on 2019-10-14 21:50:49
  from 'C:\xampp\htdocs\Banco\view\cadastro.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5da517e90960e8_20275018',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '972f343a71e14697b573f0eef51ff11915c386e8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Banco\\view\\cadastro.tpl',
      1 => 1571100630,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5da517e90960e8_20275018 (Smarty_Internal_Template $_smarty_tpl) {
?><h3>Create a new Account</h3>
<!--- dados do cadastro -->

<hr>

<form name="cadcliente" id="cadcliente" method="post" action="">

<section class="row" id="cadastro">
        
        <div class="col-md-8">
            <label>Full Name:</label>
            <input type="text" name="cli_name" class="form-control" minlength="3" required>
        </div>

        <div class="col-md-4">
            <label>Password:</label>
            <input type="text" name="cli_password" class="form-control" minlength="3" required>
        </div>
      
        <div class="col-md-4">
            <label>Type of Account:</label>
            <select id="selectType" class="form-control" name="selectType">
              <option selected="selected">Choose</option>
              <option>Basic</option>
              <option>Premium</option>
              <option>Salary</option>
            </select>
        </div>

        <div class="col-md-2">
            <label>Agency:</label>
            <input type="text" name="cli_agency" class="form-control" minlength="5" maxlength="5" required>        
        </div>
        
        <div class="col-md-2">
            <label>Account:</label>
            <input type="text" name="cli_account" class="form-control"  minlength="5" maxlength="5" required>
        </div>
        
        <div class="col-md-2">
            <label>Starting Balance:</label>
            <input type="number" name="cli_balance" class="form-control" required>
        </div>
	            
	</section>

	      <br>
	      <br>
	      
	      <section class="row" id="btngravar">
	          
	       <div class="col-md-4"></div>
	       
	       <div class="col-md-4">
	           <button type="submit" class="btn btn-info btn-block "> <i class="glyphicon glyphicon-ok"></i> Gravar </button>
	               
	           
	       </div>
	       
	       <div class="col-md-4"></div>
	    
	    
	</section>
	      
	      
	         </form><?php }
}
