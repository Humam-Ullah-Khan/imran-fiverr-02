<?php

namespace App\Http\Controllers;

use App\Models\GraphicDesigner;
use App\Models\Admin;
use App\Models\cmsModulesFront;
use Illuminate\Http\Request;
use App\Models\Designer;

class GraphicDesignerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CmsData = cmsModulesFront::all();
        $data = Designer::where(['userType'=>'1'])->get();
        return view('backend.alldesignerorders')->with(['data'=>$data,'CmsData'=>$CmsData]);
    }

    public function getdesignerReg(Request $request){

        $Username = $request->get('Username');
        $Password = $request->get('Password');
        $UserType = 1;
       
        $model = new Designer;
        $model->username = $Username;
        $model->password = $Password;
        $model->userType = $UserType;
      
        $model->save();

        $request->session()->flash('message',"Designer Add Successfully!");
        return redirect('admin/all-graphic-designer');

    }


    // GetdesignerUpdate
    public function getdesignerUpdate(Request $request){
        $id = $request->get('id');
        $Username = $request->get('Username');
        $Password = $request->get('Password');
        $status = $request->get('Status');
       
        $model = Designer::find($id);
        $model->username = $Username;
        $model->password = $Password;
        $model->adminStatus = $status;
      
        $model->save();

        $request->session()->flash('message',"Designer Update Successfully!");
        return redirect('admin/all-graphic-designer');
    }

    // getdesignerEdit
    public function getdesignerEdit(Request $request){
        $id = $request->get('id');
        $data = Designer::find($id);
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GraphicDesigner  $graphicDesigner
     * @return \Illuminate\Http\Response
     */
    public function show(GraphicDesigner $graphicDesigner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GraphicDesigner  $graphicDesigner
     * @return \Illuminate\Http\Response
     */
    public function edit(GraphicDesigner $graphicDesigner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GraphicDesigner  $graphicDesigner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GraphicDesigner $graphicDesigner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GraphicDesigner  $graphicDesigner
     * @return \Illuminate\Http\Response
     */
    public function destroy(GraphicDesigner $graphicDesigner)
    {
        //
    }
}
