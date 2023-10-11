<?php 

require_once 'config.php';

if (!function_exists('getColorBarCss')) {
    function getColorBarCss($percent)
    {
        if($percent > 75 )
        {
            return 'bg-good';
        }
        if($percent > 50 )
        {
            return 'bg-success';
        }
        else if($percent >30)
        {
            return 'bg-warning';
        }
        else
        {
            return 'bg-danger';
        }
    }
}

if (!function_exists('substrwords')) {
    function substrwords($text, $maxchar, $end='...') {
        if (mb_strlen($text) > $maxchar || $text == '') {
            $words = preg_split('/\s/', $text,0);   
            $output = '';
            $i      = 0;
            while (1) {
                $length = mb_strlen($output)+mb_strlen($words[$i]);
                if ($length > $maxchar) {
                    break;
                } 
                else {
                    $output .= " " . $words[$i];
                    ++$i;
                }
            }
            $output .= $end;

        } 
        else {
            $output = $text;
        }
        return $output;
    }
}

if (!function_exists('getPostUrl')) {
    function getPostUrl($catePath, $postID, $postAlias) {
        $extension = '.html';
        return DOMAIN_PATH . '/' . $catePath . '/' . $postID .'-'. $postAlias . $extension;
    }
}

if (!function_exists('getGender')) {
    function getGender($data) {
        if((int)$data == 1) {
            return 'Male';
        }
        if((int)$data == 2) {
            return 'Female';
        }
        if((int)$data == 3) {
            return 'Other';
        }
    }
}