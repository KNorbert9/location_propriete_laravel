<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Ameneties;
use App\Models\property;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function allProperties()
    {
        $properties = Property::with('propertyType', 'ameneties')->get();

        return view('backend.Property.AllProperty', compact('properties'));
    }

    public function addProperties()
    {
        $ameneties = Ameneties::all();
        $propertyType = PropertyType::all();
        return view('backend.Property.AddProperty', compact('ameneties', 'propertyType'));
    }

    public function StoreProperties(Request $request)
    {

        // $request->validate([
        //     'name' =>  'required',
        //     'location' => 'required',
        //     'area'=> 'required',
        //     'beds'=> 'required',
        //     'bath'=> 'required',
        //     'garage'=> 'required',
        //     'plan'=> 'required',
        //     'property_type_id'=> 'required'
        // ]);

        $data = new property();

        $data->name = $request->name;
        $data->location = $request->location;
        $data->area = $request->area;
        $data->beds = $request->beds;
        $data->baths = $request->baths;
        $data->garage = $request->garage;
        $data->plan = $request->plan;
        $data->images = $request->images;
        $data->property_type_id = $request->property_type_id;

        $data->save();

        $data->ameneties()->sync($request->input('ameneties', []));


        $notification = array(
            'message' => 'Propriété créé avec succèes',
            'alert-type' => 'success'
        );

        return redirect()->route('all.properties')->with($notification);

    }

    public function UpdateProperties()
    {
    }

    public function UpdateValidProperties()
    {
    }

    public function DeleteProperties()
    {
    }
}
