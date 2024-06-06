<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function superadmin()
    {
        return view('admin.superadmin');
    }

    public function users()
    {
        return view('admin.superadmin.users');
    }

}
