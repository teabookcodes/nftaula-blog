<?php

namespace App\Http\Controllers;

use App\Models\Nft;
use Illuminate\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request): View
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

        $nfts = $query->get();

        return view('home', compact('nfts'));
    }
}
