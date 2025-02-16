<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\BookReturnExport;
use App\Models\{BookReturn};
use Maatwebsite\Excel\Facades\Excel;

class ExportBookReturnController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $q_name = $request->q_name;
        $book_return = BookReturn::orderBy('id', 'asc');
        
        $book_return = $book_return->simplePaginate(15);

        return view('apps.admin.book_return_export.index')->with('book_return', $book_return);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function download(Request $request)
    {
        return Excel::download(new BookReturnExport($request->date_from, $request->until_date), 'daftar-pengembalian-buku.xlsx');
    }
}
