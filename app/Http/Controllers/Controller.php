<?php

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function makeUrl($str) 
    {
        
        $tr = array(
            "А"=>"a","Б"=>"b","В"=>"v","Г"=>"g",
            "Д"=>"d","Е"=>"e","ё"=>"e", "Ж"=>"zh","З"=>"z","И"=>"i",
            "Й"=>"y","К"=>"k","Л"=>"l","М"=>"m","Н"=>"n",
            "О"=>"o","П"=>"p","Р"=>"r","С"=>"s","Т"=>"t",
            "У"=>"u","Ф"=>"f","Х"=>"h","Ц"=>"ts","Ч"=>"ch",
            "Ш"=>"sh","Щ"=>"shch","Ъ"=>"","Ы"=>"y","Ь"=>"",
            "Э"=>"e","Ю"=>"yu","Я"=>"ya","а"=>"a","б"=>"b",
            "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"zh",
            "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
            "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
            "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
            "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"shch","ъ"=>"y",
            "ы"=>"y","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya", 
            " "=> "-", "."=> "", "&"=> "and", "/"=> "-",
            "_"=> "-"
        );
        
        $str = trim($str);
        $str = mb_strtolower($str, 'UTF-8');

        $urlstr = strtr($str, $tr);
        $urlstr = preg_replace('/[^A-Za-z0-9_\-]/', '', $urlstr);
        
        $urlstr = str_replace("---", "-", $urlstr);
        $urlstr = str_replace("--", "-", $urlstr);
        $urlstr = str_replace("_", "-", $urlstr);

        return $urlstr;
    }

    public static function colour($tint) {

        $frag = range(0,255);

        $red = "";
        $green = "";
        $blue = "";

        for (;;) {

            $red = $frag[mt_rand(0, count($frag)-1)];
            $green = $frag[mt_rand(0, count($frag)-1)];
            $blue = $frag[mt_rand(0, count($frag)-1)];

            switch ($tint) {
                case 'light':
                    if (($red + $green + $blue / 3) >= 200) break 2;
                break;
                case 'dark' :
                default:
                    if (($red + $green + $blue / 3) <= 100) break 2;
                    if (($red + $green + $blue / 3) >= 50) break 2;
                break;
            }
        }

        return sprintf("#%02s%02s%02s", dechex($red), dechex($green), dechex($blue));
    }


    public static function str_replace_nth($search, $replace, $subject, $nth)
    {
        $found = preg_match_all('/'.preg_quote($search).'/', $subject, $matches, PREG_OFFSET_CAPTURE);
        if (false !== $found && $found > $nth) {
            return substr_replace($subject, $replace, $matches[0][$nth][1], strlen($search));
        }
        return $subject;
    }


    public static function plural_form($n, $forms) {
        echo $n%10==1&&$n%100!=11?$forms[0]:($n%10>=2&&$n%10<=4&&($n%100<10||$n%100>=20)?$forms[1]:$forms[2]);
    }

    
}
