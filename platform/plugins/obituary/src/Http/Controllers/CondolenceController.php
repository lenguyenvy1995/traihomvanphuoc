<?php 
namespace Botble\Obituary\Http\Controllers;

use Botble\Obituary\Models\ObituaryCondolence;
use Illuminate\Http\Request;

class CondolenceController
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'obituary_id' => 'required|integer|exists:obituaries,id',
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        ObituaryCondolence::create($data);

        return back()->with('success', 'Cảm ơn bạn đã gửi lời chia buồn.');
    }
}