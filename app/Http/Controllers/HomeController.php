<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Project;
use App\Models\Client;
use App\Models\Partner;
use App\Models\GalleryItem;
use App\Models\CompanySection;



class HomeController extends Controller
{
    public function admin()
        {
            // $service = Service::where('slug', $slug)->where('status', true)->firstOrFail();
            return view('admin.home');
        }
    public function index()
        {
            $services = Service::where('status', true)
                ->whereNull('parent_id')
                ->orderBy('sort_order', 'asc')   // Parent sorting
                ->with([
                    'children' => function ($q) {
                        $q->where('status', true)
                        ->orderBy('sort_order', 'asc'); // Child sorting
                    }
                ])
                ->take(3)      // limit parents
                ->get();


            $projects = Project::where('status', true)->get();
            $clients = Client::all();

            $partners = Partner::take(5)->get();


            $messages = CompanySection::where('section', 'messages')
                ->whereIn('type', ['advisor', 'ceo'])
                ->where('status', true)
                ->orderBy('sort_order')
                ->get();

            return view('home', compact('services', 'projects','clients','partners','messages'));
        }
    public function services()
        {
            $services = Service::where('status', true)
                ->whereNull('parent_id')
                ->orderBy('sort_order', 'asc')   // Parent sorting
                ->with([
                    'children' => function ($q) {
                        $q->where('status', true)
                        ->orderBy('sort_order', 'asc'); // Child sorting
                    }
                ])
                ->get();
            return view('services.index', compact('services'));
        }

    public function servicesShow($slug)
        {
            $service = Service::where('slug', $slug)->where('status', true)->firstOrFail();
            return view('services.show', compact('service'));
        }

    public function projects()
        {
            $projects = Project::all();
            return view('projects.index', compact('projects'));
        }

    public function projectsShow($slug)
        {
            $project = Project::with(['gallery','client'])->where('slug',$slug)->firstOrFail();
            return view('projects.show', compact('project'));
        }

    public function whyJoin() {
            return view('careers.why_join_us');
        }

    public function job() {
            return view('careers.job');
        }

    public function internship() {
            return view('careers.internship');
        }
    public function clients() {
        $clients = Client::all();
        $partners = Partner::take(5)->get();

        return view('client', compact('clients', 'partners'));
        }

    // public function show($slug) {
    //     return view('careers.show', compact('slug'));
    // }

    public function gallery()
    {
        $galleryItems = GalleryItem::where('status', true)->latest()->get();
        return view('gallery', compact('galleryItems'));
    }

    public function showMessages()
    {
        // Fetch all active CEO + Advisor messages
        $messages = CompanySection::where('section', 'messages')
                    ->whereIn('type', ['ceo', 'advisor'])
                    ->where('status', true)
                    ->orderBy('sort_order')
                    ->get();

        // Get CEO (first found) and Advisor (first found)
        $ceo = $messages->firstWhere('type', 'ceo');
        $advisor = $messages->firstWhere('type', 'advisor');

        // Pass to view
        return view('about', compact('ceo', 'advisor'));
    }

}
