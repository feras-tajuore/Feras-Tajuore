<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings.settings')->with('settings',Settings::first());
    }

    public function update(Settings $settings)
    {
        $attrebute = request()->validate([
                        'blog_name' => ['required', 'string', 'max:255'],
                        'blog_email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                        'phone_number' => ['required', 'string','max:255'],
                        'address' => ['required']
                    ]);

        $settings->update($attrebute);

        return redirect()->back();
    }
}
