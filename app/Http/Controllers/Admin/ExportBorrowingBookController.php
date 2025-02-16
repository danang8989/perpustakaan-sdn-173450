<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\BorrowingBookExport;
use App\Models\{BorrowingBook};
use Maatwebsite\Excel\Facades\Excel;

class ExportBorrowingBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $q_name = $request->q_name;
        $borrowing_book = BorrowingBook::orderBy('id', 'asc');
        
        $borrowing_book = $borrowing_book->simplePaginate(15);

        return view('apps.admin.borrowing_book_export.index')->with('borrowing_book', $borrowing_book);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function download(Request $request)
    {
        return Excel::download(new BorrowingBookExport($request->date_from, $request->until_date), 'daftar-peminjaman-buku.xlsx');
    }
}
