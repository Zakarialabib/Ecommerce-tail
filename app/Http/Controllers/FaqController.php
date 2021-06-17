<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{


    public function faq(Request $request){     

        $faqs = Faq::query()
        ->orderBy('id', 'DESC')->get();
        
        return view('backend.faq.index', compact('faqs','user'));
    }

    // Add Faq
    public function add(){
        return view('backend.faq.add');
    }

    // Store Faq
    public function store(Request $request){

        $request->validate([
            'title' => 'required|max:150',
            'content' => 'required',
        ]);

        $faq = new Faq();
        $faq->status = $request->status;
        $faq->title = $request->title;
        $faq->content = $request->content;
        $faq->save();
       
       
        return redirect()->back()->session()->flash('success','Faq Successfully added');
    }

    // Faq Delete
    public function delete($id){

        $faq = Faq::find($id);
        $faq->delete();

        return back();
    }

    // Faq Edit
    public function edit($id){

        $faq = Faq::find($id);
        return view('backend.faq.edit', compact('faq'));

    }

    // Update Faq
    public function update(Request $request, $id){

        $id = $request->id;
         $request->validate([
            'title' => 'required|max:150',
            'content' => 'required',
        ]);

        $faq = Faq::find($id);
        $faq->status = $request->status;
        $faq->title = $request->title;
        $faq->content = $request->content;
        $faq->save();

      
        return redirect(route('faq'));
    }



}