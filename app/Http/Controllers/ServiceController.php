<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveServiceRequest;
use App\Service;
use Illuminate\Http\Request;
use Zend\Diactoros\Response;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{

    /**
     * ServiceController constructor.
     */
    public function __construct()
    {
        //$this->middleware('auth:api', ['except' => ['viewService']]);
    }


    /**
     * Return a json containing a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Service::where('DELETED', 0)->where('CREATED_USER_ID', Auth::id())->get();
    }



    public function viewServices(){
        $services = Service::where('DELETED', 0)->where('CREATED_USER_ID', Auth::id())->get();

        return view('services.index', compact('services'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveServiceRequest $request)
    {
        //validation is executed before because of the request

        //If form data is valid => save or edit
        return Service::getInstance()->saveNewService($request->all());
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(SaveServiceRequest $request, $serviceID)
    {
        $operationResponse = Service::getInstance()->editService($request->all(), $serviceID);

        return $this->viewServices();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($serviceID)
    {
        return Service::getInstance()->deleteService($serviceID);
    }
}
