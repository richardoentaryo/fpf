<?php

    function byte_format($num, $precision = 1)
    {
        if ($num >= 1000000000000)
        {
            $num = round($num / 1099511627776, $precision);
            $unit = 'TB';
        }
        elseif ($num >= 1000000000)
        {
            $num = round($num / 1073741824, $precision);
            $unit = 'GB';
        }
        elseif ($num >= 1000000)
        {
            $num = round($num / 1048576, $precision);
            $unit = "MB";
        }
        elseif ($num >= 1000)
        {
            $num = round($num / 1024, $precision);
            $unit = 'KB';
        }
        else
        {
            $unit = 'bytes';
            return number_format($num).' '.$unit;
        }

        return number_format($num, $precision).' '.$unit;
    }

    function thousand_format($num, $precision = 1)
    {
        if ($num >= 1000000000000)
        {
            $num = round($num / 1000000000000, $precision);
            $unit = 'Trillion';
        }
        elseif ($num >= 1000000000)
        {
            $num = round($num / 1000000000, $precision);
            $unit = 'Billion';
        }
        elseif ($num >= 1000000)
        {
            $num = round($num / 1000000, $precision);
            $unit = "Million";
        }
        elseif ($num >= 1000)
        {
            $num = round($num / 1000, $precision);
            $unit = 'Thousand';
        }
        else
        {
            return number_format($num);
        }

        return number_format($num, $precision).' '.$unit;
    }
?>
