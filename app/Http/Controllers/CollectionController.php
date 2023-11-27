<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\SavedCollection;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $user = Auth::user();

        return view('dashboard', [
            'collections' => $user->collections()->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('collections.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|unique:collections|string|min:3|max:255',
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,avif,webp|max:2048',
            'category' => 'required|string|in:art,celebrities,collectibles,domain-names,gaming,memberships,memes,music,pfps,photography,sport,trading-cards,utilities,videos,virtual-worlds,other',
            'marketplace' => 'required|string|in:blur,foundation,gamma-io,knownorigin,magiceden,mintable,nifty-gateway,objkt-com,oneplanet-nft,opensea,rarible,superare,other',
            'blockchain' => 'required|string|in:bitcoin,binance-chain,ethereum,flow,polygon,solana,tezos',
            'floor_price' => 'required|numeric|min:0',
            'currency' => 'required|string|in:btc,bnb,eth,weth,flow,matic,sol,xtz',
            'description' => 'nullable|string|min:3|max:500',
            'marketplace_link' => 'url|max:255',
            'twitter_link' => 'nullable|url|max:255',
            'website_link' => 'nullable|url|max:255',
            'created_using_ai' => 'nullable|boolean',
        ]);

        $imageName = uniqid('collection_') . '.' . $request->file('image')->getClientOriginalExtension();

        $request->file('image')->storeAs('public/collection_images', $imageName);

        // Check if the checkbox is checked, set 'created_using_ai' to true, otherwise false
        $createdUsingAI = $request->has('created_using_ai') ? true : false;

        $request->user()->collections()->create(array_merge($validated, ['image' => $imageName, 'created_using_ai' => $createdUsingAI]));

        return redirect(route('dashboard'))->with('success', 'Collection created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Collection $collection): View
    {
        return view('collections.show', [
            'collection' => $collection
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Collection $collection): View
    {
        $this->authorize('update', $collection);

        return view('collections.edit', [
            'collection' => $collection
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Collection $collection): RedirectResponse
    {
        $this->authorize('update', $collection);

        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255|unique:collections,name,' . $collection->id,
            'description' => 'nullable|string|min:3|max:500',
        ]);

        $collection->update($validated);

        return redirect(route('dashboard'))->with('success', 'Collection updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collection $collection): RedirectResponse
    {
        $this->authorize('delete', $collection);

        $collection->delete();

        return redirect(route('dashboard'))->with('success', 'Collection deleted successfully!');
    }

    public function save(Request $request, $collection): RedirectResponse
    {
        $user = auth()->user();

        if (!SavedCollection::where('user_id', $user->id)->where('collection_id', $collection)->exists()) {
            SavedCollection::create([
                'user_id' => $user->id,
                'collection_id' => $collection,
            ]);
        }

        return redirect()->back();
    }

    public function unsave(Request $request, $collection): RedirectResponse
    {
        $user = auth()->user();

        SavedCollection::where('user_id', $user->id)->where('collection_id', $collection)->delete();

        return redirect()->back();
    }
}
