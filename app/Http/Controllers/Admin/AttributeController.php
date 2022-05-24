<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeRequest;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttributeController extends Controller
{

    public function index()
    {
        $attributes = Attribute::get();
//        return response()->json($attributes);
        return view('admin.attribute.index', compact('attributes'));
    }

    public function create()
    {
        return view('admin.attribute.create');
    }

    public function store(AttributeRequest $request)
    {

        $ch = 0;
        if($request->has('is_required'))
            $ch = $request->is_required;

        $attribute = Attribute::create([
            'name' => $request -> name,
            'field_type' => $request -> field_type,
            'is_required' =>  $ch
        ]);

        if ($attribute)
            return response()->json([
                'status' => true,
                'msg' => "Attribute added successfully"
            ]);
        else
            return response()->json([
                'status' => false,
                'msg' => "error"
            ]);
    }

    public function edit($id)
    {
        $attribute = Attribute::find($id);
        if (!$attribute) {
            return redirect()->back()->with('error', 'Attribute does not exist');
        }
        return view('admin.attribute.edit', compact('attribute'));
    }

    public function update(AttributeRequest $request, $id)
    {
        $attribute = Attribute::find($id);
        if (!$attribute) {
            return redirect()->back()->with('error', 'Attribute does not exist');
        }
        $attribute->update([
            'name' => $request->name,
        ]);
        return redirect()->route('view.attribute', compact('attribute'))->with('update', 'Attribute updated successfully');
    }

    public function delete($id)
    {
        $attribute = Attribute::find($id);
        if (!$attribute) {
            return redirect()->back()->with('error', 'Attribute does not exist');
        }
        $attribute->delete();
        return redirect()->back()->with('delete', 'Attribute deleted successfully');
    }

}
