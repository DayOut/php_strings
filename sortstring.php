<?php

/**
 * @param $str
 * @return string
 */
function sortString($str)
{
    $res_str = "";
    if(strlen($str) != 0) // if str is empty
    {
        $words = explode(" ", $str);   //separate string to words

        foreach ($words as $word) // word by word check
        {
            $word_len = strlen($word);  // better check it once then checking every iteration (in case of big data)
            for ($i=0; $i<$word_len; $i++)
            {
                if(is_numeric($word[$i])) // finding a digit
                {
                    $res[$word] = $word[$i];
                    break; // there is no sense to check smt after digit and we will save a lot of iteration in very large texts
                }
            }
        }

        asort($res);

        foreach ($res as $key => $value)
        {
            $res_str .= $key . " ";
        }
    }
    return $res_str;
}

print "Testing:<br>";

print "Результат: '" . sortString("g5et ski3lls on6 use1 your2 to4 7top") . "'<br>";
print "Результат: '" . sortString("") . "'<br>";
print "Результат: '" . sortString("practic3 h4rder yo1u 2hould") . "''";
