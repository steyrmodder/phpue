<!-- Styles not needed for IMAR, therefore not in css. So its easier to reuse IMAR -->
<style type="text/css" scoped>
    {literal}
        .Navigation {
            text-align: left;
        }
    {/literal}
</style>
<div class="Header Navigation">
    <nav class="Container">
        <span class="u-spaceRS" > {if !($smarty.server.SCRIPT_NAME === "/hm2ue/imar/index.php")} <a href="/hm2ue/imar/index.php">Home</a> {/if} </span>
        <span class="u-spaceRS" > {if !($smarty.server.SCRIPT_NAME === "/hm2ue/imar/register.php")} <a href="/hm2ue/imar/register.php">Register</a> {/if} </span>
        <span class="u-spaceRS" > {if !($smarty.server.SCRIPT_NAME === "/hm2ue/imar/addressbook.php")} <a href="/hm2ue/imar/addressbook.php">Address Book</a> {/if} </span>
        <span class="u-spaceRS" > {if !($smarty.server.SCRIPT_NAME === "/hm2ue/imar/searchsuggest.php")} <a href="/hm2ue/imar/searchsuggest.php">Searchsuggest</a> {/if} </span>
        <label for"pulldown">DEMOS</label>
        <select id="pulldown" size="1" onchange="javascript:handleSelect(this)">
            <option >Select a DEMO</option>
            <option >Normform DEMO</option>
            <option >AddressBook DEMO</option>
            <option >SearchSuggest DEMO</option>
        </select>
        <script type="text/javascript">
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
        </script>
    </nav>
</div>
