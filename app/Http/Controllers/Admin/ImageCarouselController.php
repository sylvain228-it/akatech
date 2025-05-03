<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImageCarousel;
use App\Traits\AppUtilityTrait;
use Illuminate\Http\Request;

class ImageCarouselController extends Controller
{
    use AppUtilityTrait;
    /**
     * Display a listing of the resource.
     */
    protected $imagePost = ['default', 'center', 'left', 'right', 'top', 'bottom'];
    public function index()
    {
        //
        $imagesCarousel = ImageCarousel::orderByDesc('created_at')->get();
        return view('admin.carousel.index', compact('imagesCarousel'));
    }
    public function preview()
    {
        //
        $imagesCarousel = ImageCarousel::orderByDesc('created_at')->get();
        return view('admin.carousel.preview', compact('imagesCarousel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.carousel.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:5242880'],
            'description' => ['nullable', 'string', 'max:255'],
            'link' => ['nullable', 'string', 'max:255'],
            'link_text' => ['nullable', 'string', 'max:255'],
            'link2' => ['nullable', 'string', 'max:255'],
            'link2_text' => ['nullable', 'string', 'max:255'],
            'img_pos' => ['nullable', 'string', 'max:255'],
        ]);
        $imagePath = $this->uploadFile($request, 'image', 'assets/carousel');
        $imageCarousel = new ImageCarousel();
        $imageCarousel->title = $request->title;
        $imageCarousel->description = $request->description;
        $imageCarousel->link = $request->link;
        $imageCarousel->link_text = $request->link_text;
        $imageCarousel->link2 = $request->link2;
        $imageCarousel->link2_text = $request->link2_text;
        if (in_array($request->img_pos, $this->imagePost)) {
            $imageCarousel->img_pos = $request->img_pos;
        }
        if (!empty($imagePath)) {
            $imageCarousel->image = $imagePath;
        }
        // $imageCarousel->description = $request->description;
        $imageCarousel->save();
        return to_route('admin.carousel.index')->with('message', "Carousel ajouté avec succès !");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $carousel = ImageCarousel::findOrFail($id);
        return view('admin.carousel.show', compact('carousel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $carousel = ImageCarousel::findOrFail($id);
        return view('admin.carousel.edit', compact('carousel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $imageCarousel = ImageCarousel::findOrFail($id);
        $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:5242880'],
            'description' => ['nullable', 'string', 'max:255'],
            'link' => ['nullable', 'string', 'max:255'],
            'link_text' => ['nullable', 'string', 'max:255'],
            'link2' => ['nullable', 'string', 'max:255'],
            'link2_text' => ['nullable', 'string', 'max:255'],
            'img_pos' => ['nullable', 'string', 'max:255'],
        ]);

        $imagePath = $this->uploadFile($request, 'image', 'assets/carousel', $imageCarousel->image);

        $imageCarousel->title = $request->title;
        $imageCarousel->description = $request->description;
        $imageCarousel->link = $request->link;
        $imageCarousel->link_text = $request->link_text;
        $imageCarousel->link2 = $request->link2;
        $imageCarousel->link2_text = $request->link2_text;
        if (in_array($request->img_pos, $this->imagePost)) {
            $imageCarousel->img_pos = $request->img_pos;
        }
        if (!empty($imagePath)) {
            $imageCarousel->image = $imagePath;
        }
        $imageCarousel->update();
        return to_route('admin.carousel.index')->with('message', "Carousel mise à jour avec succès !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $carousel = ImageCarousel::findOrFail($id);
        if (file_exists($carousel->image)) {
            unlink($carousel->image);
        }
        $carousel->delete();
        return to_route('admin.carousel.index')->with('message', "Carousel supprimé avec succès !");

    }
}