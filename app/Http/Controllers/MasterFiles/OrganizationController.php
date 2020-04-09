<?php


namespace App\Http\Controllers\MasterFiles;

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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Organization::create($this->validateRequest($request));
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
    public function update(Request  $request, $id)
    {
        $organization = $this->where($id);
        $organization->update($this->validateRequest($request));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request  $request, $id)
    {
        $organization = $this->where($id);
        $organization->delete();
        return redirect('/organization');
    }

    protected function validateRequest($request)
    {
        return $request->validate([
            'org_name' => 'required',
            'agency_type_id' => 'required',
            'tax_id' => 'required',
            'multi_company' => 'required',
            'cost_center_enable' => 'required'
        ]);
    }

    protected function where($id)
    {
        return Organization::where('id', '=', $id)->first();
    }
}