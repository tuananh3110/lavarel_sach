<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhmucSach;


class DanhmucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        // liệt kê danh mục sách
        $danhmucsach = DanhmucSach::orderBy('id','DESC')->get();
        // $danhmucsach = DanhmucSach::all();

        return view('admincp.danhmucsach.index')->with(compact('danhmucsach'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        //thêm danh mục
        return view('admincp.danhmucsach.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //kiểm tra dữ liệu
        $data = $request->validate(
            [
            'tendanhmuc' => 'required|unique:danhmuc|max:255',
            'mota' => 'required|max:255',
            'kichhoat' => 'required',
            ],

            [ //thông báo lỗi
                'tendanhmuc.required' => 'Tên danh mục phải có',
                'mota.required' => 'Mô tả danh mục phải có',
            ],


        );
        // $data = $request->all();
        
        $danhmucsach = new DanhmucSach();
        $danhmucsach->tendanhmuc = $data['tendanhmuc'];
        $danhmucsach->mota = $data['mota'];
        $danhmucsach->kichhoat = $data['kichhoat'];
        $danhmucsach->save();

        return redirect()->back()->with('status','Thêm danh mục thành công');

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
        //xóa 
        danhmucSach::find($id)->delete();
        return redirect()->back()->with('status','Xóa danh mục thành công');

    }
}
