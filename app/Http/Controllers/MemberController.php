<?php

namespace App\Http\Controllers;

use App\Members;
use Illuminate\Http\Request;

class MemberController extends Controller
{
     function activeuser(){
        $members = Members::paginate(5);
        return view("activeusers")->with("users", $members);
    }
    
    function archive(){
        $members = Members::onlyTrashed()->paginate(5);
        return view("archiveusers")->with("users", $members);
    }

    function registeruser(){
        $members = Members::paginate(5);
        return view("formregistration")->with("users", $members);
    }

    function SaveToDatabase(Request $request){ // Saves user to database
        $user = new Members;
        $user-> role = $request->role;
        $user-> username = $request->username;
        $user-> password = $request->password;
        $user-> first_name = $request->first_name;
        $user-> last_name = $request->last_name;
        $user-> middle_name = $request->middle_name;
        $user-> extension_name = $request->extension_name;
        $user->save();

        return redirect('/'); 
    }

     function hide($id){
        $user = Members::find($id);
        if ($user) $user->delete();
        return redirect('/'); 
    }

    function restore($id){
        $user = Members::withTrashed()->find($id);
        if ($user) $user->restore();
        return redirect('/archived');
    }
    function update_form($id){
        $user = Members::find($id);
        
        return view('updateusers')->with("user", $user);
    }

    function update($id, Request $request){
        $user = Members::find($id);
        $user-> role = $request->role;
        $user-> username = $request->username;
        $user-> password = $request->password;
        $user-> first_name = $request->first_name;
        $user-> last_name = $request->last_name;
        $user-> middle_name = $request->middle_name;
        $user-> extension_name = $request->extension_name;
        $user->save();

        return redirect('/');
    }
}
