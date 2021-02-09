<?php
namespace Core;

class HtmlGenerator {


    public static function generate(array $content) {
        $htmlContent = "";

        foreach($content as $element) {
            $concat = "";

            switch($element->type) {

                case 'header':
                    $concat = self::generateTitle($element->data->level, $element->data->text);
                    break;

                case 'paragraph':
                    $concat = self::generateParagraph($element->data->text);
                    break;
                
                case 'image':
                    $concat = self::generateImg($element->data->url, $element->data->stretched);
                    break;
 
            }

            $htmlContent .= $concat;

        }

        echo $htmlContent;

    }

    private static function generateTitle(int $level, string $text ) {
        return "<h$level class='py-1 f-white'>$text</h$level>";
    }

    private static function generateParagraph(string $text) {
        return "<p class='py-1 f-white'>$text</p>";
    }

    private static function generateImg(string $url, bool $isStretch) {
        $style = $isStretch ? "width: 100%" : "";
        return "<img src='$url' class='py-1' style='$style'/>";
    }

}