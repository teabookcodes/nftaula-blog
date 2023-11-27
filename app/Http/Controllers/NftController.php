<?php

namespace App\Http\Controllers;

use App\Models\Nft;
use App\Models\SavedNft;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class NftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $user = Auth::user();

        return view('dashboard', [
            'nfts' => $user->nfts()->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('nfts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|unique:nfts|string|min:3|max:255',
            'collection_name' => 'required|string|min:3|max:255',
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,avif,webp|max:2048',
            'category' => 'required|string|in:art,celebrities,collectibles,domain-names,gaming,memberships,memes,music,pfps,photography,sport,trading-cards,utilities,videos,virtual-worlds,other',
            'marketplace' => 'required|string|in:blur,foundation,gamma-io,knownorigin,magiceden,mintable,nifty-gateway,objkt-com,oneplanet-nft,opensea,rarible,superare,other',
            'blockchain' => 'required|string|in:bitcoin,binance-chain,ethereum,flow,polygon,solana,tezos',
            'price' => 'required|numeric|min:0',
            'currency' => 'required|string|in:btc,bnb,eth,weth,flow,matic,sol,xtz',
            'description' => 'nullable|string|min:3|max:500',
            'marketplace_link' => 'url|max:255',
            'created_using_ai' => 'nullable|boolean',
        ]);

        $imageName = uniqid('nft_') . '.' . $request->file('image')->getClientOriginalExtension();

        $request->file('image')->storeAs('public/nft_images', $imageName);

        // Check if the checkbox is checked, set 'created_using_ai' to true, otherwise false
        $createdUsingAI = $request->has('created_using_ai') ? true : false;

        $request->user()->nfts()->create(array_merge($validated, ['image' => $imageName, 'created_using_ai' => $createdUsingAI]));

        return redirect(route('dashboard'))->with('success', 'NFT created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Nft $nft): View
    {
        return view('nfts.show', [
            'nft' => $nft
        ]);
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
            'description' => 'nullable|string|min:3|max:500',
        ]);

        $nft->update($validated);

        return redirect(route('dashboard'))->with('success', 'NFT updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nft $nft): RedirectResponse
    {
        $this->authorize('delete', $nft);

        $nft->delete();

        return redirect(route('dashboard'))->with('success', 'NFT deleted successfully!');
    }

    public function save(Request $request, $nft): RedirectResponse
    {
        $user = auth()->user();

        if (!SavedNft::where('user_id', $user->id)->where('nft_id', $nft)->exists()) {
            SavedNft::create([
                'user_id' => $user->id,
                'nft_id' => $nft,
            ]);
        }

        return redirect()->back();
    }

    public function unsave(Request $request, $nft): RedirectResponse
    {
        $user = auth()->user();

        SavedNft::where('user_id', $user->id)->where('nft_id', $nft)->delete();

        return redirect()->back();
    }
}
