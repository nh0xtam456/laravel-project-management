<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\BranchRequest;
use Illuminate\Support\Facades\DB;

class BranchController extends BaseController
{
    public function __construct ()
    {
        parent::__construct('branchs');
    }

    public function create()
    {
        return $this->view_admin('create');
    }

    public function edit($id)
    {
        $branchs = $this->db->where('id', $id);

        if ($branchs->exists()) {
            $data['branchs'] = $branchs->first();
            return $this->view_admin('edit', $data);
        } else {
            abort(404);
        }
    }

    public function view($id)
    {
        $branch = DB::table('branchs')->where('id', $id)->first();


        $customers = DB::table('customers')
                        ->join('branchs', 'branchs.id', '=', 'customers.branch_id')
                        ->join('staffs',  'staffs.id' , '=', 'customers.staff_id')
                        ->select('customers.*','staffs.Fullname as Staffname')
                        ->where('branchs.id',$id)
                        ->get();
        
        return view('admin.modules.branchs.view', ['customers' => $customers, 'branch' => $branch]);
    }
    
    public function editview($id)
    {

        $customers = $this->db->join('customers', 'branchs.id', '=', 'customers.branch_id')
                                ->join('staffs', 'branchs.id', '=', 'staffs.Branch_id')
                                ->select('customers.*','staffs.Fullname as Staffname','customers.Fullname as customername','branchs.id as branchs_id')
                                ->where('customers.id',$id)
                                ->first();
        $items = DB::table('customers')->join('branchs', 'branchs.id', '=', 'customers.branch_id')
                                        ->join('staffs', 'branchs.id', '=', 'staffs.Branch_id')
                                        ->select('staffs.Fullname','staffs.id')
                                        ->where('customers.id',$id)
                                        ->get();
      
        return view('admin.modules.branchs.editview', [ 'customers' => $customers, 'items' => $items]);
    }

    public function updateview(Request $request, $id)
    {
        $branchs_current = $this->db->join('customers', 'branchs.id', '=', 'customers.branch_id')
                                    ->join('staffs', 'branchs.id', '=', 'staffs.Branch_id')
                                    ->select('customers.*','staffs.Fullname as Staffname','customers.Fullname as customername','branchs.id as branchs_id')
                                    ->where('branchs.id',$id)
                                    ->first();

        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime();
        DB::table('customers')->where('id', $id)->update($data);
        
        return $this->route_admin('index', [] ,['success' => 'Sửa thông tin ca vụ thành công']);
    }
    

    public function update(BranchRequest $request, $id)
    {
        $branchs_current = $this->db->where('id', $id)->first();

        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime();
        $this->db->where('id', $id)->update($data);

        return $this->route_admin('index', [] ,['success' => 'Sửa thông tin chi nhánh thành công']);
    }

    public function destroy($id)
    {
        $this->db->where('id',$id)->update([
            'Status' => 0
        ]);
        return $this->route_admin('index', [] ,['success' => 'Xóa chi nhánh thành công']);
    }

    public function index()
    {
        $data["branchs"] = $this->db->where('Status','=','1')->get();
        return $this->view_admin('index', $data);
    }
    public function store(BranchRequest $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime();
        $data['Status'] = '1';  
        DB::table('branchs')->insert($data);
        
        return $this->route_admin('index', [] ,['success' => 'Tạo chi nhánh mới thành công']);
    }
}
