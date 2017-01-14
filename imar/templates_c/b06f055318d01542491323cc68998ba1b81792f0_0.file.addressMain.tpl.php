<?php /* Smarty version 3.1.27, created on 2017-01-14 09:32:54
         compiled from "templates\addressMain.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:62705879e236bad930_07765991%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b06f055318d01542491323cc68998ba1b81792f0' => 
    array (
      0 => 'templates\\addressMain.tpl',
      1 => 1484382760,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '62705879e236bad930_07765991',
  'variables' => 
  array (
    'firstnameKey' => 0,
    'firstnameValue' => 0,
    'lastnameKey' => 0,
    'lastnameValue' => 0,
    'streetKey' => 0,
    'streetValue' => 0,
    'zipKey' => 0,
    'zipValue' => 0,
    'cityKey' => 0,
    'cityValue' => 0,
    'addresses' => 0,
    'entry' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5879e236cbb1f9_69248590',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5879e236cbb1f9_69248590')) {
function content_5879e236cbb1f9_69248590 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '62705879e236bad930_07765991';
echo $_smarty_tpl->getSubTemplate (((string)@constant('TNTEMPLATE_DIR'))."header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php echo $_smarty_tpl->getSubTemplate ("navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<main class="Site-content">
    <section class="Section">
        <div class="Container">
            <?php echo $_smarty_tpl->getSubTemplate (((string)@constant('TNTEMPLATE_DIR'))."error.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

            <h2 class="Section-heading">Add Address</h2>
            <div class="InputCombo Grid-full">
                <form action="<?php echo $_SERVER['SCRIPT_NAME'];?>
" method="post"  enctype="multipart/form-data">
                    <div class="Grid Grid--gutters">
                        <div class="InputCombo Grid-full">
                            <label for="<?php echo $_smarty_tpl->tpl_vars['firstnameKey']->value;?>
" class="InputCombo-label">First Name</label>
                            <input type="text" id="<?php echo $_smarty_tpl->tpl_vars['firstnameKey']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['firstnameKey']->value;?>
" value="<?php if (isset($_smarty_tpl->tpl_vars['firstnameValue']->value)) {
echo $_smarty_tpl->tpl_vars['firstnameValue']->value;
}?>" class="InputCombo-field">
                        </div>
                        <div class="InputCombo Grid-full">
                            <label for="<?php echo $_smarty_tpl->tpl_vars['lastnameKey']->value;?>
" class="InputCombo-label">Last Name</label>
                            <input type="text" id="<?php echo $_smarty_tpl->tpl_vars['lastnameKey']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['lastnameKey']->value;?>
" value="<?php if (isset($_smarty_tpl->tpl_vars['lastnameValue']->value)) {
echo $_smarty_tpl->tpl_vars['lastnameValue']->value;
}?>" class="InputCombo-field">
                        </div>
                        <div class="InputCombo Grid-full">
                            <label for="<?php echo $_smarty_tpl->tpl_vars['streetKey']->value;?>
" class="InputCombo-label">Street</label>
                            <input type="text" id="<?php echo $_smarty_tpl->tpl_vars['streetKey']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['streetKey']->value;?>
" value="<?php if (isset($_smarty_tpl->tpl_vars['streetValue']->value)) {
echo $_smarty_tpl->tpl_vars['streetValue']->value;
}?>" class="InputCombo-field">
                        </div>
                        <div class="InputCombo Grid-full">
                            <label for="<?php echo $_smarty_tpl->tpl_vars['zipKey']->value;?>
" class="InputCombo-label">Zip Code</label>
                            <input type="text" id="<?php echo $_smarty_tpl->tpl_vars['zipKey']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['zipKey']->value;?>
" value="<?php if (isset($_smarty_tpl->tpl_vars['zipValue']->value)) {
echo $_smarty_tpl->tpl_vars['zipValue']->value;
}?>" class="InputCombo-field">
                        </div>
                        <div class="InputCombo Grid-full">
                            <label for="<?php echo $_smarty_tpl->tpl_vars['cityKey']->value;?>
" class="InputCombo-label">City</label>
                            <input type="text" id="<?php echo $_smarty_tpl->tpl_vars['cityKey']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['cityKey']->value;?>
" value="<?php if (isset($_smarty_tpl->tpl_vars['cityValue']->value)) {
echo $_smarty_tpl->tpl_vars['cityValue']->value;
}?>" class="InputCombo-field">
                        </div>
                        <div class="Grid-full">
                            <button type="submit" class="Button">Save</button>
                        </div>
                    </div>
                </form>
             </div>
        </div>
    </section>
    <section class="Section">
        <div class="Container">
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

}
}
?>