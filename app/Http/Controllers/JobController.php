<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Types;  
use App\Models\Offer;

use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{

    public function init() {
        return view("main", []);
    }

    public function list(Request $request) {
        $jobs = Offer::get();
        return view("jobs", ["jobs" => $jobs]);
    }

    public function add(Request $request) {
        $offer = new Offer();
        $types = Types::all();
        $save =  $request->input('save'); 
      
       if ($save) {
    
          $validator = Validator::make($request->all(), [
             'title' => 'required|max:100',
             'body' => 'required',
             'type_id' => 'required|int',
             'location' => 'required',
          ], [
             'title.required' => "Pola tytuł jest wymagany",
             'body.required' => "Pola opis jest wymagane", 
             'type_id.required' => "Pola Branża jest wymagane", 
             'location.required' => "Pola miejsce jest wymagane", 
          ]       
        );
 
         if ($validator->fails()) {
            $validated = $validator->errors()->all();
            $offer = new Offer($request->all());
            return view("addeditjob", ["offer" => $offer, "types" => $types, 'errors' => implode(", ", $validated)]);
         } else {
            $validated = $validator->validated();
            Offer::create($validated);
            return redirect("jobs")->with('success', 'Oferta została dodana pomyślnie!');
         }  
       } 
       return view("addeditjob", ["offer" => $offer, "types" => $types, "errors" => ""]);
    }

    public function edit($id, Request $request) {
        $offer = Offer::find($id);
        if (!$offer) {
             return redirect("jobs")->with('error', 'nie znaleziono podanej oferty');
        }
        $types = Types::all();
        $save =  $request->input('save'); 
      
       if ($save) {
    
          $validator = Validator::make($request->all(), [
             'title' => 'required|max:100',
             'body' => 'required',
             'type_id' => 'required|int',
             'location' => 'required',
          ], [
             'title.required' => "Pola tytuł jest wymagany",
             'body.required' => "Pola opis jest wymagane", 
             'type_id.required' => "Pola Branża jest wymagane", 
             'location.required' => "Pola miejsce jest wymagane", 
          ]       
        );
 
         if ($validator->fails()) {
            $validated = $validator->errors()->all();
            $offer = new Offer($request->all());
            return view("addeditjob", ["offer" => $offer, "types" => $types, 'errors' => implode(", ", $validated), "isedit" => true]);
         } else {
            $validated = $validator->validated();
            $offer->update($validated);
            return redirect("jobs")->with('success', 'Oferta została edytowana pomyślnie!');
         }  
       } 
       return view("addeditjob", ["offer" => $offer, "types" => $types, "errors" => "", "isedit" => true]);
    }

    public function delete($id) {
        $offer = Offer::find($id);
        if ($offer) {
            $offer->delete();
            return redirect("jobs")->with('success', 'Oferta została usunięta');
        } 
        return redirect("jobs")->with('error', 'Nie znaleziono oferty');
    }  


}
