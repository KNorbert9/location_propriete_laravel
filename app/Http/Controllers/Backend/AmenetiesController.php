<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Models\Ameneties;
use Illuminate\Http\Request;

class AmenetiesController extends Controller
{
    public function allAmeneties()
    {
        $ameneties = Ameneties::latest()->get();

        return view('backend.ameneties.allAmeneties', compact('ameneties'));
    }


    public function addAmeneties()
    {
        return view('backend.ameneties.addAmeneties');
    }

    public function StoreAmeneties(Request $request)
    {
        $request->validate([
            'amenety_name' => 'required|unique:ameneties|max:200'
        ]);

        Ameneties::insert([
            'amenety_name' => $request->amenety_name
        ]);

        $notification = array(
            'message' => 'Amneties créé avec succèes',
            'alert-type' => 'success'
        );

        return redirect()->route('all.ameneties')->with($notification);
    }


    public function UpdateAmeneties($id)
    {
        $ameneties = Ameneties::findOrFail($id);

        return view('backend.Ameneties.updateAmeneties', compact('ameneties'));
    }

    public function UpdateValidAmeneties(Request $request)
    {

        $pid = $request->id;

        Ameneties::findOrFail($pid)->update([
            'amenety_name'=>$request->amenety_name
        ]);


        $notification = array(
            'message' => 'Mise à jour d ameneties avec succèes',
            'alert-type' => 'success'
        );

        return redirect()->route('all.ameneties')->with($notification);
    }

    public function DeleteAmeneties($id)
    {
        Ameneties::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Suppression réalisé avec succèes',
            'alert-type' => 'success'
        );

        return redirect()->route('all.ameneties')->with($notification);

    }
}
