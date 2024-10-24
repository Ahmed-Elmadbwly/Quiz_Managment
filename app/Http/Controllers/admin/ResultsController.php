<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
    public function show($id)
    {
       $quiz = Quiz::with(['attempts'])->findOrFail($id);

       return view('admin.results.show', compact('quiz'));
   }
}
