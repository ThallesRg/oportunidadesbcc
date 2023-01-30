<?php

namespace App\Http\Controllers;

use App\Events\PostViewEvent;
use App\Models\Company;
use App\Models\CompanyCategory;
use App\Models\Event;
use App\Models\Intercambio;
use App\Models\Post;
use App\Models\Scholarship;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->take(20)->with('company')->get();
        $categories = CompanyCategory::take(5)->get();
        $topEmployers = Company::latest()->take(3)->get();

        $latestIntercambio = Intercambio::latest()->first();
        $latestEvent = Event::latest()->first();
        $latestScholarship = Scholarship::latest()->first();

        return view('Home')->with([
            'posts' => $posts,
            'categories' => $categories,
            'topEmployers' => $topEmployers,
            'ultimaBolsaDeEstudo' => $latestScholarship,
            'ultimoIntercambio' => $latestIntercambio,
            'ultimoEvento' => $latestEvent,
        ]);
    }

    public function create()
    {
        if (!auth()->user()->company) {
            Alert::toast('Você precisa criar uma empresa primeiro!', 'info');
            return redirect()->route('company.create');
        }
        return view('post.create');
    }

    public function store(Request $request)
    {
        $this->requestValidate($request);

        $postData = array_merge(['company_id' => auth()->user()->company->id], $request->all());

        // dd($postData);
        $post = Post::create($postData);
        if ($post) {
            Alert::toast('Vaga criada!', 'success');
            return redirect()->route('account.authorSection');
        }
        Alert::toast('Erro!', 'warning');
        return redirect()->back();
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        event(new PostViewEvent($post));
        $company = $post->company()->first();

        $similarPosts = Post::whereHas('company', function ($query) use ($company) {
            return $query->where('company_category_id', $company->company_category_id);
        })->where('id', '<>', $post->id)->with('company')->take(5)->get();
        return view('post.show')->with([
            'post' => $post,
            'company' => $company,
            'similarJobs' => $similarPosts
        ]);
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, $post)
    {
        $this->requestValidate($request);
        $getPost = Post::findOrFail($post);

        $newPost = $getPost->update($request->all());
        if ($newPost) {
            Alert::toast('Vaga atualizada com sucesso!', 'success');
            return redirect()->route('account.authorSection');
        }
        return redirect()->route('post.index');
    }

    public function destroy(Post $post)
    {
        if ($post->delete()) {
            Alert::toast('Vaga deletada com sucesso!', 'success');
            return redirect()->route('account.authorSection');
        }
        return redirect()->back();
    }

    protected function requestValidate($request)
    {
        return $request->validate([
            'job_title' => 'required|min:3',
            'job_level' => 'required',
            'vacancy_count' => 'required|int',
            'employment_type' => 'required',
            'job_location' => 'required',
            'salary' => 'required',
            'deadline' => 'required',
            'education_level' => 'required',
            'experience' => 'required',
            'skills' => 'required',
            'link' => 'required|active_url',
            'specifications' => 'sometimes|min:5',
        ]);
    }
}
