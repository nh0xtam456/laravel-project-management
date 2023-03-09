<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SalesRequest;

class SalesController extends BaseController
{
    public function __construct ()
    {
        parent::__construct('sales');
    }

    public function chart()
    {
        
    }

    public function create()
    {
        return view('admin.modules.sales.create');
    }

    public function store(SalesRequest $request)
    {
        $data = $request->except('_token');
        DB::table('sales')->insert($data);
        
        return $this->route_admin('index', [] ,['success' => 'Create thành công']);
    }

    public function index()
    {
        $sales = $this->db
                            ->join('bills', 'sales.bills', '=', 'bills.id')
                            ->select('sales.*', 'bills.id as bills_id' ,'bills.price as bills_price',  DB::raw('SUM(bills.price) as total_price'))
                            ->groupBy('bills.created_at')->get();
        return $this->view_admin('index', [ 'sales' => $sales]);
    }

    public function edit($id)
    {
        $sales = $this->db->where('id', $id);

        if ($sales->exists()) {
            $data['sales'] = $sales->first();
            return $this->view_admin('edit', $data);
        } else {
            abort(404);
        }
    }

    public function update(SalesRequest $request, $id)
    {
        $sales_current = $this->db->where('id', $id)->first();

        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime();
        $this->db->where('id', $id)->update($data);

        return $this->route_admin('calendar', [] ,['success' => 'Sửa sản phẩm thành công']);
    }

    public function destroy($id)
    {
        $sales = $this->db->where('id', $id);

        if ($sales->exists()) {
            $sales_current = $sales->first();
            $sales->delete();
            return $this->route_admin('calendar', [] ,['success' => 'Xóa sản phẩm thành công']);
        } else {
            abort(404);
        }
    }
}
