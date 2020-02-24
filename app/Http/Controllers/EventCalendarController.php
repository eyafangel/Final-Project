<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventCalendarController extends Controller
{
    public function index()
    {
        return view('fullcalendar.calendar');
    }
    
   
    public function create(Request $request)
    {  
        
    }
     
 
    public function update(Request $request)
    {   
       
    } 
 
 
    public function destroy(Request $request)
    {
        
    }    
 
}
