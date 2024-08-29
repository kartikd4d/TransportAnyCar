<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];

    public function event_images()
    {
        return $this->hasMany(EventImage::class)->SimpleDetails();
    }

    public function event_users()
    {
        return $this->hasMany(EventParticipant::class)->SimpleDetails()->with(['user'])->orderBy('id','desc');
    }



    public function event_users_for_home_api()
    {
        return $this->hasMany(EventParticipant::class)->SimpleDetails()->with(['user'])->orderBy('id','desc');
    }

    public function getCreatedAtAttribute($val)
    {
        return $val??'';
    }
    public function getUpdatedAtAttribute($val)
    {
        return $val??'';
    }

    public function categories()
    {
        return $this->belongsTo(Category::class,'cat_id','id')->SimpleDetails();
    }

    public function saveEvent($data=[],$event_id=0,$event=null){
        if(!empty($event)){
            //
        }
        elseif($event_id > 0){
            $event = $this->find($event_id);
        }
        else{
            $event = new Event();
        }
        // $event->fill($data);
        $event->title=$data['title'];
        $event->cat_id=$data['cat_id'];
        $event->description=$data['description'];
        $event->km=$data['km'];
        $event->event_start_date_time=$data['event_start_date_time'];
        $event->location=$data['location'];
        $event->location_start_lat=$data['location_start_lat'];
        $event->location_start_long=$data['location_start_long'];
        $event->end_location=$data['end_location'];
        $event->location_end_lat=$data['location_end_lat'];
        $event->location_end_long=$data['location_end_long'];
        $event->save();

        return $event;
    }

    public function event_check_points()
    {
        return $this->hasMany(RouteCheckPoints::class);
    }
}
