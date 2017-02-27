{include file="header.tpl"}
<main class="Site-content">
    <section class="Section">
        <div class="Container">
            {include file="errorMessages.tpl"}
            {include file="statusMessage.tpl"}
            <h2 class="Section-heading">Add Image</h2>
            <div class="InputCombo Grid-full">
                <form action="{$smarty.server.SCRIPT_NAME}" method="post"  enctype="multipart/form-data">
                    <div class="Grid Grid--gutters">
                        <div class="InputCombo Grid-full">
                            <label for="{$imageUpload}" class="InputCombo-label">Image File</label>
                            <input type="hidden" name="MAX_FILE_SIZE" value="{$maxFileSizeValue}">
                            <input type="file" id="{$imageUpload}" name="{$imageUpload}" class="InputCombo-unstyled">
                        </div>
                        <div class="InputCombo Grid-cell">
                            <label for="{$imageTitle->getName()}" class="InputCombo-label">Image Title</label>
                            <input type="text" id="{$imageTitle->getName()}" name="{$imageTitle->getName()}" value="{$imageTitle->getValue()}" class="InputCombo-field">
                        </div>
                        <div class="InputCombo Grid-cell">
                            <label for="{$imageAuthor->getName()}" class="InputCombo-label">Image Author</label>
                            <input type="text" id="{$imageAuthor->getName()}" name="{$imageAuthor->getName()}" value="{$imageAuthor->getValue()}" class="InputCombo-field">
                        </div>
                        <div class="InputCombo Grid-full">
                            <label for="{$watermark->getName()}" class="InputCombo-label">Add Watermark</label>
                            <input type="checkbox" id="{$watermark->getName()}" name="{$watermark->getName()}" class="InputCombo-unstyled"{$watermark->getValue()}>
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
{include file="footer.tpl"}