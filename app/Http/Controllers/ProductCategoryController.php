<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductCategoryController extends Controller
{
    public function show($category_id, $category_slug)
    {

        $brands = DB::table ('product_categories')
            ->join('type_product_category', 'type_product_category.product_category_id', 'product_categories.id')
            ->join('types', 'types.id', 'type_product_category.type_id')
            ->rightJoin('brands', 'brands.id', '=', 'types.brand_id')
            ->distinct('brands.name')
            ->where('product_categories.id', '=', $category_id)
            ->orderBy('brands.name', 'ASC')
            ->get(['brands.name AS name', 'brands.id', DB::raw("REPLACE(brands.name, '/', '') as name_url_encoded ")]);

        return view('pages/product_category_brands', compact('brands'));
    }
}
