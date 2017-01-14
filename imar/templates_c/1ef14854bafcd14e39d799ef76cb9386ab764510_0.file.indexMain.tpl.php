<?php /* Smarty version 3.1.27, created on 2017-01-05 14:33:28
         compiled from "templates\indexMain.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:32346586e4b28c21ab6_07438876%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ef14854bafcd14e39d799ef76cb9386ab764510' => 
    array (
      0 => 'templates\\indexMain.tpl',
      1 => 1483426680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32346586e4b28c21ab6_07438876',
  'variables' => 
  array (
    'imagenameKey' => 0,
    'maxfilesizeKey' => 0,
    'maxfilesizeValue' => 0,
    'imagetitleKey' => 0,
    'imagetitleValue' => 0,
    'imageauthorKey' => 0,
    'imageauthorValue' => 0,
    'watermarkKey' => 0,
    'watermarkChecked' => 0,
    'images' => 0,
    'image' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_586e4b28cd9461_23381890',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_586e4b28cd9461_23381890')) {
function content_586e4b28cd9461_23381890 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '32346586e4b28c21ab6_07438876';
echo $_smarty_tpl->getSubTemplate (((string)@constant('TNTEMPLATE_DIR'))."header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php echo $_smarty_tpl->getSubTemplate ("navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<main class="Site-content">
    <section class="Section">
        <div class="Container">
            <?php echo $_smarty_tpl->getSubTemplate (((string)@constant('TNTEMPLATE_DIR'))."error.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

            <h2 class="Section-heading">Add Image</h2>
            <div class="InputCombo Grid-full">
                <form action="<?php echo $_SERVER['SCRIPT_NAME'];?>
" method="post"  enctype="multipart/form-data">
                    <div class="Grid Grid--gutters">
                        <div class="InputCombo Grid-full">
                            <label for="<?php echo $_smarty_tpl->tpl_vars['imagenameKey']->value;?>
" class="InputCombo-label">Image File</label>
                            <input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['maxfilesizeKey']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['maxfilesizeValue']->value;?>
">
                            <input type="file" id="<?php echo $_smarty_tpl->tpl_vars['imagenameKey']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['imagenameKey']->value;?>
" class="InputCombo-unstyled">
                        </div>
                        <div class="InputCombo Grid-cell">
                            <label for="<?php echo $_smarty_tpl->tpl_vars['imagetitleKey']->value;?>
" class="InputCombo-label">Image Title</label>
                            <input type="text" id="<?php echo $_smarty_tpl->tpl_vars['imagetitleKey']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['imagetitleKey']->value;?>
" value="<?php if (isset($_smarty_tpl->tpl_vars['imagetitleValue']->value)) {
echo $_smarty_tpl->tpl_vars['imagetitleValue']->value;
}?>" class="InputCombo-field">
                        </div>
                        <div class="InputCombo Grid-cell">
                            <label for="<?php echo $_smarty_tpl->tpl_vars['imageauthorKey']->value;?>
" class="InputCombo-label">Image Author</label>
                            <input type="text" id="<?php echo $_smarty_tpl->tpl_vars['imageauthorKey']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['imageauthorKey']->value;?>
" value="<?php if (isset($_smarty_tpl->tpl_vars['imageauthorValue']->value)) {
echo $_smarty_tpl->tpl_vars['imageauthorValue']->value;
}?>" class="InputCombo-field">
                        </div>
                        <div class="InputCombo Grid-full">
                            <label for="<?php echo $_smarty_tpl->tpl_vars['watermarkKey']->value;?>
" class="InputCombo-label">Add Watermark</label>
                            <input type="checkbox" id="<?php echo $_smarty_tpl->tpl_vars['watermarkKey']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['watermarkKey']->value;?>
" class="InputCombo-unstyled"<?php if (isset($_smarty_tpl->tpl_vars['watermarkChecked']->value)) {
echo $_smarty_tpl->tpl_vars['watermarkChecked']->value;
}?>>
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
                <?php
$_from = $_smarty_tpl->tpl_vars['images']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['image'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['image']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
$foreach_image_Sav = $_smarty_tpl->tpl_vars['image'];
?>
                    <div class="Grid-cell GalleryItem">
                        <div class="GalleryItem-thumb"><img src="<?php echo $_smarty_tpl->tpl_vars['image']->value['thumbpath'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['image']->value['title'];?>
" data-jslghtbx="<?php echo $_smarty_tpl->tpl_vars['image']->value['imagepath'];?>
"></div>
                        <div class="GalleryItem-title"><i class="fa fa-pencil"></i><?php echo $_smarty_tpl->tpl_vars['image']->value['title'];?>
</div>
                        <div class="GalleryItem-author"><i class="fa fa-user"></i><?php echo $_smarty_tpl->tpl_vars['image']->value['author'];?>
</div>
                        <div class="GalleryItem-author"><i class="fa fa-upload"></i><?php if (isset($_smarty_tpl->tpl_vars['image']->value['uploadedby'])) {
echo $_smarty_tpl->tpl_vars['image']->value['uploadedby'];
}?></div>
                        <div class="GalleryItem-timestamp">
                            <span class="GalleryItem-date"><i class="fa fa-calendar"></i><?php echo $_smarty_tpl->tpl_vars['image']->value['date'];?>
</span>
                            <span class="GalleryItem-time"><i class="fa fa-clock-o"></i><?php echo $_smarty_tpl->tpl_vars['image']->value['time'];?>
</span>
                        </div>
                    </div>
                <?php
$_smarty_tpl->tpl_vars['image'] = $foreach_image_Sav;
}
?>
            </div>
        </div>
    </section>
</main>
<?php echo $_smarty_tpl->getSubTemplate (((string)@constant('TNTEMPLATE_DIR'))."footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>