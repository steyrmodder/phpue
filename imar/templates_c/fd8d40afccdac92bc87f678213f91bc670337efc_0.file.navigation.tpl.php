<?php /* Smarty version 3.1.27, created on 2017-01-14 14:27:43
         compiled from "templates\navigation.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:32198587a274fdf98c3_38365796%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd8d40afccdac92bc87f678213f91bc670337efc' => 
    array (
      0 => 'templates\\navigation.tpl',
      1 => 1484400446,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32198587a274fdf98c3_38365796',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_587a274fe6ad68_31604985',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_587a274fe6ad68_31604985')) {
function content_587a274fe6ad68_31604985 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '32198587a274fdf98c3_38365796';
?>
<!-- Styles not needed for IMAR, therefore not in css. So its easier to reuse IMAR -->
<style type="text/css" scoped>
    
        .Navigation {
            text-align: left;
        }
    
</style>
<div class="Header Navigation">
    <nav class="Container">
        <span class="u-spaceRS" > <?php if (!($_SERVER['SCRIPT_NAME'] === "/phpue/imar/index.php")) {?> <a href="/phpue/imar/index.php">Home</a> <?php }?> </span>
        <span class="u-spaceRS" > <?php if (!($_SERVER['SCRIPT_NAME'] === "/phpue/imar/register.php")) {?> <a href="/phpue/imar/register.php">Register</a> <?php }?> </span>
        <span class="u-spaceRS" > <?php if (!($_SERVER['SCRIPT_NAME'] === "/phpue/imar/addressbook.php")) {?> <a href="/phpue/imar/addressbook.php">Address Book</a> <?php }?> </span>
        <span class="u-spaceRS" > <?php if (!($_SERVER['SCRIPT_NAME'] === "/phpue/imar/searchsuggest.php")) {?> <a href="/phpue/imar/searchsuggest.php">Searchsuggest</a> <?php }?> </span>
        <label for"pulldown">DEMOS</label>
        <select id="pulldown" size="1" onchange="javascript:handleSelect(this)">
            <option >Select a DEMO</option>
            <option >Normform DEMO</option>
            <option >AddressBook DEMO</option>
            <option >SearchSuggest DEMO</option>
        </select>
        <?php echo '<script'; ?>
 type="text/javascript">
            function handleSelect(demo)
            {
                switch(demo.value) {
                    case "Normform DEMO":
                        window.open("/phpue/imar/normform/demo/demoTNormform.php","_blank");
                        break;
                    case "AddressBook DEMO":
                        window.open("/phpue/imar/demo/addressbook/index.php","_blank");
                        break;
                    case "SearchSuggest DEMO":
                        window.open("/phpue/imar/demo/searchsuggest/index.html", "_blank");
                        break;
                    default:
                        window.location = "index.php";
                }
            }
        <?php echo '</script'; ?>
>
    </nav>
</div>
<?php }
}
?>