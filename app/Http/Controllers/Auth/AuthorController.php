<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\JobApplication;
use App\Models\Scholarship;
use App\Models\Intercambio;
use Carbon\Carbon;

class AuthorController extends Controller
{
    /** Author dashboard */
    public function authorSection()
    {
        $livePosts = null;
        $company = null;
        $applications = null;
        
        //Formatando a data para dd/mm/yyyy
        $scholarships = Scholarship::where('user_id', auth()->user()->id)->latest()->get();
        foreach ($scholarships as $scholarship) {
            $scholarship->start_date = Carbon::parse($scholarship->start_date)->format('d/m/Y');
            $scholarship->end_date = Carbon::parse($scholarship->end_date)->format('d/m/Y');
        }

        //Formatando a data para dd/mm/yyyy
        $intercambios = Intercambio::where('user_id', auth()->user()->id)
            ->latest()
            ->get()
            ->map(function ($intercambio) {
                $intercambio->registration_period_start_date = Carbon::parse($intercambio->registration_period_start_date)->format('d/m/Y');
                $intercambio->registration_period_end_date = Carbon::parse($intercambio->registration_period_end_date)->format('d/m/Y');
                $intercambio->exchange_period_start_date = Carbon::parse($intercambio->exchange_period_start_date)->format('d/m/Y');
                $intercambio->exchange_period_end_date = Carbon::parse($intercambio->exchange_period_end_date)->format('d/m/Y');
                return $intercambio;
            });

        if ($this->hasCompany()) {
            //without the if block the posts relationship returns error
            $company = auth()->user()->company;
            $posts = $company->posts()->get();

            if ($company->posts->count()) {
                $livePosts = $posts->where('deadline', '>', Carbon::now())->count();
                $ids = $posts->pluck('id');
                $applications = JobApplication::whereIn('post_id', $ids)->get();
            }
        }

        //doesnt have company
        return view('account.author-section')->with([
            'company' => $company,
            'applications' => $applications,
            'livePosts' => $livePosts,
            'scholarships' => $scholarships,
            'intercambios' => $intercambios
        ]);
    }

    // Author Employer panel
    //employer is company of author
    public function employer($employer)
    {
        $company = Company::where('id', $employer)->with('posts')->first();
        return view('account.employer')->with([
            'company' => $company,
        ]);
    }

    //check if has company
    protected function hasCompany()
    {
        return auth()->user()->company ? true : false;
    }
}