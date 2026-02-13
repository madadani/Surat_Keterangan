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
            'prices.*.min' => 'required|numeric|min:0',
            'prices.*.max' => 'nullable|numeric|min:0',
        ]);

        foreach ($data['prices'] as $id => $values) {
            Price::where('id', $id)->update([
                'price' => $values['min'],
                'max_price' => $values['max']
            ]);
        }

        return redirect()->back()->with('success', 'Harga estimasi berhasil diperbarui!');
    }
}
