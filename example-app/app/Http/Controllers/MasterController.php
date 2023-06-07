<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\product;
use App\Models\Slide;
use App\Models\Type_Product;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Bill_Detail;

class MasterController extends Controller
{
    public function getAdminEdit($id)
    {
        $product = Product::find($id);
        return view('adminpage.formEdit')->with('product', $product);
    }

    public function getIndex()
    {
        $slide = Slide::all();
        $new_product = Product::where('new', 1)->paginate(8);
        $sanpham_khuyenmai = Product::where('promotion_price', '<>', 0)->paginate(4);
        return view('page.trangchu', compact('slide', 'new_product', 'sanpham_khuyenmai'));
    }

    public function getIndexAdmin()
    {
        $products = Product::all();
        return view('adminpage.admin')->with(['products' => $products, 'sumSold' => count(Bill_Detail::all())]);
    }

    public function getDetail(Request $request)
    {
        $sanpham = Product::where('id', $request->id)->first();
        $splienquan = Product::where('id', '<>', $sanpham->id, 'and', 'id_type', '=', $sanpham->id_type)->paginate(3);
        $comments = Comment::where('id_product', $request->id)->get();
        return view('page.chitiet_sanpham', compact('sanpham', 'splienquan', 'comments'));
    }
    public function getLoaiSp($type)
    {
        $type_product = Type_Product::all();

        $sp_theoloai = Product::where('id_type', $type)->get();

        $sp_khac = Product::where('id_type', '<>', $type)->paginate(3);

        return view('page.loai_sanpham', compact('sp_theoloai', 'type_product', 'sp_khac'));
    }
    public function getAdminAdd()
    {
        return view('adminpage.formAdd');
    }

    public function postAdminEdit(Request $request)
    {
        $id = $request->editId;

        $product = Product::find($id);
        if ($request->hasFile('editImage')) {
            $file = $request->file('editImage');
            $fileName = $file->getClientOriginalName();
            $file->move('/image/product', $fileName);
        }

        if ($request->file('editImage') != null) {
            $product->image = $fileName;
        }

        $product->name = $request->editName;
        $product->description = $request->editDescription;
        $product->unit_price = $request->editPrice;
        $product->promotion_price = $request->editPromotionPrice;
        $product->unit = $request->editUnit;
        $product->new = $request->editNew;
        $product->id_type = $request->editType;
        $product->save();
        return redirect('/admin');
    }

    public function postAdminDelete($id) {
        $product = Product::find($id);
        $product->delete();
        return redirect('/admin');
    }

    public function postAdminAdd(Request $request)
    {
        $product = new product();
        if ($request->hasFile('inputImage')) {
            $file = $request->file('inputImage');
            $fileName = $file->getClientOriginalName();
            $file->move('source/image/product', $fileName);
        }
        $file_name = null;
        if ($request->file('inputImage') != null) {
            $file_name = $request->file('inputImage')->getClientOriginalName();
        }

        $product->name = $request->inputName;
        $product->image = $file_name;
        $product->description = $request->inputDescription;
        $product->unit_price = $request->inputPrice;
        $product->promotion_price = $request->inputPromotionPrice;
        $product->unit = $request->inputUnit;
        $product->new = $request->inputNew;
        $product->id_type = $request->inputType;
        $product->save();
        return redirect('/admin');

    }
    public function show()
    {
        return view('page.trangchu');
    }
    public function product()
    {
        return view('page.loai_sanpham');
    }

    public function productDetail()
    {
        return view('page.chitiet_sanpham');
    }
    public function contact()
    {
        return view('page.lienhe');
    }
    public function about()
    {
        return view('page.about');
    }
    public function date()
    {
        $day = Carbon::now()->dayOfWeek;
        return view('page.trangchu',  ['day' => $day]);
    }
}
