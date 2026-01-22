<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{

    public function index()
    {
        $search = request()->get('search', null);
        $withTrashed = request()->get('withTrash', false);

        return view('template.index', [
            'templates' => Template::query()
                ->when($withTrashed, fn($query)=>$query->withTrashed())
                ->when($search, fn($query) => $query
                ->where('name', 'like', '%' . $search . '%')
                ->orWhere('id', 'like', '%' . $search . '%')
                )
            ->paginate()
            ->appends(compact('search')),

            'search' => $search,
            'withTrashed' => $withTrashed,
        ]);
    }


    public function create()
    {
        return view('template.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string', 'max:255'],
            'body' => ['required']
        ]);

        Template::create($data);

        return to_route('template.index')
            ->with('message', 'Template created successfully.');
    }


    public function show(Template $template)
    {
        return view('template.show', compact('template'));
    }


    public function edit(Template $template)
    {
        return view('template.edit', compact('template'));
    }


    public function update(Request $request, Template $template)
    {
        $data = $request->validate([
            'name' => ['required','string', 'max:255'],
            'body' => ['required']
        ]);

        $template->fill($data);
        $template->save();

        return back()->with('message', 'Template updated successfully.');
    }


    public function destroy(Template $template)
    {
        $template->delete();

        return to_route('template.index')
            ->with('message', 'Template deleted successfully.');
    }
}
