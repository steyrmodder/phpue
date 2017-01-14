<?php /* Smarty version 3.1.27, created on 2017-01-14 09:32:54
         compiled from "c:\Users\p20137\Documents\GitHub\phpue\imar\normform\basetemplates\header.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:4795879e236d09401_76718043%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce69025f06e160cb24a8af47e749184253e79525' => 
    array (
      0 => 'c:\\Users\\p20137\\Documents\\GitHub\\phpue\\imar\\normform\\basetemplates\\header.tpl',
      1 => 1484382760,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4795879e236d09401_76718043',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5879e236d47c19_26984405',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5879e236d47c19_26984405')) {
function content_5879e236d47c19_26984405 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '4795879e236d09401_76718043';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo @constant('TITLE');?>
</title>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo @constant('CSS_DIR');?>
/main.css">
    <?php echo '<script'; ?>
 src="/phpue/imar/normform/js/jquery-3.1.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/phpue/imar/js/addressbook.js"><?php echo '</script'; ?>
>
</head>
<body class="Site">
<header class="Site-header">
    <div class="Header Header--small">
        <div class="Header-titles">
            <h1 class="Header-title"><a href="index.php"><?php echo @constant('ICON');
echo @constant('TITLE');?>
</a></h1>
            <p class="Header-subtitle"><?php echo @constant('SUBTITLE');?>
</p>
        </div>
        <div class="Header-logout">
            <?php if (isset($_SESSION[ISLOGGEDIN])) {?><span> Your are Logged In as <?php if (isset($_SESSION['first_name'])) {
echo $_SESSION['first_name'];
}?> <?php if (isset($_SESSION['last_name'])) {
echo $_SESSION['last_name'];
}?> : <a href="logout.php">Logout</a></span> <?php } else { ?><span> <a href="login.php">Login</a></span> <?php }?><span></span>
        </div>
    </div>
</header><?php }
}
?>