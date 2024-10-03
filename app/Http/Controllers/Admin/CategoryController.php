<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\WebController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends WebController
{
    public $category_obj;
    public function __construct()
    {
        $this->category_obj = new Category();
    }
    public function index()
    {
        return view('admin.category.index', [
            'title' => 'Categories',
            'breadcrumb' => breadcrumb([
                'Categories' => route('admin.categories.index'),
            ]),
        ]);
    }

    public function listing()
    {
        $datatable_filter = datatable_filters();
        $offset = $datatable_filter['offset'];
        $search = $datatable_filter['search'];
        $return_data = array(
            'data' => [],
            'recordsTotal' => 0,
            'recordsFiltered' => 0
        );
        $main = $this->category_obj->query();
        $return_data['recordsTotal'] = $main->count();
        if (!empty($search)) {
            $feilds = ['category_title'];
            $main->where(function ($query) use ($search,$feilds) {
                foreach($feilds as $column){
                    $query->orWhere($column,'like',"%".$search."%");
                }

            });
        }
        $return_data['recordsFiltered'] = $main->count();
        $all_data = $main->orderBy($datatable_filter['sort'], $datatable_filter['order'])
            ->offset($offset)
            ->limit($datatable_filter['limit'])
            ->get();
        //dd($all_data);
        if (!empty($all_data)) {
            foreach ($all_data as $key => $value) {
                $param = [
                    'id' => $value->id,
                    'url' => [
                        //'status' => route('admin.user.status_update', $value->id),
                        'edit' => route('admin.categories.edit', $value->id),
                        'delete' => route('admin.categories.destroy', $value->id),
                        //'view' => route('admin.categories.show', $value->id),
                    ],
                    'checked' => ($value->status == 'active') ? 'checked' : ''
                ];
                $return_data['data'][] = array(
                    'id' => $offset + $key + 1,
                    'icon' => get_fancy_box_html($value['icon']),
                    'category_title' => $value->category_title,
                    'action' => $this->generate_actions_buttons($param),
                );
            }
        }
        return $return_data;
    }


    public function destroy($id)
    {
        $data = $this->category_obj->where('id', $id)->first();
        if ($data) {
            $data->delete();
            success_session('Category Deleted successfully');
        } else {
            error_session('Category not found');
        }
        return redirect()->route('admin.categories.index');
    }

    public function status_update($id = 0)
    {
        $data = ['status' => 0, 'message' => 'User Not Found'];
        $find = User::find($id);
        if ($find) {
            $find->update(['status' => ($find->status == "inactive") ? "active" : "inactive"]);
            $data['status'] = 1;
            $data['message'] = 'User status updated';
        }
        return $data;
    }

    public function show($id)
    {
        $data = User::where(['type' => 'user', 'id' => $id])->first();

        if ($data) {
            return view('admin.user.view', [
                'title' => 'View User',
                'data' => $data,
                'breadcrumb' => breadcrumb([
                    'users' => route('admin.user.index'),
                    'view' => route('admin.user.show', $id)
                ]),
            ]);
        }
        error_session('user not found');
        return redirect()->route('admin.user.index');
    }

    public function create(){
        $title = "Create Category";
        return view('admin.category.create', [
            'title' => $title,
            'breadcrumb' => breadcrumb([
                'Categories' => route('admin.categories.index'),
                'create' => route('admin.categories.create')
            ]),
        ]);
    }
    public function store(Request $request){
        $request->validate([
            'category_title' => ['required'],
            'icon' => ['file', 'image'],
        ]);
        $request_data = $request->all();
        $category = $this->category_obj->saveCategory($request_data);
        if(isset($category) && !empty($category)){
            success_session('Category created successfully');
        }
        else{
            error_session('Category not created.');
        }


        return redirect()->route('admin.categories.index');
    }
    public function edit($id)
    {
        $data = $this->category_obj->find($id);
        if ($data) {
            $title = "Update ctegory";
            return view('admin.category.create', [
                'title' => $title,
                'data' => $data,
                'breadcrumb' => breadcrumb([
                    'Categories' => route('admin.categories.index'),
                    'edit' => route('admin.categories.edit', $data->id)
                ]),
            ]);
        }
        error_session('Category not found');
        return redirect()->route('admin.categories.index');
    }

    public function update(Request $request, $id)
    {
        $data = $this->category_obj->find($id);
        if ($data) {
            $request->validate([
                'category_title' => ['required', Rule::unique('categories', 'category_title')->ignore($id)],
                'icon' => ['file', 'image'],
            ]);

            $request_data = $request->all();

            $category = $this->category_obj->saveCategory($request_data,$id,$data);
            if(isset($category) && !empty($category)){
                success_session('Category updated successfully');
            }
            else{
                error_session('Category not updated');
            }
        } else {
            error_session('Category not found');
        }
        return redirect()->route('admin.categories.index');
    }


}
