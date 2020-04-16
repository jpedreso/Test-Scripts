<?php

namespace App\Http\Controllers\MasterFiles;

use App\Http\Controllers\Controller;
use App\Model\MasterFiles\SocialMediaType;
use Illuminate\Http\Request;

class SocialMediaTypeController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SocialMediaType::create($this->validateRequest($request));
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
    public function update(Request $request, $social_media_type_id)
    {
        $socialMedia = $this->where($social_media_type_id);
        $socialMedia->update($this->validateRequest($request));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($social_media_type_id)
    {
        $eduLevel = $this->where($social_media_type_id);
        $eduLevel->delete();
        return redirect('/socialMediaType');
    }

    protected function validateRequest($request)
    {
        return $request->validate([
            'social_media_title' => 'required',
        ]);
    }

    protected function where($id)
    {
        return SocialMediaType::where('social_media_type_id', $id)->first();
    }
}