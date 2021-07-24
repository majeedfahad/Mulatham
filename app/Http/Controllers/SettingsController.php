<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function admin()
    {
        $settings = DB::table('settings')->get();
        return view('admin.settings', compact('settings'));
    }

    public function activeSetting($id)
    {
        $setting = Setting::find($id);
        $setting->value = 1;
        $setting->update();
        return back();
    }
    public function deActiveSetting($id)
    {
        $setting = Setting::find($id);
        $setting->value = 0;
        $setting->update();
        return back();
    }
}
