<?php /* Smarty version 3.1.27, created on 2017-01-13 16:53:25
         compiled from "c:\Users\p20137\Documents\GitHub\hm2ue\imar\normform\basetemplates\footer.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:253675878f7f53f0475_58336680%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74b1a73d05a13842842feb40a4a46083fbb47a71' => 
    array (
      0 => 'c:\\Users\\p20137\\Documents\\GitHub\\hm2ue\\imar\\normform\\basetemplates\\footer.tpl',
      1 => 1484320040,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '253675878f7f53f0475_58336680',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5878f7f5403d00_00946594',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5878f7f5403d00_00946594')) {
function content_5878f7f5403d00_00946594 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '253675878f7f53f0475_58336680';
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