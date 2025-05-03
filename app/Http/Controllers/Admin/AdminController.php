<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Classe;
use App\Models\Transaction;
use App\Models\User;
use App\Models\WithdrawRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Mockery\CountValidator\Exception;
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');

    }

}