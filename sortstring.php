<?php

function sortString($str)
{
    print "Результат: '";

    if(strlen($str) != 0) // if str is empty
    {
        $words = explode(" ", $str);   //separate string to words

        foreach ($words as $word) // word by word check
        {
            for ($i=0; $i<strlen($word); $i++)
            {
                if(is_numeric($word[$i])) // finding a digit
                {
                    $res[$word] = $word[$i];
                }
            }
        }

        asort($res);

        foreach ($res as $key => $value)
            print $key . " ";

    }

    print "'"; // closing "'" in the output
}

print "Testing:<br>";
sortString("g5et ski3lls on6 use1 your2 to4 7top");
print "<br>";
sortString("");
print "<br>";
sortString("practic3 h4rder yo1u 2hould");
