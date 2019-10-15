<?php
/* Smarty version 3.1.33, created on 2019-10-14 23:21:49
  from 'C:\xampp\htdocs\Banco\view\menu_cliente.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5da52d3ddb8c62_23417486',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bae3885501da6cdd6a9b648b1df7eb7d6b4cba6b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Banco\\view\\menu_cliente.tpl',
      1 => 1571106108,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5da52d3ddb8c62_23417486 (Smarty_Internal_Template $_smarty_tpl) {
?><h4 class="text-center text-danger"> Hi <b><?php echo $_smarty_tpl->tpl_vars['USER']->value;?>
</b>, welcome!</h4> 


<form id="client" name="client" method="POST" action="">
  <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputDate">Date</label>
        <input type="date" class="form-control" id="inputDate" name="inputDate">
      </div>
      <div class="form-group col-md-4">
        <label for="selectAction">Action</label>
        <select id="selectAction" class="form-control" name="selectAction">
          <option selected="selected">Choose</option>
          <option>Deposit</option>
          <option>Transfer</option>
          <option>Withdraw</option>
        </select>
      </div>
      <div class="form-group col-md-2">
        <br>
        <button class="btn btn-success btn-rounded btn" type="submit" id="submitBtn">Search</button>
      </div>
      <br>
  </div>
</form>


<section class="container-fluid">
  <br>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#ID</th>
        <th scope="col">ID User</th>
        <th scope="col">Action</th>
        <th scope="col">ID Action</th>
        <th scope="col">Date</th>
      </tr>
    </thead>
    <tbody>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['GET_HISTORIC']->value, 'H', false, 'i');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['i']->value => $_smarty_tpl->tpl_vars['H']->value) {
?>
      
      <?php if ($_smarty_tpl->tpl_vars['H']->value['action'] == "Deposit") {?>
      <tr class="bg-success">
        <?php } elseif ($_smarty_tpl->tpl_vars['H']->value['action'] == "Transfer") {?>
        <tr class="bg-info">
        <?php } else { ?>
        <tr class="bg-warning">
      <?php }?>

        <th scope="row"> <?php echo $_smarty_tpl->tpl_vars['H']->value['idHistoric'];?>
 </th>
        <td> <?php echo $_smarty_tpl->tpl_vars['H']->value['idUser'];?>
 </td>
        <td> <?php echo $_smarty_tpl->tpl_vars['H']->value['action'];?>
 </td>
        <td> <?php echo $_smarty_tpl->tpl_vars['H']->value['idAction'];?>
 </td>
        <td> <?php echo $_smarty_tpl->tpl_vars['H']->value['date'];?>
 </td>
      </tr>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
  </table>

</section><?php }
}
