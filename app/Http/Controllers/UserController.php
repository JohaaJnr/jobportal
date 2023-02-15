<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Jobs;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function register(Request $request){
        
        $validated = $request->validate([
            'username' => 'required|max:100',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);
        
        if($validated){
             $user = new User;
            $user->name = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            $user->save();
            return redirect('login')->with(['msg' => 'User created successfully']);
        }
        return redirect()->back()->withErrors(['msg' => 'User already exist']);
           
    }


    public function login(Request $request){
        
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $remember = $request->remember;
        if (Auth::attempt($validated, $remember)){
            $request->session()->regenerate();
            return redirect('/')->with(['msg' => 'Welcome ' . Auth::user()->name ]);
        }
        
            return redirect()->back()->withErrors(['msg' => 'Credentials doesnt match. Login Failed']);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->withErrors([ 'msg' => 'You are logged out. Login again']);
    }

    public function postjob(Request $request){
        
        $validated = $request->validate([
            'title' => 'required|max:200',
            'meta' => 'required|max:200',
            'type' => 'required',
            'email' => 'required',
            'vacancy' => 'required|max:200',
            'salary' => 'required',
            'company' => 'required',
            'category' => 'required',
            'img' => 'required|mimes:jpeg,png,jpg,gif',
            'address' => 'required',
            'description' => 'required|max:1000',
        ]);
       if(Auth::user() && $validated){
        
            $path = $request->file('img')->store('img');
            
            $job = new Jobs;
            $job->user_id = Auth::user()->id;
            $job->job_title = $request->title;
            $job->job_meta = $request->meta;
            $job->job_type = $request->type;
            $job->job_contact = $request->email;
            $job->job_vacancies = $request->vacancy;
            $job->job_salary = $request->salary;
            $job->company_name = $request->company;
            $job->category_id = $request->category;
            $job->job_image = $path;
            $job->job_location = $request->address;
            $job->job_description = $request->description;
           $job->save();
           return redirect()->back()->with(['msg' => 'Job Posted Successfully']);
          
       }
       return redirect()->back()->withErrors(['msg' => 'Job Posting Failed. Refresh the page and try again']);
    }


    public function newcat(Request $request){
        $validated = $request->validate([
            'category' => 'required|regex:/^[\pL\s\-\/]+$/u',
        ]);
        if(Auth::user() && $validated){
            $category = new Category;
            $category->category_name = $request->category;
            
            $category->save();
            return redirect()->back()->with(['msg' => 'Category created successfully']);
        }
        return redirect()->back()->withErrors(['msg' => 'Category creation failed. Try again']);
    }

}
