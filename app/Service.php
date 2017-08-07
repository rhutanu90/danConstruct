<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;
use Mockery\Exception;

class Service extends Model
{
    protected $table = "SERVICES";
    protected $primaryKey = 'ID_SERVICE';
    public $timestamps = true;

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
        try{
            $service = new Service;
            $service->SERVICE_NAME = $requestData['SERVICE_NAME'];
            $service->ESTIMATED_PRICE = $requestData['ESTIMATED_PRICE'];
            $service->ESTIMATED_DURATION = $requestData['ESTIMATED_DURATION'];
            $service->SERVICE_COLOR = $requestData['SERVICE_COLOR'];
            $service->SERVICE_DESCRIPTION = $requestData['SERVICE_DESCRIPTION'];
            $service->CREATED_USER_ID = Auth::id();
            $service->DELETED = 0;
            $service->save();

            //save in the changelog
        }
        catch (Exception $e){
            return false;
        }

        return $service;
    }


    public function editService($requestData, $serviceID){
        try{
            $service = Service::find($serviceID);
            $service->SERVICE_NAME = $requestData['SERVICE_NAME'];
            $service->ESTIMATED_PRICE = $requestData['ESTIMATED_PRICE'];
            $service->ESTIMATED_DURATION = $requestData['ESTIMATED_DURATION'];
            $service->SERVICE_COLOR = $requestData['SERVICE_COLOR'];
            $service->SERVICE_DESCRIPTION = $requestData['SERVICE_DESCRIPTION'];
            $service->save();

            //save in the changelog
        }
        catch (Exception $e){
            return false;
        }

        return $service;
    }


    public function deleteService($serviceID){
        try{
            $service = Service::find($serviceID);
            $service->DELETED = 1;
            $service->save();

            //save in the changelog
        }
        catch (Exception $e){
            return false;
        }

        return $service;
    }


    public function createdBy()
    {
        return $this->belongsTo(User::class, 'CREATED_USER_ID');
    }


}
