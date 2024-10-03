<?php

namespace App\Http\Controllers\Admin;

use App\Faq;
use App\Http\Controllers\WebController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FaqsController extends WebController
{
    public function index()
    {
        $title = 'FAQs';
        return view('admin.faqs.index', [
            'title' => $title,
            'breadcrumb' => breadcrumb([
                $title => route('admin.faqs.index'),
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
        $main = Faq::query();
        $return_data['recordsTotal'] = $main->count();
        if (!empty($search)) {
            $main->where(function ($query) use ($search) {
                $query->AdminSearch($search);
            });
        }
        $return_data['recordsFiltered'] = $main->count();
        $all_data = $main->orderBy($datatable_filter['sort'], $datatable_filter['order'])
            ->offset($offset)
            ->limit($datatable_filter['limit'])
            ->get();
        if (!empty($all_data)) {
            foreach ($all_data as $key => $value) {
                $param = [
                    'id' => $value->id,
                    'url' => [
                        'edit' => route('admin.faqs.edit', $value->id),
                        'delete' => route('admin.faqs.destroy', $value->id),
                    ],
                    'checked' => ($value->status == 'active') ? 'checked' : ''
                ];
                $return_data['data'][] = array(
                    'id' => $offset + $key + 1,
                    'title' => $value->title,
                    'content' => Str::limit($value->content, 50),
                    'action' => $this->generate_actions_buttons($param),
                );
            }
        }
        return $return_data;
    }

    public function destroy($id)
    {
        $data = Faq::where('id', $id)->first();
        if ($data) {
            $data->delete();
            success_session('Faq Deleted successfully');
        } else {
            error_session('Faq not found');
        }
        return redirect()->route('admin.faqs.index');
    }

    public function create(Request $request)
    {
        $title = 'Add Faqs';
        return view('admin.faqs.create', [
            'title' => $title,
            'breadcrumb' => breadcrumb([
                'FAQs' => route('admin.faqs.index'),
                'Add' => route('admin.faqs.create'),
            ]),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', "max:255"],
            'details' => ['required'],
        ]);
        $faq = Faq::create([
            'title' => $request->title ?? '',
            'content' => $request->details ?? '',
        ]);

        if ($faq) {
            success_session('Faqs created successfully');
        } else {
            error_session('Faqs fail to create.');
        }
        return redirect()->route('admin.faqs.index');
    }

    public function edit($id)
    {
        $data = Faq::find($id);
        if ($data) {
            $title = "edit faq";
            return view('admin.faqs.edit', [
                'title' => $title,
                'data' => $data,
                'breadcrumb' => breadcrumb([
                    $title => route('admin.faqs.index'),
                    'edit' => route('admin.faqs.edit', $data->id)
                ]),
            ]);
        }
        error_session('faqs not found');
        return redirect()->route('admin.faqs.index');
    }

    public function update(Request $request, $id)
    {
        $data = Faq::find($id);
        if ($data) {
            $inputs = $request->validate([
                'title' => ['required', "max:255"],
                'content' => ['required'],
            ]);
            $data->update($inputs);
            success_session('faqs updated successfully');
        } else {
            error_session('faqs not found');
        }
        return redirect()->route('admin.faqs.index');
    }

}
