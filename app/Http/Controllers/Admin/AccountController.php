<?php
/**
 * Created by PhpStorm.
 * User: slavko
 * Date: 18.04.19
 * Time: 20:04
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function index(){
        return view('admin.index');
    }
}