{include file="{$smarty.const.TNTEMPLATE_DIR}header.tpl"}
{include file="navigation.tpl"}
<main class="Site-content">
    <section class="Section">
        <div class="Container">
            <h2 class="Section-heading">Search</h2>
            {include file="{$smarty.const.TNTEMPLATE_DIR}error.tpl"}
            <form action="{$smarty.server.SCRIPT_NAME}" method="get" enctype="multipart/form-data" autocomplete="off">
                <div class="Grid Grid--gutters u-spaceTM Suggestions-reference">
                    <div class="InputCombo Grid-full">
                        <input type="search" id="{$searchKey}" name="{$searchKey}" class="InputCombo-field">
                        <button type="submit" class="InputCombo-button">Search</button>
                    </div>
                    <div class="Suggestions Grid-full u-spaceTN"></div>
            </form>
        </div>
    </section>
    <section class="Section">
        <div class="Container">
            <script src="/hm2ue/imar/js/searchsuggest.js"></script>
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
