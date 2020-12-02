<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Blog;
use Illuminate\Support\Facades\Redirect;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Mail\Admin_DeleteAccount;
use App\Mail\Admin_AdminMail;
use App\Transaction;


class AdminController extends Controller
{

    public function __construct() {
        $this->middleware('auth');

      
    }


    // Get Request on Admin's Index Page
    public function get_adminIndex(){
        if(Auth::user()->user_type == 0){
            return redirect('/adminlogin');
        }
        return view('admin.index');
    }

    // Get Request on Admin's Member Page
    public function get_adminMember(){
        if(Auth::user()->user_type == 0){
            return redirect('/adminlogin');
        }
        $users       =  User::all()->except(Auth::id());
        return view('admin.member',compact('users'));
    }
    
    // Get Request on Admin's Order Page
    public function get_adminOrder(){
        if(Auth::user()->user_type == 0){
            return redirect('/adminlogin');
        }
        $orders     =   Transaction::all();
        return view('admin.orders',compact('orders'));
    }

    // Get Request on Admin's Blog Page
    public function get_adminBlog(){
        if(Auth::user()->user_type == 0){
            return redirect('/adminlogin');
        }
        $blogs      =   Blog::all(); 
        return view('admin.blog',compact('blogs'));
    }
    



    public function admin_user(){
        $user       =   User::all();
        $chart_options = [
            'chart_title' => 'New Users by Day',
            'report_type' => 'group_by_date',
            'model' => 'App\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'chart_type' => 'bar',
            'chart_height'=>'0',
            'style_class'=>'userchart'
        ];
        $chart1 = new LaravelChart($chart_options);
        return view('admin.users',compact('chart1','user'));
    }

    public function admin_user_delete($id){
        \Mail::to($user['email'],$user['first-name'])->send(new Admin_DeleteAccount());
        $user       =   User::find($id)->delete();
        return redirect()->back();
    }

    public function admin_sent_mail(){
        $user       =   User::all();
        foreach($user as $u){
        \Mail::to($u['email'],$u['first-name'])->send(new Admin_AdminMail());
    }
        return redirect()->back();
    }
    

    public function admin_deleteblog($id){
        $blog   = Blog::find($id);
        $blog->delete();
        return redirect()->back();
    }

    public function get_adminComment(){
        $comment = Comment::all();
        return view('admin.comments',compact('comment'));
    }

    public function admin_deletecomment($id){
        $comment    = Comment::find($id);
        $comment->delete();
        return redirect()->back();
    }
}
