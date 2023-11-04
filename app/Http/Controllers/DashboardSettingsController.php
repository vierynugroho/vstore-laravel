<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardSettingsController extends Controller
{
    public function settings()
    {
        $user = Auth::user();
        $categories = Category::all();
        return view('pages.dashboard-settings', [
            'user' => $user,
            'categories'=> $categories
        ]);
    }
    public function account()
    {
         $user = User::with(['province', 'regencies'])->where('id', Auth::user()->id)->first();
        // $user = Auth::user();

        return view('pages.dashboard-account', [
            'user'=> $user
        ]);
    }

    public function update(Request $request, $redirect){
        $data = $request->all();
        $item = Auth::user();

        $item->update($data);

        return redirect()->route($redirect);
    }
}
