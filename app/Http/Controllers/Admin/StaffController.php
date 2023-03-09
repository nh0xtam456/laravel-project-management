<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StaffRequest;

class StaffController extends BaseController
{
    public function __construct ()
    {
        parent::__construct('staffs');
    }

    public function create()
    {
        $branch=DB::table('branchs')->select('Name','id')->get();
                           
        return $this->view_admin('create',['branch' => $branch]);
    }

    public function edit($id)
    {
        $staff = $this->db->where('id', $id);
        $branch=DB::table('branchs')->select('Name','id')->get();
        if ($staff->exists()) {
            $data['staffs'] = $staff->first();
            return $this->view_admin('edit',['staffs' => $data['staffs'],'branch' => $branch]);
        } else {
            abort(404);
        }
    }

    public function update(StaffRequest $request, $id)
    {
        $staff_current = $this->db->where('id', $id)->first();

        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime();
        $this->db->where('id', $id)->update($data);

        return $this->route_admin('index', [] ,['success' => 'Sửa nhân viên thành công']);
    }

    public function destroy($id)
    {
            $this->db->where('id',$id)->update([
                'Status' => 0
            ]);
            return $this->route_admin('index', [] ,['success' => 'Xóa nhân viên thành công']);
        
    }

    public function index()
    {
        $data["staffs"] = $this->db->join('branchs','branchs.id','staffs.Branch_id')
                                    ->select('branchs.Name as branch_name','staffs.*')
                                    ->where('staffs.Status','=','1')
                                    ->get();
                                    
        return $this->view_admin('index', $data);
    }

    public function store(StaffRequest $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime();  
        $data['Seniority']=1;
        $data['Status']=1; 
        DB::table('staffs')->insert($data);
        
        return $this->route_admin('index', [] ,['success' => 'Thêm mới nhân viên thành công']);
    }
}
