<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PTCSRequest;

class PTCSController extends BaseController
{
    public function __construct ()
    {
        parent::__construct('ptcs');
    }

    public function calendar()
    {
        $events = array();
        $customers = DB::table('customers')->get();
        foreach ($customers as $item)
        {
            $events[] = [
                'title' => $item->id,
                'start' => $item->date_todo,
                'backgroundColor'=> '#f56954', //red
                'borderColor'    => '#f56954', //red
                'end' => date('d-m-Y', strtotime("+1 hour", strtotime($item->date_todo))),
            ];
        }
        return view('admin.modules.ptcs.calendar', ['events' => $events]);
    }

    public function store(PTCSRequest $request)
    {
        $data = $request->except('_token');
        DB::table('ptcs')->insert($data);
        
        return $this->route_admin('index', [] ,['success' => 'Create thành công']);
    }

    public function index()
    {
        $customers = DB::table('customers') ->leftjoin('branchs','branchs.id','=','customers.branch_id')
                                        ->leftjoin('staffs', 'staffs.id', '=', 'customers.staff_id')
                                        ->select('staffs.Fullname as staff_name','customers.*')
                                        ->get();
        return $this->view_admin('index', ['customers' => $customers]);
    }

    public function edit($id)
    {
        $ptcs = $this->db->where('id', $id);

        if ($ptcs->exists()) {
            $data['ptcs'] = $ptcs->first();
            return $this->view_admin('edit', $data);
        } else {
            abort(404);
        }
    }

    public function update(PTCSRequest $request, $id)
    {
        $ptcs_current = $this->db->where('id', $id)->first();

        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime();
        $this->db->where('id', $id)->update($data);

        return $this->route_admin('calendar', [] ,['success' => 'Sửa PTCS thành công']);
    }

    public function destroy($id)
    {
        $ptcs = $this->db->where('id', $id);

        if ($ptcs->exists()) {
            $ptcs_current = $ptcs->first();
            $ptcs->delete();
            return $this->route_admin('calendar', [] ,['success' => 'Xóa PTCS thành công']);
        } else {
            abort(404);
        }
    }
}
