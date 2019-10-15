<?php
/* Smarty version 3.1.33, created on 2019-10-14 23:22:49
  from 'C:\xampp\htdocs\Banco\view\transfer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5da52d79b84d71_91098907',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc8bb8d5bdc609a0d6c55c4fa3d687a0155f4428' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Banco\\view\\transfer.tpl',
      1 => 1571106165,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5da52d79b84d71_91098907 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">
	<div class="row-sm-4 row-md-6 row-lg-8 row-xl-12">
		<form id="transfer" name="transfer" method="POST" action="">
			
			<br>
		  	<div class="form-group">
		    	<label for="">Value</label>
		    	<input type="text" class="form-control" name="transferInputValue" id="transferInputValue" placeholder="insert the amount to be transfered" required>
		    	<br>
		    	<label for="">Target Agency</label>
		    	<input type="text" class="form-control" name="transferInputAg" id="transferInputAg" placeholder="insert the target agency" required>
		    	<br>
		    	<label for="">Target Account Number</label>
		    	<input type="text" class="form-control" name="transferInputAcc" id="transferInputAcc" placeholder="insert the target account number" required>
		    	<br>
		  	</div>
		   	<button type="submit" class="btn btn-primary mb-2">Confirm</button>  
		</form>
	</div>
</div><?php }
}
