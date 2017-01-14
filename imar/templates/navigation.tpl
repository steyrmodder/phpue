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
        <span class="u-spaceRS" > {if !($smarty.server.SCRIPT_NAME === "/phpue/imar/index.php")} <a href="/phpue/imar/index.php">Home</a> {/if} </span>
        <span class="u-spaceRS" > {if !($smarty.server.SCRIPT_NAME === "/phpue/imar/register.php")} <a href="/phpue/imar/register.php">Register</a> {/if} </span>
        <span class="u-spaceRS" > {if !($smarty.server.SCRIPT_NAME === "/phpue/imar/addressbook.php")} <a href="/phpue/imar/addressbook.php">Address Book</a> {/if} </span>
        <span class="u-spaceRS" > {if !($smarty.server.SCRIPT_NAME === "/phpue/imar/searchsuggest.php")} <a href="/phpue/imar/searchsuggest.php">Searchsuggest</a> {/if} </span>
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
                        window.open("/phpue/imar/normform/demo/demoTNormform.php","_blank");
                        break;
                    case "AddressBook DEMO":
                        window.open("/phpue/imar/demo/addressbook/index.php","_blank");
                        break;
                    case "SearchSuggest DEMO":
                        window.open("/phpue/imar/demo/searchsuggest/index.html", "_blank");
                        break;
                    default:
                        window.location = "index.php";
                }
            }
        </script>
    </nav>
</div>
