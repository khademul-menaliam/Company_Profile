<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Project;
use App\Models\Client;


class HomeController extends Controller
{


    public function admin()
    {
        // $service = Service::where('slug', $slug)->where('status', true)->firstOrFail();
        return view('admin.home');
    }
    public function index()
    {
        $services = Service::with(['children' => function ($query) {$query->where('status', 1);}])->where('status', true)->orderBy('sort_order')->whereNull('parent_id')->take(3)->get();
        $projects = Project::where('status', true)->get();
        $clients = Client::take(5)->get();
        $partners = [
        ['name' => 'Partner 1', 'logo' => 'partners/partner1.png'],
        ['name' => 'Partner 2', 'logo' => 'partners/partner2.png'],
        ['name' => 'Partner 3', 'logo' => 'partners/partner3.png'],
        ['name' => 'Partner 1', 'logo' => 'partners/partner1.png'],
        ['name' => 'Partner 2', 'logo' => 'partners/partner2.png'],
    ];

        return view('home', compact('services', 'projects','clients','partners'));
    }
    public function services()
    {
        $services = Service::with(['children' => function ($query) {$query->where('status', 1);}])->where('status', true)->orderBy('sort_order')->whereNull('parent_id')->get();
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

    $partners = [
        ['name' => 'Partner 1', 'logo' => 'partners/partner1.png'],
        ['name' => 'Partner 2', 'logo' => 'partners/partner2.png'],
        ['name' => 'Partner 3', 'logo' => 'partners/partner3.png'],
        ['name' => 'Partner 1', 'logo' => 'partners/partner1.png'],
        ['name' => 'Partner 2', 'logo' => 'partners/partner2.png'],
        ['name' => 'Partner 3', 'logo' => 'partners/partner3.png'],
        ['name' => 'Partner 1', 'logo' => 'partners/partner1.png'],
        ['name' => 'Partner 2', 'logo' => 'partners/partner2.png'],
        ['name' => 'Partner 3', 'logo' => 'partners/partner3.png'],
        ['name' => 'Partner 1', 'logo' => 'partners/partner1.png'],
        ['name' => 'Partner 2', 'logo' => 'partners/partner2.png'],
        ['name' => 'Partner 3', 'logo' => 'partners/partner3.png'],
    ];

    return view('client', compact('clients', 'partners'));
    }

    // public function show($slug) {
    //     return view('careers.show', compact('slug'));
    // }

}
