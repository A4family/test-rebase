<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class ProjectsController
 */
class ProjectsController extends Controller
{

    /**
     * @return view
     */
    public function index(): View
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        Project::create($request->only(['title','description']));
        return redirect('/projects');
    }
}
