<?php

 if (!function_exists('convertToBanglaDate')) {
    function convertToBanglaDate($date)
    {
        $englishNumbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $banglaNumbers = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];

        $englishMonths = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];
        $banglaMonths = [
            'জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল', 'মে', 'জুন',
            'জুলাই', 'অগাস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর'
        ];

        // Format date with month names
        $formattedDate = date('d-F-Y', strtotime($date));

        // Convert month names and numbers to Bangla
        $dateWithBanglaMonths = str_replace($englishMonths, $banglaMonths, $formattedDate);
        $dateInBangla = str_replace($englishNumbers, $banglaNumbers, $dateWithBanglaMonths);

        return $dateInBangla;
    }
}//end if


if (!function_exists('convertToBanglaNumber')) {
    function convertToBanglaNumber($number)
    {
        $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $bangla  = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
        return str_replace($english, $bangla, $number);
    }
}
