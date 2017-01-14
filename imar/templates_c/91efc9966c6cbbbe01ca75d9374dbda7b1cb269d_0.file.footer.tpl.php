<?php /* Smarty version 3.1.27, created on 2017-01-05 14:03:05
         compiled from "c:\Users\p20137\Documents\GitHub\imar\normform\basetemplates\footer.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:7772586e44096fb5d0_95414156%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '91efc9966c6cbbbe01ca75d9374dbda7b1cb269d' => 
    array (
      0 => 'c:\\Users\\p20137\\Documents\\GitHub\\imar\\normform\\basetemplates\\footer.tpl',
      1 => 1482311665,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7772586e44096fb5d0_95414156',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_586e440972a3d1_82651396',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_586e440972a3d1_82651396')) {
function content_586e440972a3d1_82651396 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '7772586e44096fb5d0_95414156';
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