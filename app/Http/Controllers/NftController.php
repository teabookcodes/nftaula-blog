<?php

namespace App\Http\Controllers;

use App\Models\Nft;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class NftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('nfts.index', [
            'nfts' => Nft::with('user')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|unique:nfts|string|min:3|max:255',
            'description' => 'nullable|string|min:3|max:500'
        ]);

        $request->user()->nfts()->create($validated);

        return redirect(route('nfts.index'))->with('success', 'NFT created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Nft $nft)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nft $nft): View
    {
        $this->authorize('update', $nft);

        return view('nfts.edit', [
            'nft' => $nft
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nft $nft): RedirectResponse
    {
        $this->authorize('update', $nft);

        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255|unique:nfts,name,' . $nft->id,
            'description' => 'nullable|string|min:3|max:500'
        ]);

        $nft->update($validated);

        return redirect(route('nfts.index'))->with('success', 'NFT updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nft $nft): RedirectResponse
    {
        $this->authorize('delete', $nft);

        $nft->delete();

        return redirect(route('nfts.index'))->with('success', 'NFT deleted successfully!');
    }
}
