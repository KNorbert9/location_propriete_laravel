<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View as ViewView;

class AdminController extends Controller
{

    //methode pour appeler la vue
    public function adminDashboard()
    {
        return view('admin.index');
    }

    //methode pour se déconnecter
    public function adminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function adminLogin()
    {
        return view('admin.admin_login');
    }

    public function adminProfile()
    {

        //Code pour récupérer l'id de l'utilisateur
        $id = Auth::user()->id;

        //Trouver le profile par rapport à l'id
        $profileData = User::find($id);

        return view('admin.admin_profile_view', compact('profileData'));
    }

    public function adminProfileStore(Request $request)
    {

        $id = Auth::user()->id;

        $data = User::find($id);

        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->numero = $request->numero;
        $data->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = date('Y-m-d-Hi') . "." . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] = $filename;
        }


        $data->save();

        $notification = array(
            'message' => 'Profile admin modifié avec success ',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function adminProfilePassword()
    {

        $id = Auth::user()->id;

        $profileData = User::find($id);
        return view('admin.admin_profile_password', compact('profileData'));
    }

    public function adminPasswordUpdate(Request $request)
    {

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'require|confirmed'
        ]);

        if (!Hash::check($request->old_password, auth::user()->password)) {

            $notification = array(
                'message' => 'ancien mot de passe incorrect !',
                'alert-type' => 'error'
            );

            return back()->width($notification);
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Mot de pass change avec success !',
            'alert-type' => 'success'
        );

        return back()->width($notification);

    }
}
