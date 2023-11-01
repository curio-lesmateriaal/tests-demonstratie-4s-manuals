<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Type;

class TypeController extends Controller
{
    public function show($brand_id, $brand_slug, $type_id, $type_slug)
    {
        $brand = Brand::findOrFail($brand_id);
        $type = Type::findOrFail($type_id);
        $manuals = $type->Manuals()->get();

        return view('pages/manual_list', [
            "manuals"=>$manuals,
            "type"=>$type,
            "brand"=>$brand
        ]);
    }
}
