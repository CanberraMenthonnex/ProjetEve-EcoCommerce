<?php
namespace Core;
use Cassandra\Date;

/**
 * Class for checking file
 */
class FileReader {

    private $ext_img = ["jpg", "png", "svg"];
    private $current_ext = "";
    private $dir ="img_uploaded/";
    private $fileName = "fileName";
    private $urlFile = "";
    private $state = true;
    const MAX_SIZE = 100000000;

    /**
     * method for checking if the file is an image
     *
     * @param array $file
     *
     * !return bool status
     */
    public function getImage(array $file) :bool {
        $this->fileName = $file["name"];

        //Check img extension
        $this->current_ext = strtolower(pathinfo($this->fileName, PATHINFO_EXTENSION));
        if(!in_array($this->current_ext, $this->ext_img)) {
            $this->state = false;
        }
        //check img size
        $this->state =  $file["size"] <= self::MAX_SIZE;



        //check if the file already exists
        $this->urlFile = $this->cryptName($this->fileName);

        //Send img
        if($this->state) {
           $this->state = move_uploaded_file($file["tmp_name"], $this->dir . $this->urlFile);

           return $this->state;
        } else {
            return false;
        }
    }

    /**
     * to get direction file url
     *
     * !return string
     */
    public function getUrl() {
        return $this->state ? $this->urlFile : "";
    }

    public function defineDir(string $dir) {
        $this->dir = $dir;
    }

    private function cryptName($name) {//Crypt the name enables to conserv every file and to avoid overwriting
        $date = new \DateTime();
        return hash("sha512", $name). $date->format("d-j-y-u") .".".$this->current_ext;
    }
}