<?php

/**
 * Implements base functionality for processing images using the GD graphics library.
 *
 * This class deals with the tasks of creating Thumbnails and saving images in different formats by using the features
 * of the GD graphics library. There is also a helper method for checking if a file that's been uploaded to $_FILES is a
 * supported image. Adding an uploaded image (addImage()) is located in index.php since it only deals with storing an
 * uploaded image file and does not perform graphics operations using GD.
 *
 * @author Wolfgang Hochleitner <wolfgang.hochleitner@fh-hagenberg.at>
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @version 2017
 */
class ImageProcessing
{
    /**
     * @var int THUMBNAIL_SIZE The (square) size of an image thumbnail.
     */
    const THUMBNAIL_SIZE = 100;

    /**
     * @var string FONT_DIRECTORY The directory containing the font(s) for usage with GD library.
     */
    const FONT_DIRECTORY = "fonts";

    /**
     * @var string FONT_FILENAME The currently used standard font.
     */
    const FONT_FILENAME = "Open Sans 600.ttf";

    /**
     * Creates a new ImageProcessing instance.
     */
    public function __construct()
    {
        // Intentionally left empty
    }

    /**
     * Checks if an uploaded image is actually a supported image type. First, the MIME type is check (quick, dirty and
     * not very reliable, but fast). Then exif_imagetype() further determines if it is an image.
     * @param string $name The name of the entry in the $_FILES array.
     * @return bool Returns true if the uploaded file is an image, otherwise false.
     */
    public function isImage(string $name): bool
    {
        if (substr($_FILES[$name]["type"], 0, 6) === "image/" && exif_imagetype($_FILES[$name]["tmp_name"])) {
            return true;
        }
        return false;
    }

    /**
     * Creates a new thumbnail from an uploaded image. If the format is supported by GD library, a small version is
     * created. If not, a default thumbnail with standard text.
     * @param string $imagePath The full path to the original image.
     * @param string $thumbPath The full path to where the thumbnail should be generated.
     * @param string $fontDir The directory containing the fonts.
     * @param string $fontFilename The font file name to be used.
     * @param int $thumbSize The (square) size of the thumbnail.
     */
    public function addThumbnail(
        string $imagePath,
        string $thumbPath,
        string $fontDir,
        string $fontFilename,
        int $thumbSize
    ) {
        //--
        require '../../phpuesolution/index/addThumbnail.inc.php';
        //*/
    }

    /**
     * Saves an image to the correct file format depending on the EXIF image type.
     * @param resource $image The GD image resource.
     * @param int $exifType The image's EXIF type.
     * @param string $destinationPath The destination path where the image should be stored.
     */
    public function saveImage($image, int $exifType, string $destinationPath)
    {
        //--
        require '../../phpuesolution/index/saveImage.inc.php';
        //*/
    }
}
