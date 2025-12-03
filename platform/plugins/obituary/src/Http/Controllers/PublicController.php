<?php 
namespace Botble\Obituary\Http\Controllers;

use Illuminate\Routing\Controller;
use Botble\Obituary\Models\Obituary;
use Botble\Theme\Facades\Theme;

class PublicController extends Controller
{
    public function show($slug)
    {
        $obituary = Obituary::where('slug', $slug)->firstOrFail();
        return view('plugins/obituary::obituary.show', compact('obituary'));
    }

    public function index()
    {
        $items = Obituary::where('status', 'published')
            ->latest()
            ->paginate(6);
            return Theme::scope('obituary.index', compact('items'))->render();
    }
}