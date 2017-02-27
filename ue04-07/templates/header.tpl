<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{$smarty.const.TITLE}&mdash;{$smarty.const.SUBTITLE}</title>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{$smarty.const.CSS_DIR}/main.css">
</head>
<body class="Site">
<header class="Site-header">
    <div class="Header Header--small">
        <div class="Header-titles">
            <h1 class="Header-title">{$smarty.const.ICON}{$smarty.const.TITLE}</h1>
            <p class="Header-subtitle">{$smarty.const.SUBTITLE}</p>
        </div>
        <div class="Header-logout">
            {if isset($smarty.session.ISLOGGEDIN)}You are logged in as {if isset($smarty.session.first_name)}{$smarty.session.first_name}{/if} {if isset($smarty.session.last_name)}{$smarty.session.last_name}{/if} <a href="logout.php" class="Button u-spaceLM">Logout</a></span> {else}<a href="login.php" class="Button u-spaceLM">Login</a>{/if}
        </div>
    </div>
</header>