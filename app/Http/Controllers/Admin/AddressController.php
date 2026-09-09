<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends Controller
{
    public function index(Request $request)
    {
        $query = Address::query();

        if ($search = $request->input('search')) {
            $query->where('address', 'like', '%' . $search . '%');
        }

        // Pagination 10 data per halaman, bisa diubah sesuai kebutuhan
        $addresses = $query->orderBy('address')->paginate(10);

        // supaya query parameter "search" ikut terbawa saat pagination
        $addresses->appends($request->only('search'));

        return view('admin.addresses.index', compact('addresses'));
    }

    public function create()
    {
        return view('admin.addresses.create');
    }

    public function store(Request $request)
    {
        $request->validate(['address' => 'required']);
        Address::create($request->all());
        return redirect()->route('admin.addresses.index')->with('success', 'Kota berhasil ditambahkan');
    }

    public function edit(Address $address)
    {
        return view('admin.addresses.edit', compact('address'));
    }

    public function update(Request $request, Address $address)
    {
        $request->validate(['address' => 'required']);
        $address->update($request->all());
        return redirect()->route('admin.addresses.index')->with('success', 'Kota berhasil diupdate');
    }

    public function destroy(Address $address)
    {
        $address->delete();
        return redirect()->route('admin.addresses.index')->with('success', 'Kota berhasil dihapus');
    }
}
