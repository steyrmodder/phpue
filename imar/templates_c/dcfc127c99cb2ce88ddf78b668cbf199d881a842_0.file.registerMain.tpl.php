<?php /* Smarty version 3.1.27, created on 2017-01-14 14:25:58
         compiled from "templates\registerMain.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:24676587a26e6e247f1_93574020%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dcfc127c99cb2ce88ddf78b668cbf199d881a842' => 
    array (
      0 => 'templates\\registerMain.tpl',
      1 => 1484394507,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24676587a26e6e247f1_93574020',
  'variables' => 
  array (
    'usernameKey' => 0,
    'usernameValue' => 0,
    'emailKey' => 0,
    'emailValue' => 0,
    'passwordKey1' => 0,
    'passwordKey2' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_587a26e6e9d996_65976692',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_587a26e6e9d996_65976692')) {
function content_587a26e6e9d996_65976692 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '24676587a26e6e247f1_93574020';
echo $_smarty_tpl->getSubTemplate (((string)@constant('TNTEMPLATE_DIR'))."header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php echo $_smarty_tpl->getSubTemplate ("navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<main class="Site-content">
    <section class="Section">
        <div class="Container">
            <h2 class="Section-heading">Register for an IMAR account</h2>
            <?php echo $_smarty_tpl->getSubTemplate (((string)@constant('TNTEMPLATE_DIR'))."error.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

            <form action="<?php echo $_SERVER['SCRIPT_NAME'];?>
" method="post" enctype="multipart/form-data">
                <div class="InputCombo Grid-full">
                    <label for="<?php echo $_smarty_tpl->tpl_vars['usernameKey']->value;?>
" class="InputCombo-label">Username:</label>
                    <input type="text" id="<?php echo $_smarty_tpl->tpl_vars['usernameKey']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['usernameKey']->value;?>
" value="<?php if (isset($_smarty_tpl->tpl_vars['usernameValue']->value)) {
echo $_smarty_tpl->tpl_vars['usernameValue']->value;
}?>" class="InputCombo-field">
                </div>
                <div class="InputCombo Grid-full">
                    <label for="<?php echo $_smarty_tpl->tpl_vars['emailKey']->value;?>
" class="InputCombo-label">Email:</label>
                    <input type="text" id="<?php echo $_smarty_tpl->tpl_vars['emailKey']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['emailKey']->value;?>
" value="<?php if (isset($_smarty_tpl->tpl_vars['emailValue']->value)) {
echo $_smarty_tpl->tpl_vars['emailValue']->value;
}?>" class="InputCombo-field">
                </div>
                <div class="InputCombo Grid-full">
                    <label for="<?php echo $_smarty_tpl->tpl_vars['passwordKey1']->value;?>
" class="InputCombo-label">Password:</label>
                    <input type="password" id="<?php echo $_smarty_tpl->tpl_vars['passwordKey1']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['passwordKey1']->value;?>
"" class="InputCombo-field">
                </div>
                <div class="InputCombo Grid-full">
                    <label for="<?php echo $_smarty_tpl->tpl_vars['passwordKey2']->value;?>
" class="InputCombo-label">Repeat Password:</label>
                    <input type="password" id="<?php echo $_smarty_tpl->tpl_vars['passwordKey2']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['passwordKey2']->value;?>
" class="InputCombo-field">
                </div>
                <div class="Grid-full">
                    <button type="submit" class="Button">Create my account</button>
                </div>
            </form>
        </div>
    </section>
    <section class="Section">
        <div class="Container">
            <h2 class="Section-heading">Already registered<i class="fa fa-question"></i></h2>
            <p>Use your existing IMAR account to login <a href="login.php">here</a></p>
        </div>
    </section>
</main>
<?php echo $_smarty_tpl->getSubTemplate (((string)@constant('TNTEMPLATE_DIR'))."footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>