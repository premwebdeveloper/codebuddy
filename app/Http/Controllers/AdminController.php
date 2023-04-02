<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('admin.dashboard',compact('categories'));
    }

    public function users()
    {
        $users = User::whereHas('roles', function($q){
            $q->where('name', 'user');
        })->get();
        return view('admin.users',compact('users'));
    }
}
