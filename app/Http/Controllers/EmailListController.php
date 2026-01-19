<?php

namespace App\Http\Controllers;

use Pest\Support\Arr;
use App\Models\EmailList;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\throwException;

class EmailListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('email-list.index', [
            'emailLists' => EmailList::query()->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('email-list.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:csv',
        ]);

        $items = $this->getEmailsFromCsvFile($request->file('file'));

        DB::transaction(function () use ($request, $items) {
            $emailList = EmailList::query()->create([
                'title' => $request['title'],
            ]);
            $emailList->subscribers()->createMany($items);
        });
        return to_route('email-list.index')->with('success', 'Email list created successfully.');
    }




    private function getEmailsFromCsvFile(UploadedFile $file): array
    {
        $fileHandle = fopen($file->getRealPath(), 'r');
        $items = [];

        while (($row = fgetcsv($fileHandle, null, ',')) !== false) {

            if ($row[0] === 'name' && $row[1] === 'email') {
                continue; // Skip header row
            }
            $items[] = [
                'name' => $row[0],
                'email' => $row[1],
            ];
        }

        fclose($fileHandle);
        return $items;
    }
    /**
     * Display the specified resource.
     */
    public function show(EmailList $emailList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmailList $emailList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmailList $emailList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmailList $emailList)
    {
        //
    }
}
