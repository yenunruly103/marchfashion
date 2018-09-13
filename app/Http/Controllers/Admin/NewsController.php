<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Cates;

class NewsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function getNewsList()
    {
        $list = News::orderBy('id','DESC')->paginate(10); 
        return view('admin.news.news_list',['list'=>$list]);
    }

    public function getNewsAdd()
    {
        return view('admin.news.news_add');
    }

    public function postNewsAdd(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|unique:news,title',
            'description'=>'required',
            'content'=>'required'
        ],[
            'title.required'=>'Bạn chưa nhập tiêu đề',
            'title.unique'=>'Tiêu đề đã tồn tại',
            'description.required'=>'Bạn chưa nhập tóm tắt',
            'content.required'=>'Bạn chưa nhập nội dung'
        ]);

        $news = New News;
        $news->title = $request->title;
        $news->unsigned_title = changeTitle($request->title);
        $news->description = $request->description;
        $news->content = $request->content;

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            if( $extension != 'jpg' && $extension != 'png' && $extension != 'jpeg')
            {
                return redirect('admin/news/add')->with('alert-danger','Bạn chỉ được chọn các tệp .jpg, .png, .jpeg');
            }
            $name = $file->getClientOriginalName();
            $image = str_random(5)."-".$name;
            while (file_exists("uploads/news/".$image)) 
            {
                $image = str_random(5)."-".$name;
            }
            $file->move("uploads/news",$image);
            $news->image = $image;
        }
        else
        {
            $news->image ="";
        }

        $news->save();

        return redirect('admin/news/add')->with('alert-success','Đã lưu bài đăng');
    }

    public function getNewsEdit($id)
    {
        $news = News::find($id);
        return view('admin.news.news_edit',['news'=>$news]);
    }

    public function postNewsEdit(Request $request, $id)
    {
         $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'content'=>'required'
        ],[
            'title.required'=>'Bạn chưa nhập tiêu đề',
            'description.required'=>'Bạn chưa nhập tóm tắt',
            'content.required'=>'Bạn chưa nhập nội dung'
        ]);

        $news = News::find($id);
        $news->title = $request->title;
        $news->unsigned_title = changeTitle($request->title);
        $news->description = $request->description;
        $news->content = $request->content;

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            if( $extension != 'jpg' && $extension != 'png' && $extension != 'jpeg')
            {
                return redirect('admin/news/add')->with('alert-danger','Bạn chỉ được chọn các tệp .jpg, .png, .jpeg');
            }
            $name = $file->getClientOriginalName();
            $image = str_random(5)."-".$name;
            while (file_exists("uploads/news/".$image)) 
            {
                $image = str_random(5)."-".$name;
            }
            $file->move("uploads/news",$image);
            if($news->image)
            {
                unlink("uploads/news/".$news->image);
            }
            
            $news->image = $image;
        }

        $news->save();

        return redirect('admin/news/edit/'.$id)->with('alert-success','Đã cập nhật bài đăng');
    }

    public function getNewsDelete($id)
    {
        $news = News::find($id);
        if($news->image)
        {
            unlink("uploads/news/".$news->image);
        }
        $news->delete();

        return redirect('admin/news')->with('alert-success','Xóa thành công');
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
