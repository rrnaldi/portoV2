<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Certificate;
use App\Models\Contact;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Project;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        $about = About::first();
        return view('user.about', compact('about'));
    }

    public function project()
    {
        $projects = Project::all();
        return view('user.project', compact('projects'));
    }

    public function experience()
    {
        $experience = Experience::all();
        return view('user.experience', compact('experience'));
    }

    public function certificate()
    {
        $certificate = Certificate::all();
        return view('user.certificate', compact('certificate'));
    }

    public function education()
    {
        $education = Education::all();
        return view('user.education', compact('education'));
    }

    public function contact()
    {
        $contact = Contact::all();
        return view('user.contact', compact('contact'));
        
    }
}
