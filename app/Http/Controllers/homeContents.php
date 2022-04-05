<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Appointment;
use App\Dalaw;
use App\Paabot;
use Illuminate\Http\Request;

class homeContents extends Controller
{
 public function opener (){
   return view ('BJMP.homecontents.opener');
 }
 public function landing (){
    $dalaw=Paabot::where('sched_type','Dalaw')->first();
    $tawag=Paabot::where('sched_type','Tawag')->first();
    $paabot=Paabot::where('sched_type','Paabot')->first();
    $announcement=Announcement::all();
    return view ('BJMP.homecontents.landing', compact('dalaw','tawag','paabot','announcement'));


 }
 public function aboutus (){
   return view ('BJMP.homecontents.aboutus');
 }
 public function appointment (){
   return view ('BJMP.homecontents.appointment');
 }
 public function guidlines (){
     $count=Appointment::count();

   return view ('BJMP.homecontents.guidelines', compact('count'));
 }
 public function gallery (){
   return view ('BJMP.homecontents.gallery');
 }
 public function contactus (){
   return view ('BJMP.homecontents.contactus');
 }
 public function health (){
   return view ('BJMP.homecontents.health');
 }
}

