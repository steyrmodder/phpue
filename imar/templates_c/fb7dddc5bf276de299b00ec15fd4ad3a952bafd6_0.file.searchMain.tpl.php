<?php /* Smarty version 3.1.27, created on 2017-01-13 17:00:54
         compiled from "templates\searchMain.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:71405878f9b6c299a5_22816842%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fb7dddc5bf276de299b00ec15fd4ad3a952bafd6' => 
    array (
      0 => 'templates\\searchMain.tpl',
      1 => 1484323248,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '71405878f9b6c299a5_22816842',
  'variables' => 
  array (
    'searchKey' => 0,
    'addresses' => 0,
    'entry' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5878f9b6cbe0d3_60377891',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5878f9b6cbe0d3_60377891')) {
function content_5878f9b6cbe0d3_60377891 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '71405878f9b6c299a5_22816842';
echo $_smarty_tpl->getSubTemplate (((string)@constant('TNTEMPLATE_DIR'))."header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php echo $_smarty_tpl->getSubTemplate ("navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<main class="Site-content">
    <section class="Section">
        <div class="Container">
            <h2 class="Section-heading">Search</h2>
            <?php echo $_smarty_tpl->getSubTemplate (((string)@constant('TNTEMPLATE_DIR'))."error.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

            <form action="<?php echo $_SERVER['SCRIPT_NAME'];?>
" method="get" enctype="multipart/form-data" autocomplete="off">
                <div class="Grid Grid--gutters u-spaceTM Suggestions-reference">
                    <div class="InputCombo Grid-full">
                        <input type="search" id="<?php echo $_smarty_tpl->tpl_vars['searchKey']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['searchKey']->value;?>
" class="InputCombo-field">
                        <button type="submit" class="InputCombo-button">Search</button>
                    </div>
                    <div class="Suggestions Grid-full u-spaceTN"></div>
            </form>
        </div>
    </section>
    <section class="Section">
        <div class="Container">
            <?php echo '<script'; ?>
 src="/hm2ue/imar/js/searchsuggest.js"><?php echo '</script'; ?>
>
            <div class="Grid Grid--gutters">
                <?php
$_from = $_smarty_tpl->tpl_vars['addresses']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['entry'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['entry']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['entry']->value) {
$_smarty_tpl->tpl_vars['entry']->_loop = true;
$foreach_entry_Sav = $_smarty_tpl->tpl_vars['entry'];
?>
                    <div class="Grid-cell AddressEntry">
                        <div class="AddressEntry-name">
                            <i class="fa fa-user"></i>
                            <span class="AddressEntry-firstName"><?php echo $_smarty_tpl->tpl_vars['entry']->value['firstname'];?>
</span> <span class="AddressEntry-lastName"><?php echo $_smarty_tpl->tpl_vars['entry']->value['lastname'];?>
</span>
                        </div>
                        <div class="AddressEntry-address">
                            <i class="fa fa-street-view" aria-hidden="true"></i>
                            <span class="AddressEntry-street"><?php echo $_smarty_tpl->tpl_vars['entry']->value['street'];?>
</span><br>
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span class="AddressEntry-zip"><?php echo $_smarty_tpl->tpl_vars['entry']->value['zip'];?>
</span> <span class="AddressEntry-city"><?php echo $_smarty_tpl->tpl_vars['entry']->value['city'];?>
</span>
                        </div>
                    </div>
                <?php
$_smarty_tpl->tpl_vars['entry'] = $foreach_entry_Sav;
}
?>
            </div>
        </div>
    </section>
</main>
<?php echo $_smarty_tpl->getSubTemplate (((string)@constant('TNTEMPLATE_DIR'))."footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php }
}
?>