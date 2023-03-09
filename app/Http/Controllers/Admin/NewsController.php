<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\NewsRequest;

class NewsController extends BaseController
{
    public function __construct ()
    {
        parent::__construct('news');
    }

    public function create()
    {
        return $this->view_admin('create');
    }

    public function edit($id)
    {
        $news = $this->db->where('id', $id);

        if ($news->exists()) {
            $data['news'] = $news->first();
            return $this->view_admin('edit', $data);
        } else {
            abort(404);
        }
    }

    public function update(NewsRequest $request, $id)
    {
        $new_current = $this->db->where('id', $id)->first();

        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime();
        if (empty($request->image)) {
            $data['image'] = $new_current->image;

        } else {
            $image_path = public_path('images') . "/" . $new_current->image;
            if (file_exists($image_path)) {
                unlink($image_path);
            }

            $imageName = time().'-'.$request->image->getClientOriginalName();  
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }
        $this->db->where('id', $id)->update($data);

        return $this->route_admin('index', [] ,['success' => 'Sửa tin tức thành công']);
    }

    public function destroy($id)
    {
        $news = $this->db->where('id', $id);

        if ($news->exists()) {
            $news_current = $news->first();
            $news->delete();
            return $this->route_admin('index', [] ,['success' => 'Xóa tin tức thành công']);
        } else {
            abort(404);
        }
    }

    public function index()
    {
        $data["news"] = $this->db->get();

        return $this->view_admin('index', $data);
    }


    public function store(NewsRequest $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime();

        $imageName = time().'-'.$request->image->getClientOriginalName();  
        $request->image->move(public_path('images'), $imageName);
        $data['image'] = $imageName;
        
        $this->db->insert($data);

        return $this->route_admin('index', [] ,['success' => 'Thêm tin tức thành công']);
    }
}
