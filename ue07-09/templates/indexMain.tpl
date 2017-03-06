{include file="header.tpl"}
<main class="Site-content">
    <section class="Section">
        <div class="Container">
            <h2 class="Section-heading">Create a New Entry</h2>
            {include file="errorMessages.tpl"}
            {include file="statusMessage.tpl"}
            <form action="{$smarty.server.SCRIPT_NAME}" method="post">
                <div class="Grid Grid--gutters">
                    <div class="InputCombo Grid-full">
                        <label for="{$lastName->getName()}" class="InputCombo-label">Last Name*</label>
                        <input type="text" id="{$lastName->getName()}" name="{$lastName->getName()}"
                               value="{$lastName->getValue()}" class="InputCombo-field">
                    </div>
                    <div class="InputCombo Grid-full">
                        <label for="{$firstName->getName()}" class="InputCombo-label">First Name*</label>
                        <input type="text" id="{$firstName->getName()}" name="{$firstName->getName()}"
                               value="{$firstName->getValue()}" class="InputCombo-field">
                    </div>
                    <div class="InputCombo Grid-full">
                        <label for="{$street->getName()}" class="InputCombo-label">Street*</label>
                        <input type="text" id="{$street->getName()}" name="{$street->getName()}"
                               value="{$street->getValue()}" class="InputCombo-field">
                    </div>
                    <div class="InputCombo Grid-full">
                        <label for="{$zip->getName()}" class="InputCombo-label">Zip Code*</label>
                        <input type="text" id="{$zip->getName()}" name="{$zip->getName()}"
                               value="{$zip->getValue()}" class="InputCombo-field">
                    </div>
                    <div class="InputCombo Grid-full">
                        <label for="{$city->getName()}" class="InputCombo-label">City*</label>
                        <input type="text" id="{$city->getName()}" name="{$city->getName()}"
                               value="{$city->getValue()}" class="InputCombo-field">
                    </div>
                    <div class="Grid-full">
                        <button type="submit" class="Button">Save</button>
                    </div>
                </div>
            </form>
            <form action="{$smarty.server.SCRIPT_NAME}" method="get" autocomplete="off">
                <div class="Grid Grid--gutters u-spaceTM Suggestions-reference">
                    <div class="InputCombo Grid-full">
                        <label for="{$searchKey}" class="InputCombo-label">Search</label>
                        <input type="search" id="{$searchKey}" name="{$searchKey}" class="InputCombo-field">
                        <button type="submit" class="InputCombo-button">Search</button>
                    </div>
                    <div class="Grid-full">
                        <div class="Suggestions"></div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section class="Section">
        <div class="Container">
            <h2 class="Section-heading">All Addresses</h2>
            <div class="Grid Grid--gutters">
                {foreach $addresses as $entry}
                    <div class="Grid-cell">
                        <div class="AddressEntry">
                            <div class="AddressEntry-name">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="AddressEntry-firstName">{$entry["lastName"]}</span> <span
                                        class="AddressEntry-lastName">{$entry["firstName"]}</span>
                            </div>
                            <div class="AddressEntry-address">
                                <i class="fa fa-street-view" aria-hidden="true"></i>
                                <span class="AddressEntry-street">{$entry["street"]}</span><br>
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span class="AddressEntry-zip">{$entry["zip"]}</span> <span
                                        class="AddressEntry-city">{$entry["city"]}</span>
                            </div>
                        </div>
                    </div>
                {/foreach}
            </div>
        </div>
    </section>
</main>
{include file="footer.tpl"}