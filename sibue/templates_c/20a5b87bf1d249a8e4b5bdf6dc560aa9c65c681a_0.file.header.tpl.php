<?php /* Smarty version 3.1.27, created on 2017-02-28 15:46:18
         compiled from "templates\header.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:120227249058b58d3a1b2890_14849021%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20a5b87bf1d249a8e4b5bdf6dc560aa9c65c681a' => 
    array (
      0 => 'templates\\header.tpl',
      1 => 1488284894,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120227249058b58d3a1b2890_14849021',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58b58d3a1e1a22_35429369',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58b58d3a1e1a22_35429369')) {
function content_58b58d3a1e1a22_35429369 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '120227249058b58d3a1b2890_14849021';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo @constant('TITLE');?>
&mdash;<?php echo @constant('SUBTITLE');?>
</title>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo @constant('CSS_DIR');?>
/main.css">
</head>
<body class="Site">
<header class="Site-header">
    <div class="Header Header--small">
        <div class="Header-titles">
            <h1 class="Header-title"><?php echo @constant('ICON');
echo @constant('TITLE');?>
</h1>
            <p class="Header-subtitle"><?php echo @constant('SUBTITLE');?>
</p>
        </div>
        <?php if (isset($_SESSION['ISLOGGEDIN'])) {?>
        <div class="Header-logout">
            You are logged in as  <?php echo $_SESSION['username'];?>
 <a href="<?php echo @constant('LOGOUT');?>
" class="Button u-spaceLM">Logout</a>
        </div>
        <?php }?>
    </div>
</header><?php }
}
?>