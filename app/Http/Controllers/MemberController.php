<?php

namespace App\Http\Controllers;

use App\Models\TenantInfo;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function home()
    {
        $tenantInfos = TenantInfo::all();

        return view('member.home', ['tenantInfos' => $tenantInfos]);
    }
}
