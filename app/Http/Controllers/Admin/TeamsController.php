<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamsRequest;
use App\Models\Team;
use App\Traits\AppUtilityTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamsController extends Controller
{
    use AppUtilityTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $teams = Team::orderByDesc('created_at')->get();
        return view('admin.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamsRequest $request)
    {
        $request->validated();
        $imagePath = $this->uploadFile($request, 'cover', 'teams');
        $team = new Team();
        $team->title = $request->title;
        $team->price = $request->price;
        $team->description = $request->description;
        $team->content = $request->content;
        $team->slug = $this->uniqueSlug(Team::class, $request->title);
        if (!empty($imagePath)) {
            $team->cover = $imagePath;
        }
        // $$team->description = $request->description;
        $team->save();
        return to_route('admin.teams.index')->with('message', "Team ajouté avec succès !");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $team = Team::where('slug', $slug)->firstOrFail();
        return view('admin.teams.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $team = Team::where('slug', $slug)->firstOrFail();
        return view('admin.teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamsRequest $request, Team $team)
    {
        $request->validated();
        $imagePath = $this->uploadFile($request, 'cover', 'teams', $team->cover);
        $team->title = $request->title;
        $team->price = $request->price;
        $team->description = $request->description;
        $team->content = $request->content;
        $team->slug = $this->uniqueSlug(Team::class, $request->title, $team->id);
        if (!empty($imagePath)) {
            $team->cover = $imagePath;
        }
        // $$team->description = $request->description;
        $team->update();
        return to_route('admin.teams.index')->with('message', "team mise à jour avec succès !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        if (Storage::disk('public')->exists($team->cover)) {
            Storage::disk('public')->delete($team->cover);
        }
        $team->delete();
        return to_route('admin.teams.index')->with('message', "team supprimé avec succès !");
    }
}
