<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductsRequest;

class ProductController extends BaseController
{
    public function __construct ()
    {
        parent::__construct('products');
    }

    public function create()
    {
        return $this->view_admin('create');
    }

    public function edit($id)
    {
        $products = $this->db->where('id', $id);

        if ($products->exists()) {
            $data['products'] = $products->first();
            return $this->view_admin('edit', $data);
        } else {
            abort(404);
        }
    }

    public function update(ProductsRequest $request, $id)
    {
        $product_current = $this->db->where('id', $id)->first();

        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime();
        $this->db->where('id', $id)->update($data);

        return $this->route_admin('index', [] ,['success' => 'Sửa sản phẩm thành công']);
    }

    public function destroy($id)
    {
        $products = $this->db->where('id', $id);

        if ($products->exists()) {
            $product_current = $products->first();
            $products->delete();
            return $this->route_admin('index', [] ,['success' => 'Xóa sản phẩm thành công']);
        } else {
            abort(404);
        }
    }

    public function index()
    {
        $data["products"] = $this->db->get();

        return $this->view_admin('index', $data);
    }


    public function store(ProductsRequest $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime();  
        DB::table('products')->insert($data);
        
        return $this->route_admin('index', [] ,['success' => 'Create thành công']);
    }
}

