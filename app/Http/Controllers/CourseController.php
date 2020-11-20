<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('user')->withCount('episodes')->get();
        return Inertia::render('Courses/index', [
            'courses' => $courses
        ]);
    }

    public function show(int $id)
    {
        $course = Course::where('id', $id)->with('episodes')->first();
        $watched = auth()->user()->episodes;

        return Inertia::render('Courses/show', [
            'course' => $course,
            'watched' => $watched
        ]);
    }

    public function progress(Request $request)
    {
       $id = $request->input('episodeId');
       $user = auth()->user();

       $user->episodes()->toggle($id);// * toggle-> enregistre l'id dans la table completed si id existe ou non

        return $user->episodes;
    }
}
