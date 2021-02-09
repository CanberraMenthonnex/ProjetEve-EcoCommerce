<?php 

namespace Core\Router; 

class PathGenerator {

    static $basePath = "";
    
    static $imgPath = "";

    static $stylePath = "";

    /**
     * Define base path
     * 
     * @param string $path
     */
    public static function defineBasePath(string $path) {
        self::$basePath = $path;
    }

    /**
     * Define img path (from base path)
     * 
     * @param string $path
     */
    public static function defineImgPath(string $path) {
        self::$imgPath = $path;
    }

    /**
     * Define style path (from base path)
     * 
     * @param string $path
     */
    public static function defineStylePath(string $path) {
        self::$stylePath = $path;
    }
    
    /**
     * Generate path 
     * 
     * @param string $path
     */
    public static function generatePath(string $path) {
        return self::$basePath . '/' . $path;
    }

    /**
     * Generate Img path
     * 
     * @param string $img (image path)
     * 
     */
    public static function generateImgPath(string $img) {
        return self::generatePath( self::$imgPath . '/' . $img );
    }

    /**
     * Generate style path 
     * 
     * @param string $style (style path)
     */
    public static function generateStylePath(string $style) {
        return self::generatePath( self::$stylePath . '/' . $style );
    }
    

}