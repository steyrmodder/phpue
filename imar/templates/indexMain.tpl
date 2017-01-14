{include file="{$smarty.const.TNTEMPLATE_DIR}header.tpl"}
{include file="navigation.tpl"}
<main class="Site-content">
    <section class="Section">
        <div class="Container">
            {include file="{$smarty.const.TNTEMPLATE_DIR}error.tpl"}
            <h2 class="Section-heading">Add Image</h2>
            <div class="InputCombo Grid-full">
                <form action="{$smarty.server.SCRIPT_NAME}" method="post"  enctype="multipart/form-data">
                    <div class="Grid Grid--gutters">
                        <div class="InputCombo Grid-full">
                            <label for="{$imagenameKey}" class="InputCombo-label">Image File</label>
                            <input type="hidden" name="{$maxfilesizeKey}" value="{$maxfilesizeValue}">
                            <input type="file" id="{$imagenameKey}" name="{$imagenameKey}" class="InputCombo-unstyled">
                        </div>
                        <div class="InputCombo Grid-cell">
                            <label for="{$imagetitleKey}" class="InputCombo-label">Image Title</label>
                            <input type="text" id="{$imagetitleKey}" name="{$imagetitleKey}" value="{if isset($imagetitleValue)}{$imagetitleValue}{/if}" class="InputCombo-field">
                        </div>
                        <div class="InputCombo Grid-cell">
                            <label for="{$imageauthorKey}" class="InputCombo-label">Image Author</label>
                            <input type="text" id="{$imageauthorKey}" name="{$imageauthorKey}" value="{if isset($imageauthorValue)}{$imageauthorValue}{/if}" class="InputCombo-field">
                        </div>
                        <div class="InputCombo Grid-full">
                            <label for="{$watermarkKey}" class="InputCombo-label">Add Watermark</label>
                            <input type="checkbox" id="{$watermarkKey}" name="{$watermarkKey}" class="InputCombo-unstyled"{if isset($watermarkChecked)}{$watermarkChecked}{/if}>
                        </div>
                        <div class="Grid-full">
                            <button type="submit" class="Button">Upload</button>
                        </div>
                    </div>
                </form>
             </div>
        </div>
    </section>
    <section class="Section">
        <div class="Container">
            <h2 class="Section-heading">Current Gallery Images</h2>
            <div class="Grid Grid--gutters">
                {foreach $images as $image}
                    <div class="Grid-cell GalleryItem">
                        <div class="GalleryItem-thumb"><img src="{$image['thumbpath']}" alt="{$image['title']}" data-jslghtbx="{$image['imagepath']}"></div>
                        <div class="GalleryItem-title"><i class="fa fa-pencil"></i>{$image['title']}</div>
                        <div class="GalleryItem-author"><i class="fa fa-user"></i>{$image['author']}</div>
                        <div class="GalleryItem-author"><i class="fa fa-upload"></i>{if isset($image['uploadedby'])}{$image['uploadedby']}{/if}</div>
                        <div class="GalleryItem-timestamp">
                            <span class="GalleryItem-date"><i class="fa fa-calendar"></i>{$image['date']}</span>
                            <span class="GalleryItem-time"><i class="fa fa-clock-o"></i>{$image['time']}</span>
                        </div>
                    </div>
                {/foreach}
            </div>
        </div>
    </section>
</main>
{include file="{$smarty.const.TNTEMPLATE_DIR}footer.tpl"}