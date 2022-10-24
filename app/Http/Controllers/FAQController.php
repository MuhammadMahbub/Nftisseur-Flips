<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = FAQ::all();
        return view('admin.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'question.*' => 'required',
            'answer.*'   => 'required',
        ]);
        // {"fr":"QUICK FLIP, POUR TOUS LES NIVEAUX","en":"QUICK FLIP, FOR ALL LEVELS"}
        FAQ::create([
            'question'  => '{"fr":"'.$request->question['fr'].'","en":"'.$request->question['en'].'"}',
            'answer'    => '{"fr":"'.$request->answer['fr'].'","en":"'.$request->answer['en'].'"}',
        ]);

        return redirect()->route('faq.index')->withSuccess('Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function show(FAQ $fAQ)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function edit(FAQ $fAQ)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        session()->put('faq_id',$id);
        $request->validate([
            'question_edit.*' => 'required',
            'answer_edit.*'   => 'required',
        ]);

        $faq = FAQ::find($id);

        $faq->update([
            'question'   => $request->question_edit,
            'answer'     => $request->answer_edit,
            'updated_at' => Carbon::now()
        ]);

        session()->forget(['faq_id']);

        return redirect()->route('faq.index')->withSuccess('Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FAQ::find($id)->delete();

        return back()->with('error','Deleted successfully');
    }

    public function faq_single_delete(Request $request)
    {
        foreach($request->ids as $id){
            FAQ::find($id)->delete();
        };

        return response()->json(['success' => 'done']);
    }

    public function faq_multi_delete(Request $request)
    {
        foreach($request->ids as $id){
            FAQ::find($id)->delete();
        };

        return response()->json(['success' => 'done']);
    }

    public function date_wise_search_faq(Request $request)
    {
        $request->validate([
            'from_date' => 'required',
            'to_date'   => 'required',
        ]);

        $from_date  = Carbon::parse($request->from_date);
        $to_date    = Carbon::parse($request->to_date)->addDay();

        $faqs  = FAQ::whereBetween('created_at', [$from_date, $to_date])->get();
        $count = $faqs->count();

        $view  = view('admin.includes.faq.index', compact('faqs'))->render();

        return response()->json(['data' => $view, 'count' => $count]);
    }

    public function date_wise_clear_faq(Request $request){
        $faqs = FAQ::all();
        $count = $faqs->count();

        $view = view('admin.includes.faq.index', compact('faqs'))->render();
        return response()->json(['data' => $view, 'count' => $count]);
    }

    public function search_wise_faq(Request $request){
        if ($request->search_value != null) {
            $faqs  =  FAQ::where('question','LIKE','%' . $request->search_value . '%')->get();
        } else {
            $faqs = FAQ::all();
        }

        $count = $faqs->count();

        $view  = view('admin.includes.faq.index', compact('faqs'))->render();
        return response()->json(['data' => $view , 'count' => $count]);
    }

}
