<?php 
namespace Botble\Obituary\Http\Controllers;

use Illuminate\Routing\Controller;
use Botble\Obituary\Models\Obituary;

class PublicController extends Controller
{
    public function show($slug)
    {
        $item = Obituary::where('slug', $slug)->firstOrFail();
        return view('plugins/obituary::obituary.show', compact('item'));
    }

    public function index()
    {
        $items = Obituary::latest()->paginate(9);
        return view('plugins/obituary::obituary.index', compact('items'));
    }
}