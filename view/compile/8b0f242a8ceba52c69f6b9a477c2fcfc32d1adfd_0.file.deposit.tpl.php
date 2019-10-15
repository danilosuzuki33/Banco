<?php
/* Smarty version 3.1.33, created on 2019-10-14 23:22:51
  from 'C:\xampp\htdocs\Banco\view\deposit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5da52d7ba1dea9_75197055',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b0f242a8ceba52c69f6b9a477c2fcfc32d1adfd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Banco\\view\\deposit.tpl',
      1 => 1571106158,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5da52d7ba1dea9_75197055 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">
	<div class="row-sm-4 row-md-6 row-lg-8 row-xl-12">
		<form id="deposit" name="deposit" method="POST" action="">
			
			<br>
		  	<div class="form-group">
		    	<label for="">Value</label>
		    	<input type="text" class="form-control" name="depositInput" id="depoistInput" placeholder="insert the amount to be deposited" required>
		    	<br>
		  	</div>
		   	<button type="submit" class="btn btn-primary mb-2">Confirm</button>  
		</form>
	</div>
</div><?php }
}
