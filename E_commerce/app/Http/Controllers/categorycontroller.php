<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categories;
use App\pinfo;
use App\productinfo;
use DB;

class categorycontroller extends Controller
{
    public function category(){
    	return view('admin.category.addcategory');
    }

    public function addcategory(Request $request){

        $this->validate($request,['cname'=>'required|min:5|max:7|unique:categories']);//unique dile oi column er man unique hobe. unique:table name dite hobe. 

    	$categories = new categories(); 

    	$categories->cname = $request->cname;
    	$categories->cdiscription = $request->cdiscription;
    	$categories->pstatus = $request->pstatus;
    	$categories->save();
    	return redirect('/add-category')->with('msg','added.............');
    }

    public function productinfo(){
        $category = categories::all();
    	return view('admin.category.productinfo',['categori'=>$category]);
    }

    public function pinfo(Request $request){
          

		$pinfo = new productinfo();
		$pinfo->product_name = $request->pname;
        $pinfo->product_category = $request->pcategory;
		$pinfo->product_color = $request->pcolor;
		$pinfo->product_price = $request->pprice;
        $pinfo->product_image = 'picture';
		$pinfo->save();

        $lastid = $pinfo->id;
        $productimage = $request->file('pimage');
        $name = $lastid.$productimage->getClientOriginalName();
        $uploadpath = 'public/uploadpic/';
        $productimage->move($uploadpath, $name); 
        $imageurl = $uploadpath.$name;

        $updateimage = productinfo::find($lastid);
        $updateimage->product_image = $imageurl;
        $updateimage->save();

        return redirect('/product-info')->with('msg','hogeya.......');
    }

    public function managecategory(){
        //$category = categories::all(); evabeo kora jabe

        $productinfo = DB::table('productinfos')->paginate(5); // query builder.. pagination korte caile evabe.
        return view('admin.category.managecategory',['productinfo'=>$productinfo]);
    }

    public function editproduct($id){
        $productbyid = productinfo::where('id',$id)->first();
        $category = categories::all();
        return view('admin.category.editproduct',['productid'=>$productbyid], ['categori'=>$category]);
    }

public function upadateproduct(Request $request){
        $p = productinfo::find($request->ppid);

        $productimage = $request->file('productpic');
        if ($productimage) {
            unlink($p->product_image);
            $iname = $request->ppid.$productimage->getClientOriginalName();
            $imagepath = 'public/uploadpic/';
            $productimage->move($imagepath,$iname);
            $imageurl = $imagepath.$iname;
        }
        else{
            $imageurl = $p->productimage;
        }
        $p->product_name = $request->productname;
        $p->product_category = $request->productcategory;
        $p->product_color = $request->productcolor;
        $p->product_price = $request->productprice;
        $p->product_image = $imageurl;
        $p->save();

        return redirect('/manage-category')->with('msg','hooggeeyyaa..');
    }

    public function edit($id){
        //return $id; id dekhabe

        $categorybyid = categories::where('id',$id)->first();
        return view('admin.category.editcategory',['category'=>$categorybyid]);
    }

    public function update_category(Request $request){
        //dd($request->all()); // check korar ekta upai.....
        $category = categories::find($request->ccid);

        $category->cname = $request->cname;
        $category->cdiscription = $request->cdiscription;
        $category->pstatus = $request->pstatus;
        $category->save();
        return redirect('/manage-category')->with('msg', 'category apdated succesfully');
    }

    

    public function delete_category($id){
        $category = categories::find($id);
        $category->delete();

        return redirect('/manage-category')->with('msg','delete hogeya');
    }
}
