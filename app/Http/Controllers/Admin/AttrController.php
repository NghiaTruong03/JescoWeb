<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attr;
use App\Models\AttrValue;

class AttrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attr = Attr::all();
        // $test = Attr::find(4);
        // dd($test->values);
        return view('admin.attr.index',compact('attr'));
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
    // dd($request->all());
        try{
            $attr = Attr::create($request->all());
            return redirect()->back()->with('ss','Thêm mới thành công');
        }catch (\Throwable $th){
            dd($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attr = Attr::find($id);
        $type = $attr->type;
        
        return view('admin.attr.add',compact('attr','type'));
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
        $delete =  Attr::find($id);
        $delete->delete();

        if($delete){
        return redirect()->route('attr.index')->with('success','Xóa thành công');
        }else{
            dd('Xóa thất bại');
        }
    }

    public function addValue(Request $request){
        
        foreach($request->name as $value)
        AttrValue::create([
            'id_attr'=>$request->id,
            'value'=>$value,
            
        ]);
        
        return redirect()->route('attr.index');
    }
}
