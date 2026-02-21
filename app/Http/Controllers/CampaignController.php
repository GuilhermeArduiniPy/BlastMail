<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Template;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        $search = request()->get('search', null);
        $withTrashed = request()->get('withTrash', false);

        return view('campaigns.index', [
            'campaigns' => Campaign::query()
                ->when($withTrashed, fn ($query) => $query->withTrashed())
                ->when($search, fn ($query) => $query
                    ->where('name', 'like', '%'.$search.'%')
                    ->orWhere('id', '=', $search)
                )
                ->paginate(20)
                ->appends(compact('search')),

            'search' => $search,
            'withTrashed' => $withTrashed,
        ]);
    }
}
