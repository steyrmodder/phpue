{include file="{$smarty.const.TNTEMPLATE_DIR}header.tpl"}
{include file="navigation.tpl"}
<main class="Site-content">
    <section class="Section">
        <div class="Container">
            <h2 class="Section-heading">Login</h2>
            {include file="{$smarty.const.TNTEMPLATE_DIR}error.tpl"}
            <form action="{$smarty.server.SCRIPT_NAME}" method="post" enctype="multipart/form-data">
                <div class="InputCombo Grid-full">
                    <label for="{$emailKey}" class="InputCombo-label">Email:</label>
                    <input type="text" id="{$emailKey}" name="{$emailKey}" value="{if isset($emailValue)}{$emailValue}{/if}" class="InputCombo-field">
                </div>
                <div class="InputCombo Grid-full">
                    <label for="{$passwordKey}" class="InputCombo-label">Password:</label>
                    <input type="password" id="{$passwordKey}" name="{$passwordKey}" class="InputCombo-field">
                </div>
                <div class="Grid-full">
                    <button type="submit" class="Button">Log me in</button>
                </div>
            </form>
        </div>
    </section>
    <section class="Section">
        <div class="Container">
            <h2 class="Section-heading">No account<i class="fa fa-question"></i></h2>
            <p>Register your OnlineShop account <a href="register.php">here</a></p>
        </div>
    </section>
</main>
{include file="{$smarty.const.TNTEMPLATE_DIR}footer.tpl"}
