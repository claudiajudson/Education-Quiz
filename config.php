<?php
$host = "localhost"; //Creating the variable for the host
$username ="root"; //Creating the username root
$password = ""; //Creating the variable for the password
$dbName = "induction_quiz"; //Creating the variable for the database name

$conn = new mysqli($host, $username, $password, $dbName); //Connecting to the database


// Encyption function
function HashIt($string)
{
    $return = '';
    $algo = GetAlgo();
    $hashing = str_split($string, 1);
    foreach ($hashing as $part)
    {
        $return .= $algo[$part];
    }
    return rtrim($return, "|");
}

function UnhashIt($hash)
{
    $return = '';
    $algo = GetAlgo();
    $unhash = explode("|", $hash);
    foreach ($unhash as $value)
    {
        $find = array_search($value, $algo);
        if ($find)
            $return .= $find;
    }
    return $return;
}

function GetAlgo()
{
    return [
        "a"=>"H",
        "b"=>"11",
        "c"=>"15",
        "d"=>"21",
        "e"=>"28",
        "f"=>"33",
        "g"=>"z",
        "h"=>"V",
        "i"=>"2",
        "j"=>"29",
        "k"=>"16",
        "l"=>"12",
        "m"=>"35",
        "n"=>"Z",
        "o"=>"18",
        "p"=>"39",
        "q"=>"34",
        "r"=>"P",
        "s"=>"24",
        "t"=>"19",
        "u"=>"C",
        "v"=>"6",
        "w"=>"5",
        "x"=>"y",
        "y"=>"X",
        "z"=>"w",
        "A"=>"43",
        "B"=>"u",
        "C"=>"T",
        "D"=>"N",
        "E"=>"m",
        "F"=>"L",
        "G"=>"g",
        "H"=>"F",
        "I"=>"e",
        "J"=>"D",
        "K"=>"c",
        "L"=>"a",
        "M"=>"B",
        "N"=>"7",
        "O"=>"i",
        "P"=>"J",
        "Q"=>"k",
        "R"=>"o",
        "S"=>"27",
        "T"=>"q",
        "U"=>"38",
        "V"=>"s",
        "W"=>"1",
        "X"=>"8",
        "Y"=>"20",
        "Z"=>"30",
        " "=>"4",
        "1"=>"W",
        "2"=>"37",
        "3"=>"41",
        "4"=>"17",
        "5"=>"13",
        "6"=>"23",
        "7"=>"26",
        "8"=>"44",
        "9"=>"42",
        "0"=>"R",
        "!"=>"36",
        "£"=>"31",
        "$"=>"25",
        "%"=>"22",
        "^"=>"14",
        "&"=>"9",
        "*"=>"3",
        "("=>"40",
        ")"=>"Y",
        "_"=>"x",
        "-"=>"32",
        "="=>"v",
        "+"=>"U",
        "`"=>"t",
        "¬"=>"S",
        ""=>"r",
        ","=>"Q",
        "<"=>"p",
        "."=>"O",
        ">"=>"n",
        "/"=>"M",
        "?"=>"l",
        ";"=>"K",
        ":"=>"j",
        "'"=>"I",
        "@"=>"h",
        "#"=>"G",
        "~"=>"f",
        "["=>"E",
        "]"=>"d",
        "{"=>"10",
        "}"=>"b",
        "."=>"A",
    ];
}




?>