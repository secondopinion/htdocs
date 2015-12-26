<?php

/**
 */

if (($_ws = SecondOpinion::getCurrentWebsite())) {
    $_SERVER['MAGE_RUN_CODE'] = $_ws;
    $_SERVER['MAGE_RUN_TYPE'] = 'website';
}

class SecondOpinion 
{
    public static function getCurrentWebsite()
    {
        $wsCookie = isset($_COOKIE['_ws'])? $_COOKIE['_ws']: null;
        $websites = Mage::app()->getWebsites();
        $ids = array_keys($websites);

        return in_array($wsCookie, $ids)? $wsCookie: null;
    }

    public static function logException($message)
    {
        try {
            throw new Exception($message);
        } catch (Exception $e) {
            Mage::logException($e);
        }
    }
    
}
