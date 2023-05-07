<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Measurement;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $notes = Note::where("patient_id", 9)->latest()->paginate(5);
        // $patient = Patient::find(1);
        // $measurements = Measurement::where('patient_id', 9)->get();

        // $users = Measurement::select(DB::raw("bloodLevel as count"), DB::raw("DAYNAME(created_at) as day_name"))
        //             ->where('patient_id', 9)
        //             ->whereYear('created_at', date('Y'))
        //             ->groupBy(DB::raw("day_name"), DB::raw("bloodLevel"))
        //             ->orderBy('id', 'ASC')
        //             ->pluck('count', 'day_name');

        // $labels = $users->keys();
        // $data = $users->values();

        // // dd($notes);
        // return view('patientOverview', compact('notes', 'labels', 'data'));
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
            'comment' => 'required',
        ]);

        $input = $request->all();

        // $note = new Note();
        // $note->patient_id = $input["patient_id"];
        // $note->comment = $input["comment"];
        // $note->color = $input["color"];
        // dd($note);

        // $note->save();

        Note::create($request->all());

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $notes = Note::where("patient_id", $id)->latest()->paginate(5);

        return view('patientOverview', compact('notes', 'id'));
    }

    public function getChartData($id, $attribut)
    {
        // $users = Measurement::select(DB::raw("$attribut as count"), DB::raw("DAYNAME(created_at) as day_name"))
        //             ->where('patient_id', $id)
        //             ->whereYear('created_at', date('Y'))
        //             //->groupBy(DB::raw("day_name"), DB::raw("$attribut"))
        //             ->orderBy('created_at', 'ASC')
        //             // ->orderByDesc('created_at')
        //             // ->take(3)
        //             ->pluck('count', 'day_name');
        $users = DB::select("SELECT DAYNAME(created_at) as dayname, $attribut FROM `measurements` WHERE patient_id=$id ORDER by created_at DESC limit 7");
        //dd($users);
        $labels = [];
        $label_values = [];
        foreach($users as $value) {
            $labels[] = $value->dayname;
            $label_values[] = $value->$attribut;
        }
        $labels = array_reverse($labels);
        // $labels=array_reverse($labels);
        $label_values = array_reverse($label_values);
        //dd($labels, $labels_values);
        $data = ['labels' => $labels,
                'data'=>$label_values
            ];
        // $data=array_reverse($data);
        // dd($labels, $data);
        return response()
            ->json($data)
            ->header('content', 'Application/json');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->route('notes.index')
                        ->with('success', 'Note deleted successfully');
    }
}
