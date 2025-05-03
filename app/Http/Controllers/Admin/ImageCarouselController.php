<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageCarouselRequest;
use App\Models\ImageCarousel;
use App\Traits\AppUtilityTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function store(ImageCarouselRequest $request)
    {

        $imagePath = $this->uploadFile($request, 'image', 'carousel');
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
    public function show(ImageCarousel $carousel)
    {
        return view('admin.carousel.show', compact('carousel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ImageCarousel $carousel)
    {
        return view('admin.carousel.edit', compact('carousel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $imageCarousel = ImageCarousel::findOrFail($id);
        $imagePath = "";
        if ($request->hasFile('image')) {
            $imagePath = $this->uploadFile($request, 'image', 'carousel', $imageCarousel->image);
        }

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
    public function destroy($id)
    {
        $carousel = ImageCarousel::findOrFail($id);
        if (Storage::disk('public')->exists($carousel->image)) {
            Storage::disk('public')->delete($carousel->image);
        }
        $carousel->delete();
        return to_route('admin.carousel.index')->with('message', "Carousel supprimé avec succès !");

    }
}