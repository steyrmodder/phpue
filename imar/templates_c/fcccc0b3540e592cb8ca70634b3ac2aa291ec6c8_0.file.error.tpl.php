<?php /* Smarty version 3.1.27, created on 2017-01-13 10:31:08
         compiled from "C:\xampp\htdocs\hm2ue\imar\normform\basetemplates\error.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:204858789e5c699f47_86662111%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fcccc0b3540e592cb8ca70634b3ac2aa291ec6c8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\hm2ue\\imar\\normform\\basetemplates\\error.tpl',
      1 => 1473670348,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204858789e5c699f47_86662111',
  'variables' => 
  array (
    'errorMessages' => 0,
    'error' => 0,
    'statusMessage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58789e5c6c1047_97720426',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58789e5c6c1047_97720426')) {
function content_58789e5c6c1047_97720426 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '204858789e5c699f47_86662111';
if (count($_smarty_tpl->tpl_vars['errorMessages']->value) > 0) {?>
    <div class="Error">
        <ul class="Error-list">
            <?php
$_from = $_smarty_tpl->tpl_vars['errorMessages']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['error'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['error']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->_loop = true;
$foreach_error_Sav = $_smarty_tpl->tpl_vars['error'];
?>
                <li class="Error-listItem"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</li>
            <?php
$_smarty_tpl->tpl_vars['error'] = $foreach_error_Sav;
}
?>
        </ul>
    </div>
<?php }?>
<?php if (strlen($_smarty_tpl->tpl_vars['statusMessage']->value) != 0) {?>
<div class="Status">
    <p class="Status-message"><i class="fa fa-check"></i><?php echo $_smarty_tpl->tpl_vars['statusMessage']->value;?>
</p>
</div>
<?php }
}
}
?>