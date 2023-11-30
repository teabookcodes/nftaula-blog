<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Nft;
use Illuminate\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home');
    }

    public function nfts(Request $request): View
    {
        $query = Nft::query()->latest();

        $searchQuery = $request->input('search');

        if ($searchQuery) {
            $query->where('name', 'like', "%{$searchQuery}%");
        }

        $filters = ['category', 'marketplace', 'blockchain', 'currency'];

        foreach ($filters as $filter) {
            if ($request->filled($filter)) {
                $query->where($filter, $request->input($filter));
            }
        }

        if ($request->filled('minPrice')) {
            $query->where('price', '>=', $request->input('minPrice'));
        }

        if ($request->filled('maxPrice')) {
            $query->where('price', '<=', $request->input('maxPrice'));
        }

        $sortOption = $request->input('sort', 'latest');

        switch ($sortOption) {
            case 'oldest':
                $query->oldest();
                break;
            case 'lowestPrice':
                $query->orderBy('price');
                break;
            case 'highestPrice':
                $query->orderByDesc('price');
                break;
            default:
                $query->latest();
                break;
        }

        $nfts = $query->get();

        return view('browse.nfts', compact('nfts'));
    }

    public function collections(Request $request): View
    {
        $query = Collection::query()->latest();

        $searchQuery = $request->input('search');

        if ($searchQuery) {
            $query->where('name', 'like', "%{$searchQuery}%");
        }

        $filters = ['category', 'marketplace', 'blockchain', 'currency'];

        foreach ($filters as $filter) {
            if ($request->filled($filter)) {
                $query->where($filter, $request->input($filter));
            }
        }

        if ($request->filled('minPrice')) {
            $query->where('floor_price', '>=', $request->input('minPrice'));
        }

        if ($request->filled('maxPrice')) {
            $query->where('floor_price', '<=', $request->input('maxPrice'));
        }

        // Sorting logic based on the selected option
        $sortOption = $request->input('sort', 'latest');

        switch ($sortOption) {
            case 'oldest':
                $query->oldest();
                break;
            case 'lowestPrice':
                $query->orderBy('price');
                break;
            case 'highestPrice':
                $query->orderByDesc('price');
                break;
            default:
                $query->latest();
                break;
        }

        $collections = $query->get();

        return view('browse.collections', compact('collections'));
    }

    public function nft(Nft $nft): View
    {
        return view('nfts.show', [
            'nft' => $nft
        ]);
    }

    public function collection(Collection $collection): View
    {
        return view('collections.show', [
            'collection' => $collection
        ]);
    }
}
