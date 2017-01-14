<?php /* Smarty version 3.1.27, created on 2017-01-13 16:53:25
         compiled from "templates\navigation.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:314095878f7f5315845_33906183%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd8d40afccdac92bc87f678213f91bc670337efc' => 
    array (
      0 => 'templates\\navigation.tpl',
      1 => 1484310786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '314095878f7f5315845_33906183',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5878f7f53501d6_67274268',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5878f7f53501d6_67274268')) {
function content_5878f7f53501d6_67274268 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '314095878f7f5315845_33906183';
?>
<!-- Styles not needed for IMAR, therefore not in css. So its easier to reuse IMAR -->
<style type="text/css" scoped>
    
        .Navigation {
            text-align: left;
        }
    
</style>
<div class="Header Navigation">
    <nav class="Container">
        <span class="u-spaceRS" > <?php if (!($_SERVER['SCRIPT_NAME'] === "/hm2ue/imar/index.php")) {?> <a href="/hm2ue/imar/index.php">Home</a> <?php }?> </span>
        <span class="u-spaceRS" > <?php if (!($_SERVER['SCRIPT_NAME'] === "/hm2ue/imar/register.php")) {?> <a href="/hm2ue/imar/register.php">Register</a> <?php }?> </span>
        <span class="u-spaceRS" > <?php if (!($_SERVER['SCRIPT_NAME'] === "/hm2ue/imar/addressbook.php")) {?> <a href="/hm2ue/imar/addressbook.php">Address Book</a> <?php }?> </span>
        <span class="u-spaceRS" > <?php if (!($_SERVER['SCRIPT_NAME'] === "/hm2ue/imar/searchsuggest.php")) {?> <a href="/hm2ue/imar/searchsuggest.php">Searchsuggest</a> <?php }?> </span>
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
                        window.open("/hm2ue/normform/demo/demoTNormform.php","_blank");
                        break;
                    case "AddressBook DEMO":
                        window.open("/hm2ue/imar/demo/addressbook/index.php","_blank");
                        break;
                    case "SearchSuggest DEMO":
                        window.open("/hm2ue/imar/demo/searchsuggest/index.html", "_blank");
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