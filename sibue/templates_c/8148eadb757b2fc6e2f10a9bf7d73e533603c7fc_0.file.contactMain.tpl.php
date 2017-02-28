<?php /* Smarty version 3.1.27, created on 2017-02-28 15:46:18
         compiled from "templates\contactMain.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:196132313158b58d3a0d4cf2_86043887%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8148eadb757b2fc6e2f10a9bf7d73e533603c7fc' => 
    array (
      0 => 'templates\\contactMain.tpl',
      1 => 1488290294,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196132313158b58d3a0d4cf2_86043887',
  'variables' => 
  array (
    'result' => 0,
    'key' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58b58d3a16ebd3_67890919',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58b58d3a16ebd3_67890919')) {
function content_58b58d3a16ebd3_67890919 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '196132313158b58d3a0d4cf2_86043887';
echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<main class="Site-content">
    <section class="Section">
        <div class="Container">
            <h2 class="Section-heading">Contact</h2>
            <?php echo $_smarty_tpl->getSubTemplate ("errorMessages.tpl.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

            <?php echo $_smarty_tpl->getSubTemplate ("contactForm.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

        </div>
    </section>
    <section class="Section">
        <div class="Container">
            <h2 class="Section-heading">Result in $_POST</h2>
            <?php if (isset($_smarty_tpl->tpl_vars['result']->value)) {?>
                <table class="Table u-tableW100">
                    <colgroup span="2" class="u-tableW50"></colgroup>
                    <thead>
                    <tr class="Table-row">
                        <th class="Table-header">Key</th>
                        <th class="Table-header">Value</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
$_from = $_smarty_tpl->tpl_vars['result']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['value']->_loop = false;
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$foreach_value_Sav = $_smarty_tpl->tpl_vars['value'];
?>
                        <tr class="Table-row">
                            <td class="Table-data"><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</td>
                            <td class="Table-data"><?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['value']->value, ENT_QUOTES, 'UTF-8', true));?>
</td>
                        </tr>
                    <?php
$_smarty_tpl->tpl_vars['value'] = $foreach_value_Sav;
}
?>
                    </tbody>
                </table>
            <?php }?>
        </div>
    </section>
</main>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>