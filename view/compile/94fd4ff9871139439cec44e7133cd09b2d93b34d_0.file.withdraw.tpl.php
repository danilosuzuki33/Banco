<?php
/* Smarty version 3.1.33, created on 2019-10-14 23:22:52
  from 'C:\xampp\htdocs\Banco\view\withdraw.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5da52d7c264149_20568026',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '94fd4ff9871139439cec44e7133cd09b2d93b34d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Banco\\view\\withdraw.tpl',
      1 => 1571106168,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5da52d7c264149_20568026 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">
	<div class="row-sm-4 row-md-6 row-lg-8 row-xl-12">
		<form id="withdraw" name="withdraw" method="POST" action="">
			
			<br>
		  	<div class="form-group">
		    	<label for="">Value</label>
		    	<input type="text" class="form-control" name="withdrawInput" id="withdrawInput" placeholder="insert the amount to be withdrawn" required>
		    	<br>
		  	</div>
		   	<button type="submit" class="btn btn-primary mb-2">Confirm</button>  
		</form>
	</div>
</div><?php }
}
