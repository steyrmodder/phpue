{include file="{$smarty.const.TNTEMPLATE_DIR}header.tpl"}
{include file="navigation.tpl"}
<main class="Site-content">
    <section class="Section">
        <div class="Container">
            {include file="{$smarty.const.TNTEMPLATE_DIR}error.tpl"}
            <h2 class="Section-heading">Add Address</h2>
            <div class="InputCombo Grid-full">
                <form action="{$smarty.server.SCRIPT_NAME}" method="post"  enctype="multipart/form-data">
                    <div class="Grid Grid--gutters">
                        <div class="InputCombo Grid-full">
                            <label for="{$firstnameKey}" class="InputCombo-label">First Name</label>
                            <input type="text" id="{$firstnameKey}" name="{$firstnameKey}" value="{if isset($firstnameValue)}{$firstnameValue}{/if}" class="InputCombo-field">
                        </div>
                        <div class="InputCombo Grid-full">
                            <label for="{$lastnameKey}" class="InputCombo-label">Last Name</label>
                            <input type="text" id="{$lastnameKey}" name="{$lastnameKey}" value="{if isset($lastnameValue)}{$lastnameValue}{/if}" class="InputCombo-field">
                        </div>
                        <div class="InputCombo Grid-full">
                            <label for="{$streetKey}" class="InputCombo-label">Street</label>
                            <input type="text" id="{$streetKey}" name="{$streetKey}" value="{if isset($streetValue)}{$streetValue}{/if}" class="InputCombo-field">
                        </div>
                        <div class="InputCombo Grid-full">
                            <label for="{$zipKey}" class="InputCombo-label">Zip Code</label>
                            <input type="text" id="{$zipKey}" name="{$zipKey}" value="{if isset($zipValue)}{$zipValue}{/if}" class="InputCombo-field">
                        </div>
                        <div class="InputCombo Grid-full">
                            <label for="{$cityKey}" class="InputCombo-label">City</label>
                            <input type="text" id="{$cityKey}" name="{$cityKey}" value="{if isset($cityValue)}{$cityValue}{/if}" class="InputCombo-field">
                        </div>
                        <div class="Grid-full">
                            <button type="submit" class="Button">Save</button>
                        </div>
                    </div>
                </form>
             </div>
        </div>
    </section>
    <section class="Section">
        <script src="/hm2ue/imar/js/addressbook.js"></script>
        <div class="Container">
            <div class="Grid Grid--gutters">
                {foreach $addresses as $entry}
                    <div class="Grid-cell AddressEntry">
                        <div class="AddressEntry-name">
                            <i class="fa fa-user"></i>
                            <span class="AddressEntry-firstName">{$entry['firstname']}</span> <span class="AddressEntry-lastName">{$entry['lastname']}</span>
                        </div>
                        <div class="AddressEntry-address">
                            <i class="fa fa-street-view" aria-hidden="true"></i>
                            <span class="AddressEntry-street">{$entry['street']}</span><br>
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span class="AddressEntry-zip">{$entry['zip']}</span> <span class="AddressEntry-city">{$entry['city']}</span>
                        </div>
                    </div>
                {/foreach}
            </div>
        </div>
    </section>
</main>
{include file="{$smarty.const.TNTEMPLATE_DIR}footer.tpl"}