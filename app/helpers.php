<?php

if(!function_exists('getStoragePath')){
    function getStoragePath($type, $type_id, $filename = '') {
        return storage_path('app/public/uploads/' . $type . '/' . $type_id . '/') . $filename;
    }
}

if(!function_exists('storageAccessPath')){
    function storageAccessPath($type, $type_id, $filename = '') {
        return 'storage/uploads/' . $type . '/' . $type_id . '/' . $filename;
    }
}

// 1(504)287-4421
if(!function_exists('telephoneFormat')){
    function telephoneFormat($telnumber) {
        return preg_replace('/([0-9]{1,1})([0-9]{3,3})([0-9]{3,3})([0-9]{4,4})/','$1($2)$3-$4',$telnumber);
    }
}


if(!function_exists('getMonths')){
    function getMonths() {
        return [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
        ];
    }
}



if(!function_exists('getNextYears')){
    function getNextYears() {
        $year = date('Y');
        $list = [];
        for($i=$year;$i<$year+5;$i++){
            $list[]=$i;
        }
        return $list;
    }
}

if(!function_exists('getCardSvgUrl')){
    function getCardSvgUrl($cardname) {
        $url = '/assets/svg/creditcards-sprite.svg#';

        switch($cardname){
            case 'master':
            case 'MasterCard':
            case 'mastervisa':
            case 'mastercard':
                $url .= 'mastercard';
                break;
            case 'visa':
            case 'Visa':
                $url .= 'visa';
                break;
            default:
                $url .= $cardname;
        }
        return asset($url);
    }
}
 
?>

