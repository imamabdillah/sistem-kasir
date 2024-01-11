<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tenant;
use App\Models\TenantInfo;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function home()
    {
        $tenantInfos = TenantInfo::all();

        return view('member.home', ['tenantInfos' => $tenantInfos]);
    }
    public function index()
    {
        $tenants = Tenant::all();
        $users = User::where('role', 'member')->get();
        return view('admin.usermember.usermember', compact('users'));
    }
}
