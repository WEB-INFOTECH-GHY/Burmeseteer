<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Models\Game;


class DashboardController extends Controller
{
public function dashboardView()
{
    $today = now()->toDateString();

    return view('admin.dashboard', [
        'today'     => $today,
        'game'      => Game::forDate($today)->first(), // null = not generated yet
        'defaultFr' => config('teer.fr_time', '16:00'),
        'defaultSr' => config('teer.sr_time', '17:00'),
    ]);
}









    public function changePasswordForm()
    {
        return view('admin.change_password');
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'min:8', 'same:confirm_password'],
        ]);

        $user = Admin::where('id',1)->first();

        if(Hash::check($request->input('current_password'), $user->password)){
            Admin::where('id',1)->update([
            'password'=>Hash::make($request->input('new_password')),
            ]);
            return redirect()->back()->with('message','Password Changed Successfully');
        }else{
            return redirect()->back()->with('error','Sorry Current Password Does Not Correct');
        }
    }
}
