<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StaffinformationsRequest;

class StaffinformationController extends BaseController
{
    public function __construct ()
    {
        parent::__construct('staffinformations');
    }

    public function create()
    {
        return $this->view_admin('create');
    }

    public function edit($id)
    {
        $staffinformations = $this->db->where('id', $id);

        if ($staffinformations->exists()) {
            $data['staffinformations'] = $staffinformations->first();
            return $this->view_admin('edit', $data);
        } else {
            abort(404);
        }
    }

    public function update(StaffinformationsRequest $request, $id)
    {
        $staff_current = $this->db->where('id', $id)->first();

        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime();
        $this->db->where('id', $id)->update($data);

        return $this->route_admin('index', [] ,['success' => 'Sửa sản phẩm thành công']);
    }

    public function destroy($id)
    {
        $staffinformations = $this->db->where('id', $id);

        if ($staffinformations->exists()) {
            $staff_current = $staffinformations->first();
            $staffinformations->delete();
            return $this->route_admin('index', [] ,['success' => 'Xóa sản phẩm thành công']);
        } else {
            abort(404);
        }
    }

    public function index()
    {
        $data["staffinformations"] = $this->db->get();

        return $this->view_admin('index', $data);
    }
    


    public function store(StaffinformationsRequest $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime();  
        DB::table('staffinformations')->insert($data);
        
        return $this->route_admin('index', [] ,['success' => 'Create thành công']);
    }

}
