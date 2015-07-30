<?php

/**
 * Creation de miniatures a partir des fichiers existants
 */
class CreateThumbnailCommand extends CConsoleCommand
{

    public function run($args) {
        $pathPhotos = __DIR__ . '/../../photos/';
        createThumbs($pathPhotos, $pathPhotos . "tn/", 100);
    }

}
?>
<?php

function createThumbs($pathToImages, $pathToThumbs, $maxSize) {
    // open the directory
    $dir = opendir($pathToImages);

    // loop through it, looking for any/all JPG files:
    while (false !== ($fname = readdir($dir))) {
        // parse path for the extension
        $filepath = $pathToImages . $fname;
        // continue only if this is a JPEG image
        if (!is_dir($filepath)) {
            $type = exif_imagetype($filepath);
            $allowedTypes = array(
                1, // [] gif
                2, // [] jpg
                3, // [] png
                6   // [] bmp
            );
            if (in_array($type, $allowedTypes)) {


                switch ($type) {
                    case 1 :
                        $func = 'imagegif';
                        $img = imageCreateFromGif($filepath);
                        break;
                    case 2 :
                        $func = 'imagejpeg';
                        $img = imageCreateFromJpeg($filepath);
                        break;
                    case 3 :
                        $func = 'imagepng';
                        $img = imageCreateFromPng($filepath);
                        break;
                    case 6 :
                        $func = 'image2wbmp';
                        $img = imageCreateFromBmp($filepath);
                        break;
                }
                echo "Creating thumbnail for {$fname} \n";

                // load image and get image size

                $width = imagesx($img);
                $height = imagesy($img);
                if ($width > $height) {
                    // calculate thumbnail size
                    $new_width = $maxSize;
                    $new_height = floor($height * ( $maxSize / $width ));
                } else {
                    $new_height = $maxSize;
                    $new_width = floor($width * ( $maxSize / $height));
                }
                // create a new temporary image
                $tmp_img = imagecreatetruecolor($new_width, $new_height);

                // copy and resize old image into new image
                imagecopyresized($tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

                $func($tmp_img, $pathToThumbs . $fname);
            }
        }
    }
    // close the directory
    closedir($dir);
}

?>