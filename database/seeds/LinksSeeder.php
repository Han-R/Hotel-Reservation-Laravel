<?php

use Illuminate\Database\Seeder;
use App\Models\Link;
class LinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        // //photos
        // $link = Link::create(['title'=>'Images','icon'=>'fa fa-images','parent_id'=>0]);
        // Link::create(['title'=>'Add New Image','route_name'=>'photo.create','icon'=>'','parent_id'=>$link->id]);
        // Link::create(['title'=>'Images Management','route_name'=>'photo.index','icon'=>'','parent_id'=>$link->id]);
        // Link::create(['title'=>'Trash','route_name'=>'photo.trash','icon'=>'','parent_id'=>$link->id]);

        
        // //photos categories
        // $link = Link::create(['title'=>'Image Categories','icon'=>'fa fa-file-image','parent_id'=>0]);
        // Link::create(['title'=>'Add New Image Category','route_name'=>'photo-category.create','icon'=>'','parent_id'=>$link->id]);
        // Link::create(['title'=>'Image Categories Management','route_name'=>'photo-category.index','icon'=>'','parent_id'=>$link->id]);
        // Link::create(['title'=>'Trash','route_name'=>'photo-category.trash','icon'=>'','parent_id'=>$link->id]);

        
        // //Videos
        // $link = Link::create(['title'=>'Videos','icon'=>'fa fa-video','parent_id'=>0]);
        // Link::create(['title'=>'Add New Video','route_name'=>'video.create','icon'=>'','parent_id'=>$link->id]);
        // Link::create(['title'=>'Videos Management','route_name'=>'video.index','icon'=>'','parent_id'=>$link->id]);
        // Link::create(['title'=>'Trash','route_name'=>'video.trash','icon'=>'','parent_id'=>$link->id]);

        
        // //Videos categories
        // $link = Link::create(['title'=>'Vidoe Categories','icon'=>'fa fa-file-video','parent_id'=>0]);
        // Link::create(['title'=>'Add New Video Category','route_name'=>'video-category.create','icon'=>'','parent_id'=>$link->id]);
        // Link::create(['title'=>'Video Categories Management','route_name'=>'video-category.index','icon'=>'','parent_id'=>$link->id]);
        // Link::create(['title'=>'Trash','route_name'=>'video-category.trash','icon'=>'','parent_id'=>$link->id]);


             
        // //users
        // $link = Link::create(['title'=>'Users','icon'=>'fa fa-user','parent_id'=>0]);
        // Link::create(['title'=>'Add New User','route_name'=>'users.create','icon'=>'','parent_id'=>$link->id]);
        // Link::create(['title'=>'Users Management','route_name'=>'users.index','icon'=>'','parent_id'=>$link->id]);
        // Link::create(['title'=>'Trash','route_name'=>'users.trash','icon'=>'','parent_id'=>$link->id]);
        // Link::create(['title'=>'User Permissions','route_name'=>'users.links','show_in_menu'=>0,'icon'=>'','parent_id'=>$link->id]);
        
        
        // //sliders
        // $link = Link::create(['title'=>'Sliders','icon'=>'fa fa-desktop','parent_id'=>0]);
        // Link::create(['title'=>'Add New Slider','route_name'=>'slider.create','icon'=>'','parent_id'=>$link->id]);
        // Link::create(['title'=>'Sliders Management','route_name'=>'slider.index','icon'=>'','parent_id'=>$link->id]);
        // Link::create(['title'=>'Trash','route_name'=>'slider.trash','icon'=>'','parent_id'=>$link->id]);

     
        // //static pages
        // $link = Link::create(['title'=>'Static Pages','icon'=>'fa fa-book-open','parent_id'=>0]);
        // Link::create(['title'=>'Add New Static Page','route_name'=>'staticpage.create','icon'=>'','parent_id'=>$link->id]);
        // Link::create(['title'=>'Static Pages Management','route_name'=>'staticpage.index','icon'=>'','parent_id'=>$link->id]);
        // Link::create(['title'=>'Trash','route_name'=>'staticpage.trash','icon'=>'','parent_id'=>$link->id]);

        //Events
        $link = Link::create(['title'=>'Events','icon'=>'fa fa-gift','parent_id'=>0]);
        Link::create(['title'=>'Add New Event','route_name'=>'event.create','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'Events Management','route_name'=>'event.index','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'Trash','route_name'=>'event.trash','icon'=>'','parent_id'=>$link->id]);

        //restaurant menu
        $link = Link::create(['title'=>'Restaurant Menus','icon'=>'fa fa-gulp','parent_id'=>0]);
        Link::create(['title'=>'Add New Product','route_name'=>'restaurant-menu.create','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'Products Management','route_name'=>'restaurant-menu.index','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'Trash','route_name'=>'restaurant-menu.trash','icon'=>'','parent_id'=>$link->id]);

        //restaurant table
        $link = Link::create(['title'=>'Restaurant Tables','icon'=>'fa fa-utensils','parent_id'=>0]);
        Link::create(['title'=>'Add New Table','route_name'=>'restaurant-table.create','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'Tables Management','route_name'=>'restaurant-table.index','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'Trash','route_name'=>'restaurant-table.trash','icon'=>'','parent_id'=>$link->id]);

        //restaurant time
        $link = Link::create(['title'=>'Restaurant Times','icon'=>'fa fa-calendar-alt','parent_id'=>0]);
        Link::create(['title'=>'Add New Time','route_name'=>'restaurant-time.create','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'Times Management','route_name'=>'restaurant-time.index','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'Trash','route_name'=>'restaurant-time.trash','icon'=>'','parent_id'=>$link->id]);

        //room type
        $link = Link::create(['title'=>'Room Types','icon'=>'fa fa-building','parent_id'=>0]);
        Link::create(['title'=>'Add New Room','route_name'=>'room-type.create','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'Rooms Management','route_name'=>'room-type.index','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'Trash','route_name'=>'room-type.trash','icon'=>'','parent_id'=>$link->id]);

        //reservation
        $link = Link::create(['title'=>'Reservations','icon'=>'fa fa-save','parent_id'=>0]);
        Link::create(['title'=>'Reservations Management','route_name'=>'reservation.index','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'Trash','route_name'=>'reservation.trash','icon'=>'','parent_id'=>$link->id]);

        //message
        $link = Link::create(['title'=>'Clients Message','icon'=>'fa fa-comment-alt','parent_id'=>0]);
        Link::create(['title'=>'Messages Management','route_name'=>'message.index','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'Trash','route_name'=>'message.trash','icon'=>'','parent_id'=>$link->id]);


    }
}
