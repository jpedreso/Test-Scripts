<?php

namespace App\Http\Controllers\MasterFiles;

use App\Http\Controllers\Controller;
use App\Model\MasterFiles\EducationalLevel;
use Illuminate\Http\Request;

class EducationalLevelController extends Controller
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
        //
    }

    public function store(Request $request)
    {
        EducationalLevel::create($this->validateRequest($request));
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $education_level_id)
    {
        $eduLevel = $this->where($education_level_id);
        $eduLevel->update($this->validateRequest($request));
    }


    public function destroy($education_level_id)
    {
        $eduLevel = $this->where($education_level_id);
        $eduLevel->delete();
        return redirect('/educationalLevel');
    }

    protected function validateRequest($request)
    {
        return $request->validate([
            'education_level_title' => 'required',
            'education_level_desc' => 'required',
            'active' => 'required',
            'memo' => 'required',
        ]);
    }

    protected function where($id)
    {
        return EducationalLevel::where('education_level_id', $id)->first();
    }
}