<?php /* Smarty version 3.1.27, created on 2017-01-13 10:31:08
         compiled from "C:\xampp\htdocs\hm2ue\imar\normform\basetemplates\footer.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:620158789e5c6e8153_14585711%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dba2d51be037d5d9eb697849185e520dbef4c22b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\hm2ue\\imar\\normform\\basetemplates\\footer.tpl',
      1 => 1482311665,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '620158789e5c6e8153_14585711',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58789e5c6f3cd5_71165888',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58789e5c6f3cd5_71165888')) {
function content_58789e5c6f3cd5_71165888 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '620158789e5c6e8153_14585711';
?>
<footer class="Site-footer">
    <div class="Footer Footer--small">
        <p class="Footer-credits">Created and maintained by <a href="mailto:martin.harrer@fh-hagenberg.at">Martin Harrer</a> and <a href="mailto:wolfgang.hochleitner@fh-hagenberg.at">Wolfgang Hochleitner</a>.</p>
        <p class="Footer-version"><?php echo @constant('ICON');
echo @constant('TITLE');?>
 Version 2016</p>
        <p class="Footer-version">Uses: <a href="http://www.smarty.net/">Smarty Templates</a></p>
    </div>
</footer>
<?php echo '<script'; ?>
 src="<?php echo @constant('NORM_DIR');?>
js/lightbox.min.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    var lightbox = new Lightbox();
    lightbox.load();
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
?>