<?php /* Smarty version 3.1.27, created on 2017-01-10 12:56:31
         compiled from "templates\registerMain.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:48945874cbef0c6915_74990600%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dcfc127c99cb2ce88ddf78b668cbf199d881a842' => 
    array (
      0 => 'templates\\registerMain.tpl',
      1 => 1482310861,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48945874cbef0c6915_74990600',
  'variables' => 
  array (
    'lastnameKey' => 0,
    'lastnameValue' => 0,
    'emailKey' => 0,
    'emailValue' => 0,
    'passwordKey1' => 0,
    'passwordKey2' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5874cbef143927_98991701',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5874cbef143927_98991701')) {
function content_5874cbef143927_98991701 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '48945874cbef0c6915_74990600';
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
                    <label for="<?php echo $_smarty_tpl->tpl_vars['lastnameKey']->value;?>
" class="InputCombo-label">Username:</label>
                    <input type="text" id="<?php echo $_smarty_tpl->tpl_vars['lastnameKey']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['lastnameKey']->value;?>
" value="<?php if (isset($_smarty_tpl->tpl_vars['lastnameValue']->value)) {
echo $_smarty_tpl->tpl_vars['lastnameValue']->value;
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