<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SchedulesRequest;

class SchedulesController extends BaseController
{
    public function __construct ()
    {
        parent::__construct('schedules');
    }

    public function calendar()
    {
        $events = array();
        $schedules = $this->db->get();
        foreach ($schedules as $item)
        {
            
            $events[] = [
                'title' => $item->MNV,
                'start' => $item->Dayoff,
                'backgroundColor'=> '#f56954', //red
                'borderColor'    => '#f56954', //red
                'end' => date('d-m-Y', strtotime("+1 day", strtotime($item->Dayoff)))
            ];
    
        }
        return view('admin.modules.schedules.calendar', ['events' => $events]);
    }

    public function create()
    {
        $data['data'] = DB::table('staffs')->select('id')->get();
        return view('admin.modules.schedules.create',$data);
    }

    public function store(SchedulesRequest $request)
    {
        $data = $request->except('_token');
        DB::table('schedules')->insert($data);
        
        return $this->route_admin('index', [] ,['success' => 'Create thành công']);
    }

    public function index()
    {
        $data["schedules"] = DB::table('schedules')->join('staffs','staffs.id','=','schedules.MNV')
                                        
                                        ->get();    
        return $this->view_admin('index', $data);
    }

    public function edit($id)
    {
        $schedules = $this->db->where('id', $id);

        if ($schedules->exists()) {
            $data['schedules'] = $schedules->first();
            return $this->view_admin('edit', $data);
        } else {
            abort(404);
        }
    }

    public function update(SchedulesRequest $request, $id)
    {
        $schedules_current = $this->db->where('id', $id)->first();

        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime();
        $this->db->where('id', $id)->update($data);

        return $this->route_admin('calendar', [] ,['success' => 'Sửa lịch làm việc thành công']);
    }

    public function destroy($id)
    {
        $schedules = $this->db->where('id', $id);

        if ($schedules->exists()) {
            $schedules_current = $schedules->first();
            $schedules->delete();
            return $this->route_admin('calendar', [] ,['success' => 'Xóa lịch làm việc thành công']);
        } else {
            abort(404);
        }
    }
}
