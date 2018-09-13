<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Products;
use App\Cates;

class ProductController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function getProductList()
    {
        $catelist = Cates::all();
        $list = Products::orderBy('id','DESC')->paginate(5);
        //$list = Products::paginate(5);
        return view('admin.product.product_list',['list'=>$list],['catelist'=>$catelist]);
    }

    public function getProductAdd()
    {
        $catelist = Cates::all();
        return view('admin.product.product_add',['catelist'=>$catelist]);
    }

    public function postProductAdd(Request $request)
    {
        $this->validate($request,
        [
            'name'=>'required|unique:products,name',
            'price','cates_id','discount','size','thumbnail' => 'required'
        ],
        [
            'name.required' => 'Bạn chưa nhập tên sản phẩm',
            'name.unique'=>'Tên sản phẩm đã tồn tại',
            'price.required' => 'Bạn chưa nhập giá giản phẩm',
            'discount.required' => 'Bạn chưa nhập giảm giá',
            'cates_id.required' => 'Bạn chưa chọn loại sản phẩm',
            'size.required' => 'Bạn chưa nhập kích thước sản phẩm',
            'thumbnail.required' => 'Bạn chưa có ảnh sản phẩm',
        ]);

        $p = new Products;
        $p->name = $request->name;
        $p->unsigned_name = changeTitle($request->name);
        $p->cates_id = $request->cates_id;
        $p->price = $request->price;
        $p->discount = $request->discount;
        $p->size = $request->size;

        //upload thumnail
        $file = $request->file('thumbnail');
        $extension = $file->getClientOriginalExtension();
        if( $extension != 'jpg' && $extension != 'png' && $extension != 'jpeg')
        {
            return redirect('admin/product/add')->with('alert-danger','Bạn chỉ được chọn các tệp .jpg, .png, .jpeg');
        }
        $name = $file->getClientOriginalName();
        $thumbnail = str_random(5)."-".$name;
        while (file_exists("uploads/products/".$thumbnail)) 
        {
            $thumbnail = str_random(5)."-".$name;
        }
        $file->move("uploads/products",$thumbnail);
        $p->thumbnail = $thumbnail;

        $p->status = $request->status;
        $p->save();

        return redirect('admin/product/add')->with('alert-success','Thêm thành công');
    }

    public function getProductEdit($id)
    {
        $catelist = Cates::all();
        $product = Products::find($id);
        return view('admin.product.product_edit',['product'=>$product],['catelist'=>$catelist]);
    }

    public function postProductEdit(Request $request, $id)
    {
        $this->validate($request,
        [
            'name'=>'required',
            'price','cates_id','discount','size','thumbnail' => 'required'
        ],
        [
            'name.required' => 'Bạn chưa nhập tên sản phẩm',
            'price.required' => 'Bạn chưa nhập giá giản phẩm',
            'discount.required' => 'Bạn chưa nhập giảm giá',
            'cates_id.required' => 'Bạn chưa chọn loại sản phẩm',
            'size.required' => 'Bạn chưa nhập kích thước sản phẩm',
            'thumbnail.required' => 'Bạn chưa có ảnh sản phẩm',
        ]);

        $p = Products::find($id);
        $p->name = $request->name;
        $p->unsigned_name = changeTitle($request->name);
        $p->cates_id = $request->cates_id;
        $p->price = $request->price;
        $p->discount = $request->discount;
        $p->size = $request->size;
        
        //upload thumnail
        $file = $request->file('thumbnail');
        $extension = $file->getClientOriginalExtension();
        if( $extension != 'jpg' && $extension != 'png' && $extension != 'jpeg')
        {
            return redirect('admin/product/add')->with('alert-danger','Bạn chỉ được chọn các tệp .jpg, .png, .jpeg');
        }
        $name = $file->getClientOriginalName();
        $thumbnail = str_random(5)."-".$name;
        while (file_exists("uploads/products/".$thumbnail)) 
        {
            $thumbnail = str_random(5)."-".$name;
        }
        $file->move("uploads/products",$thumbnail);
        unlink("uploads/products/".$p->thumbnail);
        $p->thumbnail = $thumbnail;

        $p->status = $request->status;
        $p->save();

        return redirect('admin/product/edit/'.$id)->with('alert-success','Sửa thành công');
    }

    public function getProductDelete($id)
    {
        $p = Products::find($id);
        unlink("uploads/products/".$p->thumbnail);
        $p->delete();

        return redirect('admin/product')->with('alert-success','Xóa thành công');
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
