<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    //Afficher tous les types de propriété
    public function allType()
    {

        $types = PropertyType::latest()->get();

        return view('backend.PropertyType.allType', compact('types'));
    }

    //Afficher la vue servant à la création de types
    public function addPropertyType()
    {
        return view('backend.PropertyType.addPropertyType');
    }

    //Sauvegarder un nouveau type
    public function StorePropertyType(Request $request)
    {

        $request->validate([
            'type_name' => 'required|unique:property_types|max:200',
            'type_icon' => 'required'
        ]);

        PropertyType::insert([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon
        ]);

        $notification = array(
            'message' => 'Type de propriété créé avec succèes',
            'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);
    }

    //afficher la vue avec l'élément à modifier
    public function UpdatePropertyType($id){

        $types = PropertyType::findOrFail($id);

        return view('backend.PropertyType.UpdatePropertyType', compact('types'));
    }


    //valider la modification
    public function UpdateValidPropertyType(Request $request ){

        $pid = $request->id;

        PropertyType::findOrFail($pid)->update([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon
        ]);

        $notification = array(
            'message' => 'Mise à jour de propriété éffectué avec succèes',
            'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);
    }

    //Supprimer une type de propriété
    public function DeletePropertyType($id){

        PropertyType::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Suppression réalisé avec succèes',
            'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);

    }
}
