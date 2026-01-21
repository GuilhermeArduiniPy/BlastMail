<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailList;
use App\Models\Subscriber;
use GuzzleHttp\Psr7\Query;
use League\Uri\Builder;

class SubscriberController extends Controller
{
    public function index(EmailList $emailList)
    {
        $search = request()->search;
        $showTrash = request()->get('showTrash', false);

        return view('subscriber.index', [
            'emailList' => $emailList,
            'subscribers' => $emailList->subscribers()
                ->when($showTrash, fn($query) => $query->withTrashed())
                ->when($search, fn($query) => $query->where('name', 'like', "%$search%"))
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('id', '=', $search)
                ->paginate(10),
            'search' => $search,
            'showTrash' => $showTrash,
        ]);
    }

    public function destroy(mixed $emailList, Subscriber $subscriber)
    {
        $subscriber->delete();

        return back()->with('message', __('Subscriber deleted from the list!'));
    }
}
