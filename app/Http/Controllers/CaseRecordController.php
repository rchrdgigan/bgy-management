<?php

namespace App\Http\Controllers;
use App\Models\Record;
use App\Models\Resident;
use App\Models\AssignResidentRecord;
use Illuminate\Http\Request;

class CaseRecordController extends Controller
{
    public function index()
    {
        $record = Record::get();
        $record->map(function($item){
            $assign_resident_record = $item->assign_resident_record;
            $assign_resident_record->map(function ($listRecord){
                $item_respondent_name = Resident::findorfail($listRecord->resident_id);
                $listRecord->fname = $item_respondent_name->fname;
                $listRecord->mname = $item_respondent_name->mname;
                $listRecord->lname = $item_respondent_name->lname;
            });
        });

        $resident = Resident::get();
        return view('manage-blotter',compact('resident','record'));
    }

    public function store(Request $request)
    {
        $validated = $request->all();
        $record = Record::create([
            'complianant_name' => $request->complianant,
            'complianant_statement' => $request->complianant_statement,
            'respondent_name' => $request->respondent_name,
            'location_incident' => $request->location,
            'type_incident' => $request->incident,
            'date_time_reported' => $request->dt_report,
            'date_time_incident' => $request->dt_incident,
            'status' => $request->status,
            'remarks' => $request->remarks,
            'action_taken' => $request->action_taken,
        ]);
        if(count($validated['involve_resident'])>0){
            foreach($validated['involve_resident'] as $involve_resident){
                $resident = Resident::findOrFail($involve_resident);
                $assign_resident = AssignResidentRecord::create([
                    'record_id' => $record->id,
                    'resident_id' => $resident->id,
                ]);
            }
        }

        return redirect()->route('list.records')->with('sucess_message','Successfully added!');
    }

    public function show($id)
    {
        $record = Record::where('id',$id)->get();
        $record->map(function($item){
            $assign_resident_record = $item->assign_resident_record;
            $assign_resident_record->map(function ($listRecord){
                $item_respondent_name = Resident::findorfail($listRecord->resident_id);
                $listRecord->fname = $item_respondent_name->fname;
                $listRecord->mname = $item_respondent_name->mname;
                $listRecord->lname = $item_respondent_name->lname;
            });
        });
        return view('show-residents-record',compact('record'));
    }

    public function edit($id)
    {
        $record = Record::where('id',$id)->get();
        $record->map(function($item){
            $assign_resident_record = $item->assign_resident_record;
            $assign_resident_record->map(function ($listRecord){
                $item_respondent_name = Resident::findorfail($listRecord->resident_id);
                $listRecord->fname = $item_respondent_name->fname;
                $listRecord->mname = $item_respondent_name->mname;
                $listRecord->lname = $item_respondent_name->lname;
            });
        });
        $resident = Resident::get();
        return view('edit-resident-record',compact('resident','record'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->all();

        $find_record = Record::findOrFail($id);
        $find_record->complianant_name = $request->complianant;
        $find_record->complianant_statement = $request->complianant_statement;
        $find_record->respondent_name = $request->respondent_name;
        $find_record->location_incident = $request->location;
        $find_record->type_incident = $request->incident;
        $find_record->date_time_reported = $request->dt_report;
        $find_record->date_time_incident = $request->dt_incident;
        $find_record->status = $request->status;
        $find_record->remarks = $request->remarks;
        $find_record->action_taken = $request->action_taken;
        $find_record->update();

        AssignResidentRecord::where('record_id', $id)->delete();

        if(count($validated['involve_resident'])>0){
            foreach($validated['involve_resident'] as $involve_resident){
                $resident = Resident::findOrFail($involve_resident);
                $assign_resident = AssignResidentRecord::create([
                    'record_id' => $id,
                    'resident_id' => $resident->id,
                ]);
            }
        }
    
        return redirect()->route('list.records')->with('sucess_message','Successfully updated!');
    }

    public function destroy(Request $request)
    {
        $record = Record::findOrFail($request->id);
        $record->delete();
        return redirect()->route('list.records')->with('delete_message', 'Deleted data!');
    }
}
