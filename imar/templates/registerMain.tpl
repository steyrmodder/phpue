{include file="{$smarty.const.TNTEMPLATE_DIR}header.tpl"}
{include file="navigation.tpl"}
<main class="Site-content">
    <section class="Section">
        <div class="Container">
            <h2 class="Section-heading">Register for an IMAR account</h2>
            {include file="{$smarty.const.TNTEMPLATE_DIR}error.tpl"}
            <form action="{$smarty.server.SCRIPT_NAME}" method="post" enctype="multipart/form-data">
                <div class="InputCombo Grid-full">
                    <label for="{$usernameKey}" class="InputCombo-label">Username:</label>
                    <input type="text" id="{$usernameKey}" name="{$usernameKey}" value="{if isset($usernameValue)}{$usernameValue}{/if}" class="InputCombo-field">
                </div>
                <div class="InputCombo Grid-full">
                    <label for="{$emailKey}" class="InputCombo-label">Email:</label>
                    <input type="text" id="{$emailKey}" name="{$emailKey}" value="{if isset($emailValue)}{$emailValue}{/if}" class="InputCombo-field">
                </div>
                <div class="InputCombo Grid-full">
                    <label for="{$passwordKey1}" class="InputCombo-label">Password:</label>
                    <input type="password" id="{$passwordKey1}" name="{$passwordKey1}"" class="InputCombo-field">
                </div>
                <div class="InputCombo Grid-full">
                    <label for="{$passwordKey2}" class="InputCombo-label">Repeat Password:</label>
                    <input type="password" id="{$passwordKey2}" name="{$passwordKey2}" class="InputCombo-field">
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
{include file="{$smarty.const.TNTEMPLATE_DIR}footer.tpl"}