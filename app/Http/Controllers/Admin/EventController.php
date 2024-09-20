<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Event;
use App\EventImage;
use App\EventParticipant;
use App\Http\Controllers\WebController;
use App\RouteCheckPoints;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class EventController extends WebController
{
    public $category_obj;
    public function __construct()
    {
        $this->category_obj = new Event();
    }
    public function index()
    {
        return view('admin.events.index', [
            'title' => 'Events',
            'breadcrumb' => breadcrumb([
                'Events' => route('admin.events.index'),
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
        $all_data = $main->with(['categories'])->orderBy($datatable_filter['sort'], $datatable_filter['order'])
            ->offset($offset)
            ->limit($datatable_filter['limit'])
            ->get();
        //dd($all_data);
        if (!empty($all_data)) {
            foreach ($all_data as $key => $value) {
                $param = [
                    'id' => $value->id,
                    'url' => [
                        'status' => route('admin.events.status_update', $value->id),
                        'edit' => route('admin.events.edit', $value->id),
                        'delete' => route('admin.events.destroy', $value->id),
                        'view' => route('admin.events.show', $value->id),
                    ],
                    'checked' => ($value->status == 'active') ? 'checked' : ''
                ];
                $return_data['data'][] = array(
                    'id' => $offset + $key + 1,
                    'icon' => get_fancy_box_html($value['icon']),
                    'title' => $value->title,
                    'category' => $value->categories->category_title,
                    'location' => $value->location,
                    'km' => $value->km,
                    'status' => $this->generate_switch($param),
                    'event_start_date_time' => $value->event_start_date_time,
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
            success_session('Event Deleted successfully');
        } else {
            error_session('Event not found');
        }
        return redirect()->route('admin.events.index');
    }

    public function status_update($id = 0)
    {
        $data = ['status' => 0, 'message' => 'Event Not Found'];
        $find = Event::find($id);
        if ($find) {
            $find->update(['status' => ($find->status == "inactive") ? "active" : "inactive"]);
            $data['status'] = 1;
            $data['message'] = 'Event status updated';
        }
        return $data;
    }

    public function show($id)
    {
        $data = Event::where(['id' => $id])->first();

        if ($data) {
            return view('admin.events.view', [
                'title' => 'View Event',
                'data' => $data,
                'breadcrumb' => breadcrumb([
                    'events' => route('admin.events.index'),
                    'view' => route('admin.events.show', $id)
                ]),
            ]);
        }
        error_session('event not found');
        return redirect()->route('admin.events.index');
    }

    public function create(){
        $title = "Create Event";
        $categories=Category::where('status','active')->orderBy('category_title','asc')->get();
        $checkPoints=array();
        return view('admin.events.create', [
            'title' => $title,
            'categories' => $categories,
            'checkPoints' => $checkPoints,
            'breadcrumb' => breadcrumb([
                'Events' => route('admin.events.index'),
                'create' => route('admin.events.create')
            ]),
        ]);
    }
    public function store(Request $request){
       // dd("tere");
      // dd($request->all());
        $request->validate([
            'title' => ['required'],
            'cat_id' => ['required'],
            'description' => ['required'],
            'km' => ['required'],
            'event_start_date_time' => ['required'],
            'location' => ['required'],
            'location_start_lat' => ['required'],
            'location_start_long' => ['required'],
            'end_location' => ['required'],
            'location_end_lat' => ['required'],
            'location_end_long' => ['required'],
            //'icon' => ['file', 'image'],
        ]);
        $request_data = $request->all();
        //dd($request_data);
        $category = $this->category_obj->saveEvent($request_data);

        if ($request->hasFile('files')) {
            $images = $request->file('files');
            $first=0;
            foreach ($images as $image) {
              //  dd($image);
                $path=$image->store('uploads/events');
                $isDefault="0";
                if($first==0){
                    $isDefault="1";
                }

                $eventIMage=new EventImage();
                $eventIMage->event_id=$category->id;
                $eventIMage->event_image_path=$path;
                $eventIMage->is_default=$isDefault;
                $eventIMage->save();
                $first++;
            }
        }
        if(isset($category) && !empty($category)){
            if(count($request["group-a"])){
                foreach($request["group-a"] as $checkPoint){
                    $routeCheckPoint=new RouteCheckPoints();
                    $routeCheckPoint->check_point_lat=$checkPoint['check_point_start_lat'];
                    $routeCheckPoint->check_point_long=$checkPoint['check_point_start_long'];
                    $routeCheckPoint->check_point_name=$checkPoint['check_point'];
                    $routeCheckPoint->event_id=$category->id;
                    $routeCheckPoint->save();
                }
            }
            success_session('Event created successfully');
        }
        else{
            error_session('Event not created.');
        }


        return redirect()->route('admin.events.index');
    }
    public function edit($id)
    {
        $data = $this->category_obj->find($id);
        // /dd($data->event_images);
        $checkPoints=RouteCheckPoints::where('event_id',$id)->orderBy('id','asc')->get();
        //dd($checkPoints);
        $categories=Category::where('status','active')->orderBy('category_title','asc')->get();
        if ($data) {
            $title = "Update ctegory";
            return view('admin.events.create', [
                'title' => $title,
                'categories' => $categories,
                'checkPoints' => $checkPoints,
                'data' => $data,
                'breadcrumb' => breadcrumb([
                    'Events' => route('admin.events.index'),
                    'edit' => route('admin.events.edit', $data->id)
                ]),
            ]);
        }
        error_session('Event not found');
        return redirect()->route('admin.events.index');
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $data = $this->category_obj->find($id);
        if ($data) {
            $request->validate([
                'title' => ['required'],
                'cat_id' => ['required'],
                'description' => ['required'],
                'km' => ['required'],
                'event_start_date_time' => ['required'],
                'location' => ['required'],
                'location_start_lat' => ['required'],
                'location_start_long' => ['required'],
                'end_location' => ['required'],
                'location_end_lat' => ['required'],
                'location_end_long' => ['required'],
                //'icon' => ['file', 'image'],
            ]);

            $request_data = $request->all();
            if ($request->hasFile('files')) {
                $images = $request->file('files');
                $first=0;
                $countable=EventImage::where('event_id',$id)->where('is_default','=',"1")->count();
                foreach ($images as $image) {
                    $path=$image->store('uploads/events');
                    $isDefault="0";
                    if($first==0 && $countable==0){
                        $isDefault="1";
                    }

                    $eventIMage=new EventImage();
                    $eventIMage->event_id=$id;
                    $eventIMage->event_image_path=$path;
                    $eventIMage->is_default=$isDefault;
                    $eventIMage->save();
                    $first++;
                }
            }
            $request['items']=$request['items']??array();
            $category = $this->category_obj->saveEvent($request_data,$id,$data);
            if(isset($category) && !empty($category)){
                $updateArr=array();
                if(count($request['items'])){
                    foreach($request['items'] as $key=>$group){
                       // dd($group);

                        $checkPoint=RouteCheckPoints::where('id',$group['id'])->first();
                        $updateArr[]=$group['id'];
                        $checkPoint->check_point_name=$group['check_point'];
                        $checkPoint->check_point_lat=$group['check_point_start_lat'];
                        $checkPoint->check_point_long=$group['check_point_start_long'];
                        $checkPoint->update();
                    }
                }
                $allCheckPoints=RouteCheckPoints::where('event_id',$id)->get();
                foreach($allCheckPoints as $k1=>$v1){

                    if(!in_array($v1->id,$updateArr)){
                        RouteCheckPoints::where('id',$v1->id)->delete();
                    }
                }

                if(count($request["group-a"])){
                    foreach($request["group-a"] as $checkPoint){
                        if($checkPoint['check_point_start_lat']!==null && $checkPoint['check_point_start_lat']!==""){
                            $routeCheckPoint=new RouteCheckPoints();
                            $routeCheckPoint->check_point_lat=$checkPoint['check_point_start_lat'];
                            $routeCheckPoint->check_point_long=$checkPoint['check_point_start_long'];
                            $routeCheckPoint->check_point_name=$checkPoint['check_point'];
                            $routeCheckPoint->event_id=$category->id;
                            $routeCheckPoint->save();
                        }

                    }
                }

                success_session('Event updated successfully');
            }
            else{
                error_session('Event not updated');
            }
        } else {
            error_session('Event not found');
        }
        return redirect()->route('admin.events.index');
    }

    public function delete_images($id)
    {
        $image = EventImage::findOrFail($id);
        $event_id=$image->event_id;
        if($image->is_default=="1"){
            $eventImg=EventImage::where('event_id',$event_id)->where('id','!=',$id)->first();
            $eventImg->update(['is_default'=>'1']);
        }

        // Delete the image file from storage
        Storage::delete($image->filename);

        // Delete the image record from the database
        $image->delete();

        // Redirect or return a response as needed
        return redirect()->back()->with('success', 'Image deleted successfully');
    }

    public function particiapnt_list($id)
    {
        $datatable_filter = datatable_filters();
        $offset = $datatable_filter['offset'];
        $search = $datatable_filter['search'];
        $return_data = array(
            'data' => [],
            'recordsTotal' => 0,
            'recordsFiltered' => 0
        );
        $allowedTypes=['user','merchant'];
        $main = EventParticipant::with(['user'])->where('event_id',$id);
        $return_data['recordsTotal'] = $main->count();
        if (!empty($search)) {
            $main->whereHas('user',function($query) use ($search) {
                $query->AdminSearch($search);
            });
        }
        $return_data['recordsFiltered'] = $main->count();
        $all_data = $main->orderBy($datatable_filter['sort'], $datatable_filter['order'])
            ->offset($offset)
            ->limit($datatable_filter['limit'])
            ->get();
        //dd($all_data);
        if (!empty($all_data)) {
            foreach ($all_data as $key => $eventParticipant) {
                $value=$eventParticipant->user;
                $param = [
                    'id' => $value->id,
                    'url' => [
                        'status' => route('admin.user.status_update', $value->id),
                        //'edit' => route('admin.user.edit', $value->id),
                        'delete' => route('admin.user.destroy', $value->id),
                        'view' => route('admin.user.show', $value->id),
                    ],
                    'checked' => ($value->status == 'active') ? 'checked' : ''
                ];
                $return_data['data'][] = array(
                    'id' => $offset + $key + 1,
                    'profile_image' => get_fancy_box_html($value['profile_image']),
                    'name' => $value->name,
                    'email' => $value->email,
                    'mobile_number' => $value->country_code . ' ' . $value->mobile,
                    'type' => get_label(strtoupper($value->type)),
                    'status' => $this->generate_switch($param),
                    'action' => $this->generate_actions_buttons($param),
                );
            }
        }
        return $return_data;
    }
}
