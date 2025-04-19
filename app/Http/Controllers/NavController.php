<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\File;
use session;
use Log;
use Carbon;
use Hash;

use App\Models\Shops as Shops;

class NavController extends Controller
{
    public function addshop(){
        try{
            
            return view('addshop');
                 
        }catch(Exception $exception){
          return back()->with('servererror','Sorry! Something is wrong');
        }
      }

    public function viewshop(){
        try{
            
            $SearchShops = DB::table('shops')->get();
            $shopdata = array('SearchShops'=>$SearchShops);

            return view('viewshop',$shopdata);
                 
        }catch(Exception $exception){
          return back()->with('servererror','Sorry! Something is wrong');
        }
      }

      public function editshop($id){
        try{
            
            $SearchShops = DB::table('shops')->where('id', $id)->first();

            $name = $SearchShops->name;
            $address = $SearchShops->address;
            
            $shopdata = array('name'=>$name,'address'=>$address,'id'=>$id);
            
            return view('editshop',$shopdata);
                 
        }catch(Exception $exception){
          return back()->with('servererror','Sorry! Something is wrong');
        }
      }


      //End of Shop Crud


      //Start of Category Crud
      public function addcategory(){
        try{
            
            $SearchShops = DB::table('shops')->get();
            $catdata = array('SearchShops'=>$SearchShops);
            return view('addcategory',$catdata);
                 
        }catch(Exception $exception){
          return back()->with('servererror','Sorry! Something is wrong');
        }
      }

      public function viewcategory(){
        try{
            
            $SearchCat = DB::table('category')->get();
            $Catdata = array('SearchCat'=>$SearchCat);

            return view('viewcategory',$Catdata);
                 
        }catch(Exception $exception){
          return back()->with('servererror','Sorry! Something is wrong');
        }
      }

      public function editcategory($id){
        try{
            
            $SearchCat = DB::table('category')->where('id', $id)->first();

            $catname = $SearchCat->categoryname;
            $catshop = $SearchCat->shop;

            $SearchShops = DB::table('shops')->get();
            
            $shopdata = array('catname'=>$catname,'catshop'=>$catshop,'id'=>$id, 'SearchShops'=>$SearchShops);

            return view('editcategory',$shopdata);
                 
        }catch(Exception $exception){
          return back()->with('servererror','Sorry! Something is wrong');
        }
      }

      public function shoppage($id){
        try{
            
            $SearchShop = DB::table('shops')->where('id', $id)->first();
            $spname = $SearchShop->name;
            
            $shopdata = array('spname'=>$spname);

            return view('shoppage',$shopdata);
                 
        }catch(Exception $exception){
          return back()->with('servererror','Sorry! Something is wrong');
        }
      }

      public function shophome($id){
        try{
            

          $SearchShopsName = DB::table('shops')->where('id', $id)->first()->name;
          $SearchShopsCode = DB::table('shops')->where('id', $id)->first()->id;
            DB::table('users')
            ->where('email', Auth::user()->email)
            ->update(['shop'=>$SearchShopsName,'shopcode'=>$SearchShopsCode]);

            return view('shophome');
                 
        }catch(Exception $exception){
          return back()->with('servererror','Sorry! Something is wrong');
        }
      }

      public function additem(){
        try{
            $SearchCatName = DB::table('category')->where('shop', Auth::user()->shop)->get();
            $arraydata = array('SearchCatName'=>$SearchCatName);
            return view('additem',$arraydata);
                 
        }catch(Exception $exception){
          return back()->with('servererror','Sorry! Something is wrong');
        }
      }

      public function viewstock(){
        try{
            
            $SearchItem = DB::table('item')->get();
            $stockdata = array('SearchItem'=>$SearchItem);

            return view('viewstock',$stockdata);
                 
        }catch(Exception $exception){
          return back()->with('servererror','Sorry! Something is wrong');
        }
      }

      public function remitem(){
        try{
            $SearchCatName = DB::table('category')->where('shop', Auth::user()->shop)->get();
            $arraydata = array('SearchCatName'=>$SearchCatName);
            return view('remitem',$arraydata);
                 
        }catch(Exception $exception){
          return back()->with('servererror','Sorry! Something is wrong');
        }
      }
}
