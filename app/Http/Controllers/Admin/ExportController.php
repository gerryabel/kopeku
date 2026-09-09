<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Exports\AdoptionSubmissionsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\Adoption;

class ExportController extends Controller
{
    public function exportAdoptions(Request $request)
    {
        $query = Adoption::with(['cat.breed', 'user'])->latest();

        if ($request->filled('search_adoption_cat')) {
            $query->whereHas('cat', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search_adoption_cat . '%');
            });
        }

        if ($request->filled('search_adoption_applicant')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search_adoption_applicant . '%');
            });
        }

        if ($request->filled('gender_adoption')) {
            $query->whereHas('cat', function ($q) use ($request) {
                $q->where('gender', $request->gender_adoption);
            });
        }

        if ($request->filled('breed_cat')) {
            $query->whereHas('cat', function ($q) use ($request) {
                $q->where('breed_id', $request->breed_cat);
            });
        }

        if ($request->filled('adoption_date')) {
            $query->whereDate('created_at', $request->adoption_date);
        }

        if ($request->filled('adoption_status')) {
            $query->where('status', $request->adoption_status);
        }

        $filteredData = $query->get();

        return Excel::download(new AdoptionSubmissionsExport($filteredData), 'pengajuan_adopsi.xlsx');
    }
}
