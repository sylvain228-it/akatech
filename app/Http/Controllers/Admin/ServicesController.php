<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServicesRequest;
use App\Models\Service;
use App\Traits\AppUtilityTrait;
use Illuminate\Support\Facades\Storage;
class ServicesController extends Controller
{
    use AppUtilityTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $services = Service::orderByDesc('created_at')->get();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServicesRequest $request)
    {
        $request->validated();
        $imagePath = $this->uploadFile($request, 'cover', 'services');
        $service = new Service();
        $service->title = $request->title;
        $service->price = $request->price;
        $service->description = $request->description;
        $service->content = $request->content;
        $service->slug = $this->uniqueSlug(Service::class, $request->title);
        if (!empty($imagePath)) {
            $service->cover = $imagePath;
        }
        // $$service->description = $request->description;
        $service->save();
        return to_route('admin.services.index')->with('message', "Service ajouté avec succès !");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        return view('admin.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServicesRequest $request, Service $service)
    {
        $request->validated();
        $imagePath = $this->uploadFile($request, 'cover', 'services', $service->cover);
        $service->title = $request->title;
        $service->price = $request->price;
        $service->description = $request->description;
        $service->content = $request->content;
        $service->slug = $this->uniqueSlug(Service::class, $request->title, $service->id);
        if (!empty($imagePath)) {
            $service->cover = $imagePath;
        }
        // $$service->description = $request->description;
        $service->update();
        return to_route('admin.services.index')->with('message', "Service mise à jour avec succès !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        if (Storage::disk('public')->exists($service->cover)) {
            Storage::disk('public')->delete($service->cover);
        }
        $service->delete();
        return to_route('admin.services.index')->with('message', "Service supprimé avec succès !");
    }
}