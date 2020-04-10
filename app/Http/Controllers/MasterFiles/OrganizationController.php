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


    public function create()
    {
    }

    public function store(Request $request)
    {
        Organization::create($this->validateRequest($request));
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request  $request, $id)
    {
        $organization = $this->where($id);
        $organization->update($this->validateRequest($request));
    }

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