<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index()
    {
        $prices = Price::all();
        return view('admin.prices', compact('prices'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'prices' => 'required|array',
            'prices.*' => 'required|numeric|min:0',
        ]);

        foreach ($data['prices'] as $id => $price) {
            Price::where('id', $id)->update(['price' => $price]);
        }

        return redirect()->back()->with('success', 'Harga estimasi berhasil diperbarui!');
    }
}
