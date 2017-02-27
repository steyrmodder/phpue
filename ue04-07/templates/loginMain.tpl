{include file="header.tpl"}
<main class="Site-content">
    <section class="Section">
        <div class="Container">
            {include file="errorMessages.tpl"}
            {include file="statusMessage.tpl"}
            <h2 class="Section-heading">Login</h2>
            <form action="{$smarty.server.SCRIPT_NAME}" method="post" enctype="multipart/form-data">
                <div class="Grid Grid--gutters">
                    <div class="InputCombo Grid-full">
                        <label for="{$email->getName()}" class="InputCombo-label">Email:</label>
                        <input type="text" id="{$email->getName()}" name="{$email->getName()}"
                               value="{$email->getValue()}" class="InputCombo-field">
                    </div>
                    <div class="InputCombo Grid-full">
                        <label for="{$passwordKey}" class="InputCombo-label">Password:</label>
                        <input type="password" id="{$passwordKey}" name="{$passwordKey}" class="InputCombo-field">
                    </div>
                    <div class="Grid-full">
                        <button type="submit" class="Button">Log me in</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section class="Section">
        <div class="Container">
            <h2 class="Section-heading">No account?</h2>
            <p>Register your account <a href="register.php">here.</a></p>
        </div>
    </section>
</main>
{include file="footer.tpl"}