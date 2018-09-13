<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

use App\Http\Controllers\Controller;
use App\Products;
use App\Cates;
use App\News;
use App\User;

class PageController extends Controller
{

    public function __construct()
    {
        $cate = Cates::all();
        view()->share('cate', $cate);

        // if(Auth::check())
        // {
        //     view()->share('current_user',Auth::user());
        // }
    }

    public function index()
    {
        $new_product = Products::orderBy('id','DESC')->take(4)->get();
        $hot_product = Products::orderBy('view','DESC')->take(4)->get();
        $three_news = News::orderBy('id','DESC')->take(3)->get();
        return view('pages.trangchu', compact('new_product', 'hot_product', 'three_news'));
    }

    //Ve chung toi
    public function getGioiThieuNews(){
        $vct_news = News::where('title','Giới thiệu')->first();
        return view('pages.vechungtoi', compact('vct_news'));
    }

    public function getTuyenDungNews(){
        $vct_news = News::where('title','Tuyển dụng')->first();
        return view('pages.vechungtoi', compact('vct_news'));
    }

    public function getCacCuaHangNews(){
        $vct_news = News::where('title','Các cửa hàng')->first();
        return view('pages.vechungtoi', compact('vct_news'));
    }

    public function getLienHeNews(){
        $vct_news = News::where('title','Liên hệ')->first();
        return view('pages.vechungtoi', compact('vct_news'));
    }

    //San pham

    public function getSPMoi(){

        $cate = 'Mới';

        $current = Carbon::now();
        $cur = Carbon::now();
        $a_month_ago = $cur->subDays(30);

        $product = Products::where('created_at','<',$current)->where('created_at', ">",$a_month_ago)->paginate(8);
        return view('pages.sanphammoi', compact('product', 'cate'));
    }

    public function getSPNoiBat(){

        $cate = 'Nổi bật';

        $current = Carbon::now();
        $cur = Carbon::now();
        $a_month_ago = $cur->subDays(60);

        $product = Products::where('view','>',10)->where('created_at','<',$current)->where('created_at', ">",$a_month_ago)->paginate(8);

        return view('pages.sanphamnoibat', compact('product', 'cate'));
    }

    public function getSPAo(){
        $cate = Cates::find(1);
        $product = Products::where('cates_id',1)->orderBy('id','DESC')->paginate(9);
        return view('pages.sanphamtheoloai', compact('product', 'cate'));
    }

    public function getSPQuan(){
        $cate = Cates::find(9);
        $product = Products::where('cates_id',9)->orderBy('id','DESC')->paginate(9);
        return view('pages.sanphamtheoloai', compact('product', 'cate'));
    }

    public function getSPVay(){
        $cate = Cates::find(10);
        $product = Products::where('cates_id',10)->orderBy('id','DESC')->paginate(9);
        return view('pages.sanphamtheoloai', compact('product', 'cate'));
    }

    public function getSPPhuKien(){
        $cate = Cates::find(11);
        $product = Products::where('cates_id',11)->orderBy('id','DESC')->paginate(9);
        return view('pages.sanphamtheoloai', compact('product', 'cate'));
    }

    public function getSPChiTiet($id){
        $product_detail = Products::find($id);
        $cate = Cates::find($product_detail->cates_id);
        $product_related = Products::where('cates_id',$product_detail->cates_id)->where('id','<>',$id)->inRandomOrder()->take(3)->get();
        return view('pages.sanphamchitiet', compact('product_detail','product_related','cate'));
    }


    //Xu huong

    public function getXuHuong(){
        $news = News::where('title','<>','Giới thiệu')->where('title','<>','Tuyển dụng')->where('title','<>','Các cửa hàng')->where('title','<>','Liên hệ')->orderBy('id', 'DESC')->paginate(5);
        return view('pages.xuhuong', compact('news'));
    }

    public function getXuHuongChiTiet($id){
        $news_detail = News::find($id);
        return view('pages.xuhuongchitiet', compact('news_detail'));
    }

    //Tim kiem san pham

    public function timKiem(Request $request){
        $search_key = $request->searchkey;
        $unsigned_search_key = changeTitle($request->searchkey);
        $product = Products::where('name', 'like', "%$search_key%")->orWhere('unsigned_name', 'like', "%$unsigned_search_key%")->take(30)->paginate(8);
        $num_result = $product->count();
        // echo $product[0]->name;
        return view('pages.timkiem', compact('product','search_key', 'num_result'));
    }

}
