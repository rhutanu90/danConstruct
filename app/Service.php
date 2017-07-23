<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

class Service extends Model
{
    protected $table = "SERVICES";
    protected $primaryKey = 'ID_SERVICE';
    public $timestamps = false;

    protected $fillable = [
        'ID_SERVICE',
        'SERVICE_NAME',
        'ESTIMATED_PRICE',
        'ESTIMATED_DURATION',
        'SERVICE_COLOR',
        'SERVICE_DESCRIPTION',
        'CREATED_USER_ID',
        'DELETED',
        'created_at',
        'updated_at'
    ];

    protected static $inst = null;
    public static function getInstance()
    {
        if (self::$inst === null) {
            self::$inst = new self();
        }
        return self::$inst;
    }


    public function saveNewService($requestData){
        $service = new Service;
        $service->SERVICE_NAME = $requestData['SERVICE_NAME'];
        $service->ESTIMATED_PRICE = $requestData['ESTIMATED_PRICE'];
        $service->ESTIMATED_DURATION = $requestData['ESTIMATED_DURATION'];
        $service->SERVICE_COLOR = $requestData['SERVICE_COLOR'];
        $service->SERVICE_DESCRIPTION = $requestData['SERVICE_DESCRIPTION'];
        $service->CREATED_USER_ID = 1;
        $service->DELETED = 0;
        $service->save();
    }

}
