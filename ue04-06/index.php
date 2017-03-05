<?php
session_start();

require_once("includes/defines.inc.php");

require_once HTTPS_REDIRECT;
require_once LOGIN_SYSTEM;
require_once UTILITIES;
require_once NORM_FORM;
require_once FILE_ACCESS;
require_once IMAGE_PROCESSING;

/**
 * The main page of the IMAR image archive.
 *
 * This class enables users to upload images together with meta information about the image title and author. These
 * images are then stored. In the course of the semester, this page is protected by a login system and thumbnails are
 * generated to show a small version of the uploaded file instead of a generic one.
 *
 * @author Wolfgang Hochleitner <wolfgang.hochleitner@fh-hagenberg.at>
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @version 2017
 */
final class IMAR extends AbstractNormForm
{
    /**
     * @var string IMAGE_UPLOAD Form field constant that defines how the form field for image uploads is called
     * (id/name).
     */
    const IMAGE_UPLOAD = "imageUpload";

    /**
     * @var string MAX_FILE_SIZE_VALUE Defines the size of the maximum allowed file size for uploads.
     */
    const MAX_FILE_SIZE_VALUE = "2097152";

    /**
     * @var string IMAGE_TITLE Form field constant that defines how the form field for holding the image title is
     * called (id/name).
     */
    const IMAGE_TITLE = "imageTitle";

    /**
     * @var string IMAGE_AUTHOR Form field constant that defines how the form field for holding the image author is
     * called (id/name).
     */
    const IMAGE_AUTHOR = "imageAuthor";

    /**
     * @var FileAccess $fileAccess The object handling all file access operations.
     */
    private $fileAccess;

    /**
     * @var ImageProcessing $imageProcessing The object handling all image processing operations.
     */
    private $imageProcessing;

    /**
     * Creates a new IMAR object based on AbstractNormForm. Takes a View object that holds the information about which
     * template will be shown and which parameters (e.g. for form fields) are passed on to the template.
     * The constructor needs to initialize the objects for file handling and image processing.
     * @param View $defaultView The default View object with information on what will be displayed.
     * @param string $templateDir The Smarty template directory.
     * @param string $compileDir The Smarty compiled template directory.
     */
    public function __construct(View $defaultView, $templateDir = "templates", $compileDir = "templates_c")
    {
        parent::__construct($defaultView, $templateDir, $compileDir);

        // TODO: Do the necessary initializations in the constructor.

        /*--
        require '../../phpuesolution/index/construct.inc.php';
        //*/

        // Add the images to our view since we can't do this from outside the object
        $this->currentView->setParameter(new GenericParameter("images", $this->getImages()));
    }

    /**
     * Validates user input after uploading a new image. This function first has to check if the image upload was
     * successful, and if it was an image. Title and author must also not be empty. If an error occurs, an error message
     * is set in the member variable $errorMessages. Error messages are then passed on to the view to show them in the
     * template.
     * @return bool Returns true if no errors occurred and therefore no error messages were set, otherwise false.
     */
    protected function isValid(): bool
    {

        // TODO: The code for correct form validation goes here. Check for empty fields and correct image upload.

        /*--
        require '../../phpuesolution/index/isValid.inc.php';
        //*/

        $this->currentView->setParameter(new GenericParameter("errorMessages", $this->errorMessages));

        return (count($this->errorMessages) === 0);
    }

    /**
     * This method is only called when the form input was validated successfully. It adds the newly added image,
     * creates a status message for showing success and updates the View object with the status message and the updated
     * array of images. The form fields for image title and author are updated with an empty parameter so that their
     * content is deleted.
     */
    protected function business()
    {
        if ($this->addImage()) {
            $this->statusMessage = "Your file has been uploaded successfully";
            $this->currentView->setParameter(new GenericParameter("statusMessage", $this->statusMessage));
            $this->currentView->setParameter(new GenericParameter("images", $this->getImages()));
            $this->currentView->setParameter(new PostParameter(IMAR::IMAGE_TITLE, true));
            $this->currentView->setParameter(new PostParameter(IMAR::IMAGE_AUTHOR, true));
        } else {
            $this->errorMessages ["addImage"] = "Error adding image. Please try again";
        }
    }

    /**
     * Tests, if a checkbox with a given name is checked.
     * @param string $name The name of the checkbox.
     * @return bool Returns true, if the checkbox is checked, otherwise false.
     */
    private function isChecked(string $name): bool
    {
        return isset($_POST[$name]) && strcmp($_POST[$name], "on") === 0 ? true : false;
    }

    /**
     * Returns the two-dimensional array containing the stored images. This methods uses the loadContents method
     * provided by the FileAccess class to read the JSON data from the file and returns it. Later on this method can
     * filter the results so that only images for the currently logged in user are returned.
     * @return array The two-dimensional array containing all information about the uploaded images.
     */
    private function getImages(): array
    {
        // TODO: Return the two-dimensional image array here. Later on (UE5) return only images for the logged in user.

        $imageArray = [];

        /*--
        require '../../phpuesolution/index/getImages.inc.php';
        //*/

        return $imageArray;
    }

    /**
     * Adds a new image to the image archive. This method creates a new entry in the two-dimensional image array by
     * retrieving the data provided by the upload (image location, title, author) and added the current date and time.
     * Later the location of a generated thumbnail as well as the currently logged in user are added as well. This
     * method is also responsible for moving the uploaded image to its final destination and creating a unique path for
     * it. After the entry is created, the updated two-dimensional array is stored again in the JSON file.
     * @return bool Returns true if the operation was successful, otherwise false.
     */
    private function addImage(): bool
    {
        $imagePath = $this->generateUniqueImagePath();

        // This is just a placeholder thumbnail so that something is there in exercises 4 & 5 when
        // ImageProcessing::addThumbnail() is not implemented yet
        $thumbPath = FileAccess::IMAGE_DIRECTORY . "default/nothumb.png";

        // TODO: Move the uploaded image to its destination, add it to the two-dimensional array and store it.

        // TODO: Later on (UE6) also generate a thumbnail of the uploaded image.

        /*--
        return require '../../phpuesolution/index/addImage.inc.php';
        //*/

        //##
        return true;
        //*/
    }

    /**
     * Generates a unique path for a newly uploaded file in order to avoid issues with identical file names.
     * @return string The unique path for the image file.
     */
    private function generateUniqueImagePath(): string
    {
        // This is just a default value so that something is returned if the method is not yet implemented.
        $imagePath = FileAccess::IMAGE_DIRECTORY . "your_random_filename_here.jpg";

        // TODO: Generate a new, random file name for the uploaded image and return the full path.

        /*--
        require '../../phpuesolution/index/generateUniqueImagePath.inc.php';
        //*/

        return $imagePath;
    }
}

// --- This is the main call of the norm form process

// Use this method call to enable login protection for this page
//LoginSystem::protectPage();

// Defines a new view that specifies the template and the parameters that are passed to the template
$view = new View(View::FORM, "indexMain.tpl", [
    new GenericParameter("imageUpload", IMAR::IMAGE_UPLOAD),
    new GenericParameter("maxFileSizeValue", IMAR::MAX_FILE_SIZE_VALUE),
    new PostParameter(IMAR::IMAGE_TITLE),
    new PostParameter(IMAR::IMAGE_AUTHOR)
]);

// Creates a new IMAR object and triggers the NormForm process
$imar = new IMAR($view);
$imar->normForm();
