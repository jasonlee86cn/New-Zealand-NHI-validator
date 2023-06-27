<?php
/*
New Zealand NHI validator, v202306
Author: Jason Lee, jason.lee@auckland.ac.nz
Usage: ?nhi=nhi
*/
function isNHIValid($nhi) {
    if (!is_string($nhi) || strlen($nhi) !== 7) {
        return false;
    }

    $alphabetConversionTable = [
        'A' => 1, 'B' => 2, 'C' => 3, 'D' => 4, 'E' => 5,
        'F' => 6, 'G' => 7, 'H' => 8, 'J' => 9, 'K' => 10,
        'L' => 11, 'M' => 12, 'N' => 13, 'P' => 14, 'Q' => 15,
        'R' => 16, 'S' => 17, 'T' => 18, 'U' => 19, 'V' => 20,
        'W' => 21, 'X' => 22, 'Y' => 23, 'Z' => 24
    ];

    $sum = 0;
    $sum += $alphabetConversionTable[$nhi[0]] * 7;
    $sum += $alphabetConversionTable[$nhi[1]] * 6;
    $sum += $alphabetConversionTable[$nhi[2]] * 5;
    $sum += ((int)$nhi[3]) * 4;
    $sum += ((int)$nhi[4]) * 3;

    if (!isset($alphabetConversionTable[$nhi[0]]) || !isset($alphabetConversionTable[$nhi[1]]) || !isset($alphabetConversionTable[$nhi[2]])) {
        return false; 
    }

    if (preg_match('/^\d$/', $nhi[5])) { 
        $sum += ((int)$nhi[5]) * 2;
    } elseif (preg_match('/^[A-Z]$/', $nhi[5]) && isset($alphabetConversionTable[$nhi[5]])) { 
        $sum += $alphabetConversionTable[$nhi[5]] * 2;
    } else {
        return false; 
    }

    if (preg_match('/[0-9]/', $nhi[6])) { 
        $remainder = $sum % 11;
        $checkDigit = 11 - $remainder;
        if ($checkDigit == 11) {
            return false; 
        }
        if ($checkDigit == 10) {
            $checkDigit = 0; 
        }
        return $checkDigit === (int)$nhi[6];
    } elseif (preg_match('/[A-Z]/', $nhi[6])) { 
        $remainder = $sum % 23;
        $letterCheckDigit = chr(65 + (23 - $remainder - 1));
        return $letterCheckDigit === $nhi[6];
    }

    return false;
}


$nhi=strtoupper($_REQUEST["nhi"]);
if(substr($nhi,0,1)=="Z"){
	$testing="Y";
}else{
	$testing="N";
}
if(isNHIValid($nhi)){
	$msg=array("status"=>"OK","nhi"=>$nhi,"valid"=>"Y","testing"=>$testing);
}else{
	$msg=array("status"=>"OK","nhi"=>$nhi,"valid"=>"N","testing"=>$testing);
}

echo json_encode($msg);
?>