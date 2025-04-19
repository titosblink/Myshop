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

class ActionsController extends Controller
{
    public function createshop(Request $req){
        try{
            $datas=$req->all();

            $shopname = $req->shopname;
            $address = $req->address;
    
            $CheckForShop = DB::table('shops')->where('name', $shopname)->first();
    
            if($CheckForShop){
              return back()->with('fail','Shop already exist');
            }else{
              DB::insert('insert into shops(name, address) values (?,?)',[$shopname,$address]);
              return back()->with('success','Course successfully Added');
            }
                 
        }catch(\Exception $exception){
          return back()->with('servererror','Sorry! Something is wrong');
        }
      }

      public function deleteshop($id){
        try{

            $SearchShops = DB::table('shops')->where('id', $id)->first();
            DB::table('shops')->where('id', $id)->delete();
            

            return back()->with('success','successfully Deleted');

        }catch(Exception $exception){
          Log::error($exception);
          return back()->with('servererror','Sorry! Something went wrong');
        }
      }
      

      
      public function updateshop(Request $req){
        try{
            $datas=$req->all();

            $shopname = $req->shopname;
            $address = $req->address;
            $id = $req->id;

            DB::table('shops')
                ->where('id', $id)
                ->update(['name'=>$shopname, 'address'=>$address]);
    
            
              return back()->with('success','successfully Updated');
            
                 
        }catch(\Exception $exception){
          return back()->with('servererror','Sorry! Something is wrong');
        }
      }


      //Start of Category CRUD
      public function createcategory(Request $req){
        try{
            $datas=$req->all();

            $cat_title = $req->cat_title;
            $cat_shop = $req->cat_shop;
    
            $CheckForCat = DB::table('category')
            ->where('categoryname', $cat_title)
            ->where('shop', $cat_shop)->first();
    
            if($CheckForCat){
              return back()->with('fail','Category already exist');
            }else{
              DB::insert('insert into category(categoryname, shop) values (?,?)',[$cat_title,Auth::user()->shop]);
              return back()->with('success','Category successfully Added');
            }
                 
        }catch(\Exception $exception){
          return back()->with('servererror','Sorry! Something is wrong');
        }
      }

      public function deletecategory($id){
        try{

            $SearchCat = DB::table('category')->where('id', $id)->first();
            DB::table('category')->where('id', $id)->delete();

            return back()->with('success','successfully Deleted');

        }catch(Exception $exception){
          Log::error($exception);
          return back()->with('servererror','Sorry! Something went wrong');
        }
      }

      public function updatecategory(Request $req){
        try{
            $datas=$req->all();

            $cat_title = $req->cat_title;
            $catshop = $req->catshop;
            $id = $req->id;

            DB::table('category')
                ->where('id', $id)
                ->update(['categoryname'=>$cat_title, 'shop'=>Auth::user()->shop]);
    
              return back()->with('success','successfully Updated');
            
                 
        }catch(\Exception $exception){
          return back()->with('servererror','Sorry! Something is wrong');
        }
      }

      public function createitem(Request $req){
        try{
            $datas=$req->all();

  
            $itemname = $req->itemname;
            $cate = $req->cate;
            $cprice = $req->cprice;
            $sprice = $req->sprice;
            $itemqty = $req->itemqty;

            $CheckForItem = DB::table('item')
                ->where('itemname', $itemname)
                ->where('category',$cate)
                ->where('shop',Auth::user()->shop)->first();

                
    
            if($CheckForItem){

              $newqty = $CheckForItem->qty + $itemqty;

                DB::table('item')
                ->where('itemname', $itemname)
                ->where('category',$cate)
                ->where('shop',Auth::user()->shop)
                ->update(['costprice'=>$cprice, 'sellingprice'=>$sprice, 'qty'=>$newqty,'lastupdated'=>date("Y-m-d")]);
  
              return back()->with('success','Item successfully Added');
            }else{
              DB::insert('insert into item(itemname,category,shop,costprice,sellingprice,dateadded,qty) values (?,?,?,?,?,?,?)',
              [$itemname,$cate,Auth::user()->shop,$cprice,$sprice,date("Y-m-d"),$itemqty]);
              return back()->with('success','Item successfully Added');
            } 
            
        }catch(\Exception $exception){
          return back()->with('servererror','Sorry! Something is wrong');
        }
      }

      public function removeitem(Request $req){
        try{
            $datas=$req->all();

  
            $itemname = $req->itemname;
            $cate = $req->cate;
            $itemqty = $req->itemqty;

            $CheckForItem = DB::table('item')
                ->where('itemname', $itemname)
                ->where('category',$cate)
                ->where('shop',Auth::user()->shop)->first();

            if($CheckForItem){

              if(($CheckForItem->qty)>$itemqty){
                $newqty = $CheckForItem->qty - $itemqty;

                DB::table('item')
                ->where('itemname', $itemname)
                ->where('category',$cate)
                ->where('shop',Auth::user()->shop)
                ->update(['qty'=>$newqty,'lastupdated'=>date("Y-m-d")]);
  
                return back()->with('success','Stock successfully Updated');
              }else{
                return back()->with('fail','Out of Stock');

              }
              
            }else{
              return back()->with('fail','Out of Stock');
            } 
            
        }catch(\Exception $exception){
          return back()->with('servererror','Sorry! Something is wrong');
        }
      }
}
