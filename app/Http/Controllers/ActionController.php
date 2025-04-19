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

use App\Models\Userdetails as Userdetails;

class ActionController extends Controller
{
    public function sendmessage(Request $req){
        try{
            $datas=$req->all();

          $Reciever = $req->to;
          $Subject = $req->subject;
          $Message = $req->massage;
          $InfoAddr = $req->infoaddr;
          $From = Auth::user()->email;
          $Dated = date('d-m-Y');
        
          dd($InfoAddr);
          // File::exists($req->passportfilefslc)
            

        }catch(\Exception $exception){
            return back()->with('servererror','Sorry! Something is wrong');
          }
    }

    public function password(Request $req){
      try{
          $datas=$req->all();
         

          $curr_pword = $req->curr_pword;
          $new_pword = $req->new_pword;
          $Hashed_pword = app('hash')->make($new_pword);

          $hash = Auth::user()->password;
          $email = Auth::user()->email;


          if(Hash::check($curr_pword, $hash)){
            $UpdateUser = Userdetails::where('email', $email)->update([
              'password' => $Hashed_pword 
            ]);
            return back()->with('success','Password Successfully changed');
          }else{
            return back()->with('nosuccess','Password not Successfully changed');
          }
               
      }catch(\Exception $exception){
        return back()->with('servererror','Sorry! Something is wrong');
      }
    }
    
    public function createuser(Request $req){
      try{
          $datas=$req->all();
         
          
          $statuss = $req->statuss;
          $uname = $req->uname;
          $pword = app('hash')->make("password");

          $CheckUser = DB::table('users')
                ->where('email', $uname)
                ->first();

          if($CheckUser){
            
            return back()->with('nosuccess','Username existing');
          }else{
            
            DB::insert('insert into users(email, rights, password) values (?,?,?)',[$uname,$statuss,$pword]);
            
            return back()->with('success','Username successfully created');
           
          }
               
      }catch(\Exception $exception){
        return back()->with('servererror','Sorry! Something is wrong');
      }
    }


    public function uploadvids(Request $req){
      try{
          $datas=$req->all();
          $ccode = $req->ccode;

         $VidsFilesCheck=$datas['vidfile'];
         $destinationcheck = base_path() . '/public/videos';
         $fileExtcheck = $VidsFilesCheck->extension();
          if($fileExtcheck=="mp4"){
            $xmlrealfilecheck = $req->file('vidfile')->getClientOriginalName();
			      $req->file('vidfile')->move($destinationcheck, $xmlrealfilecheck);
            
            $CheckCCode = DB::table('videos')
              ->where('coursecode', $ccode)
              ->first();

              if($CheckCCode){
                return back()->with('nosuccess','The video for ' . $ccode . ' already exist');
                   
              }else{
                DB::insert('insert into videos(filename, coursecode) values (?,?)',[$xmlrealfilecheck,$ccode]);
                return back()->with('success', $ccode . ' succesfully uploaded');

              }

          }else{
            return back()->with('nosuccess','File must be in mp4 format');
            
          }
          
          return $fileExtcheck;
               
      }catch(Exception $exception){
        return back()->with('servererror','Sorry! Something is wrong');
      }
    }

    public function courses(){
      $SearchVideos = DB::table('courses')->get();
      
      $admindata = array('SearchVideos'=>$SearchVideos);

      return view('courses',$admindata);

  }

  public function uploadvid(){
    $SearchCourse = DB::table('courses')->get();
    
    $admindata = array('SearchCourse'=>$SearchCourse);

    return view('uploadvids',$admindata);

}
  

  

  public function videos($id){
    try{

      $SearchVideo = DB::table('videos')
        ->where('coursecode', $id)
        ->first();
        $vname = $SearchVideo->filename;
        $filec = $SearchVideo->coursecode;
      $admindata = array('vname'=>$vname, 'filec'=>$filec);

        return view('videos',$admindata);
    }catch(\Exception $exception){
      Log::error($exception);
      return back()->with('servererror','Sorry! Something went wrong');
    }
  }


  public function feedback($id){
    try{

      $admindata = array('id'=>$id);

        return view('feedback',$admindata);
    }catch(\Exception $exception){
      Log::error($exception);
      return back()->with('servererror','Sorry! Something went wrong');
    }
  }
  

  public function feedbacks(Request $req){
    try{
        $datas=$req->all();
  
        $ccode = $req->ccode;
        $feedback = $req->feedback;

          DB::insert('insert into feedback(coursecode, contents) values (?,?)',[$ccode,$feedback]);
          
          return back()->with('success','Your feedback successfully recieved');
         
        
             
    }catch(\Exception $exception){
      return back()->with('servererror','Sorry! Something is wrong');
    }
  }

  public function viewfeedback(){
    try{
        
      $SearchFB = DB::table('feedback')->get();
     
      
      $admindata = array('SearchFB'=>$SearchFB);

      return view('viewfeedback',$admindata);
             
    }catch(Exception $exception){
      return back()->with('servererror','Sorry! Something is wrong');
    }
  }

  public function viewuser(){
    try{
        
      $SearchUsers = DB::table('users')->get();
     
      
      $admindata = array('SearchUsers'=>$SearchUsers);

      return view('viewusers',$admindata);
             
    }catch(Exception $exception){
      return back()->with('servererror','Sorry! Something is wrong');
    }
  }
  
}
