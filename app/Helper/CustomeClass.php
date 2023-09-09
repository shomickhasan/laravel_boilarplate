<?php

namespace App\Helper;
use App\Models\UserActivityLog;
use Request;

class CustomeClass
{
    public static function ActivityLoger($user_id=null, $activity_name,$activity_type,$message,$model_name=null){
        $activityloger = new UserActivityLog();
        $activityloger->user_id= $user_id ;
        $activityloger->activity_name=$activity_name;
        $activityloger->activity_type=$activity_type;
        $activityloger->message=$message;
        $activityloger->model_name= $model_name?  get_class($model_name) : null;
        $activityloger->ip= null;
        $activityloger->save();

    }


}
