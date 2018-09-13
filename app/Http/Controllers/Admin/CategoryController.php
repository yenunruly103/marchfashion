<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cates;

class CategoryController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    
    public function getCategoryList()
    {
        $list = Cates::all();
        return view('admin.category.category_list',['list'=>$list]);
    }

    public function getCategoryAdd(){
        return view('admin.category.category_add');
    }

    public function postCategoryAdd(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|unique:Cates,name|max:100'
            ],
            [
                'name.required' => 'Bạn chưa nhập tên danh mục',
                'name.unique' => 'Tên danh mục đã tồn tại',
                'name.max' => 'Tên danh mục quá dài. Vui lòng nhập không quá 100 ký tự',
            ]);
        $cate = new Cates;
        $cate->name = $request->name;
        //$cate->name1 = changeTitle($request->name);
        $cate->save();

        return redirect('admin/category/add')->with('alert-success','Thêm thành công');
    }

    public function getCategoryEdit($id)
    {
        
        $cate = Cates::find($id);
        return view('admin.category.category_edit', ['cate'=>$cate]);
    }

    public function postCategoryEdit(Request $request, $id)
    {
        $this->validate($request,
            [
                'name' => 'required|max:100'
            ],
            [
                'name.required' => 'Bạn chưa nhập tên danh mục',
                'name.max' => 'Tên danh mục quá dài. Vui lòng nhập không quá 100 ký tự',
            ]);
        $cate = Cates::find($id);
        $cate->name = $request->name;
        $cate->save();

        return redirect('admin/category/edit/'.$id)->with('alert-success','Sửa thành công');
    }

    public function getCategoryDelete($id)
    {
        $cate = Cates::find($id);
        $cate->delete();

        return redirect('admin/category')->with('alert-success','Xóa thành công');
    }


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
        //
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
