<?php


namespace App\Http\Controllers;

use App\Model\MasterFiles\Organization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        /* print_r($request); */
        /*   $data = request()->validate([
            'org_name' => 'Tier3',
            'agency_type_id' => 'Energy',
            'tax_id' => '295-225-265',
            'multi_company' => '1',
            'cost_center_enable' => '1'
        ]); */

        /*  Employee::create($data); */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        echo "store";
        /*  $data = request()->validate([
            'org_name' => 'require',
            'agency_type_id' => 'require',
            'tax_id' => 'require',
            'multi_company' => 'require',
            'cost_center_enable' => 'require'
        ]); */
        /* Organization::create($data); */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}