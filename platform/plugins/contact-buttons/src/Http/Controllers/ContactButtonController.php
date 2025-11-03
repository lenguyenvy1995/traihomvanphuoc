<?php

namespace Botble\ContactButtons\Http\Controllers;

use Botble\Base\Facades\PageTitle;
use Botble\Base\Http\Controllers\BaseController;
use Botble\ContactButtons\Models\ContactButton;
use Illuminate\Http\Request;

class ContactButtonController extends BaseController
{
    public function index()
    {
        PageTitle::setTitle('Contact Buttons');
        $items = ContactButton::orderBy('sort_order')->paginate(30);
        return view('plugins/contact-buttons::index', compact('items'));
    }

    public function create()
    {
        PageTitle::setTitle('Create Contact Button');
        return view('plugins/contact-buttons::form', ['item' => new ContactButton()]);
    }

    public function store(Request $request)
    {
        ContactButton::create($request->validate([
            'label' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'icon_class' => 'nullable|string|max:255',
            'bg_color' => 'nullable|string|max:30',
            'text_color' => 'nullable|string|max:30',
            'position' => 'nullable|string|max:20',
            'target' => 'nullable|in:_self,_blank',
            'style' => 'nullable|in:1,2,3',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]) + ['is_active' => $request->boolean('is_active')]);

        return redirect()->route('contact-buttons.index')->with('success', 'Created');
    }

    public function edit($id)
    {
        $item = ContactButton::findOrFail($id);
        PageTitle::setTitle('Edit Contact Button');
        return view('plugins/contact-buttons::form', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = ContactButton::findOrFail($id);
        $item->update($request->validate([
            'label' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'icon_class' => 'nullable|string|max:255',
            'bg_color' => 'nullable|string|max:30',
            'text_color' => 'nullable|string|max:30',
            'position' => 'nullable|string|max:20',
            'target' => 'nullable|in:_self,_blank',
            'style' => 'nullable|in:1,2,3',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]) + ['is_active' => $request->boolean('is_active')]);

        return redirect()->route('contact-buttons.index')->with('success', 'Updated');
    }

    public function destroy($id)
    {
        ContactButton::findOrFail($id)->delete();
        return back()->with('success', 'Deleted');
    }
}