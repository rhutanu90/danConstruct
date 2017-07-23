<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveServiceRequest;
use App\Service;
use Illuminate\Http\Request;
use Zend\Diactoros\Response;

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
        return Service::all();
    }



    public function viewServices(){
        $services = Service::all();

        return view('services.index', compact('services'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        Service::getInstance()->saveNewService($request->all());

        return redirect('services');
    }



    /**
     * Return a service object  by the specified resource ID.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show($serviceID)
    {
        $service = Service::findOrFail($serviceID);

        return $service;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
