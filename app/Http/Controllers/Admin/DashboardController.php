<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use App\Models\Photo;
use App\Models\Forum;
use App\Models\Category;
use App\Models\Cat;
use App\Models\CatSubmission;
use App\Models\Adoption;
use App\Models\Address;
use App\Models\Breed;

class DashboardController extends Controller
{
    public function index()
    {
        $articleCount = Article::count();
        $memberCount = User::where('role', 'member')->count();
        $galleryCount = Photo::count();
        $forumCount = Forum::count();
        $categoryCount = Category::count();
        $catCount = Cat::count();
        $pendingCatSubmissions = CatSubmission::where('status', 'pending')->count();
        $approvedCatSubmissions = CatSubmission::where('status', 'approved')->count();
        $rejectedCatSubmissions = CatSubmission::where('status', 'rejected')->count();
        $pendingAdoptions = Adoption::where('status', 'pending')->count();
        $approvedAdoptions = Adoption::where('status', 'approved')->count();
        $rejectedAdoptions = Adoption::where('status', 'rejected')->count();
        $locationCount = Address::distinct('address')->count('address');
        $breedCount = Breed::count();

        return view('admin.dashboard', compact(
            'articleCount',
            'memberCount',
            'galleryCount',
            'forumCount',
            'categoryCount',
            'catCount',
            'pendingCatSubmissions',
            'approvedCatSubmissions',
            'rejectedCatSubmissions',
            'pendingAdoptions',
            'approvedAdoptions',
            'rejectedAdoptions',
            'locationCount',
            'breedCount'
        ));
    }
}
