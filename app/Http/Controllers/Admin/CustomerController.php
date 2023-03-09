<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\DB;

class CustomerController extends BaseController
{
    public function __construct ()
    {
        parent::__construct('customers');
    }

    public function create()
    {$data['branch'] = DB::table('branchs')->get();

        return $this->view_admin('create',$data);
    }

    public function edit($id)
    {
        $customer = $this->db->leftJoin('branchs', 'branchs.id', '=', 'customers.branch_id')
                                    ->leftJoin('staffs', 'branchs.id', '=', 'staffs.Branch_id')
                                    ->select('customers.*','branchs.id as branchs_id','customers.staff_id as staff_id','staffs.Fullname as Staffname','branchs.Name as branchs_name')
                                    ->where('customers.id',$id)
                                    ->first();
        $branchs = DB::table('branchs')->get();
        
        $staffs = DB::table('staffs')->get();

        return view('admin.modules.customers.edit',['customer' => $customer,
                                                    'staffs'=>$staffs, 
                                                    'branchs' => $branchs,
                                                   ]);
        
    }

    

    public function update(CustomerRequest $request, $id)
    {
        $customer_current = $this->db->where('id', $id)->first();
        
        $data = $request->except('_token');
       
        $data['updated_at'] = new \DateTime();
        
        $this->db->where('id', $id)->update($data);

        return $this->route_admin('index', [] ,['success' => 'Sửa khách hàng thành công']);
    }

    public function destroy($id)
    {
        $customer = $this->db->where('id', $id);

        if ($customer->exists()) {
            $customer_current = $customer->first();
            $customer->delete();
            return $this->route_admin('index', [] ,['success' => 'Xóa khách hàng thành công']);
        } else {
            abort(404);
        }
    }

    public function index()
    {
        $data["customers"] = $this->db->leftJoin('branchs', 'branchs.id', '=', 'customers.branch_id')
                                    ->leftJoin('staffs', 'branchs.id', '=', 'staffs.Branch_id')
                                    ->select('customers.*','staffs.Fullname as Staffname','branchs.Name as branchs_name')
                                    ->get();
               
        return $this->view_admin('index', $data);
    }

    public function fetchStaff(Request $request)
    {
        $branchd_id = $request->branch_id;

        $staff = DB::table('staffs')
        ->join('branchs','staffs.Branch_id','=','branchs.id')
                                    ->where('staffs.Branch_id',$branchd_id)
                                    ->get();
        $xhtml = "<option selected disabled='disabled'>--Chọn chi nhánh--</option>";
        foreach($staff as $st)
        {
            $xhtml .=  "<option value='".$st->id."'>".$st->Fullname."</option>";
        }

        return $xhtml;
    }

    public function chart()
    {
        $events1 = array();
        $customers = DB::table('customers')->select( DB::raw('count(id) as total'),DB::raw('date_format(created_at, "%M") as month'))
            ->groupBy(DB::raw('date_format(created_at, "%M")'))
            ->orderBy('created_at', 'asc')
            ->get();
        // dd($customers);
        $i=0;
        // dd($customers);
        foreach ($customers as $item)
        {   
            // dd($a[0],$a[1]);
            $events1[$i] = $item->total;
            $i++;
        }

        $events2 = array();
        $customers1 = DB::table('customers')->select( DB::raw('count(id) as total'),DB::raw('date_format(created_at, "%M") as month'))
            ->groupBy(DB::raw('date_format(created_at, "%M")'))
            ->orderBy('created_at', 'asc')
            ->get();
        // dd($customers);
        $i=0;
        // dd($customers);
        foreach ($customers1 as $item)
        {   
            // dd($a[0],$a[1]);
            $events2[$i] = $item->month;
            $i++;
        }
        

        $events3 = array();
        $customers2 = DB::table('customers')->get();
        $i=0;
        // dd($customers);
        $l1 = $l2 = $l3 = $l4 = 0;
        foreach ($customers2 as $item)
        {   
            // dd($item->Status);
            if ($item->Status==0)
            {
                $l1++;
            }
            else if ($item->Status==1)
            {
                $l2++;
            }
            else if ($item->Status==2)
            {
                $l3++;
            }
            else
            {
                $l4++;
            }
            // dd($a[0],$a[1]);
            // $events3[$i] = $item->month;
            $i++;
        }
        $kq= [$l1,$l2,$l3,$l4];
        // dd($events1);

        

        return view('admin.modules.customers.chart',    ['events1' => $events1,
                                                        'events2' => $events2,
                                                        'kq' => $kq]);
        
    }

    public function store(CustomerRequest $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime();  
        DB::table('customers')->insert($data);
        
        return $this->route_admin('index', [] ,['success' => 'Create thành công']);
    }
}
