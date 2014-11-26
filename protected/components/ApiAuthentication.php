<?php

class ApiAuthentication extends CApplicationComponent
{

    public static function isExpired($user_id) {

        $hitsCounter = HitsCounter::model()->findByAttributes(
            array('id'=>$user_id),
            array(
                'condition'=>'date_of_expiry<:date',
                'params'=>array('date'=>date('Y-m-d')),
            )
        );
        if(isset($hitsCounter->id)) {
            return true;
        } else {
            return false;
        }
    }

    public static function getHitsAvailable($user_id) {
        $hitsCounter = HitsCounter::model()->findByAttributes(
            array('id'=>$user_id)
        );
        if(isset($hitsCounter->id)) {
            return $hitsCounter->hits_available;
        } else {
            return false;
        }
    }

}