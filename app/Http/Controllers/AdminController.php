<?php

namespace App\Http\Controllers;

use App\Models\Description;
use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function index(){
        $projects = Projects::all();

        return view('admin',compact('projects'));
    }

    public function main(){
        $projects = Projects::all();

        foreach ($projects as $value) {
            $path = public_path() . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR  . $value['image'];
            $exits = File::exists($path);

            $value['image'] = $exits ? url('uploads/' . $value['image']) : null;
        }


        $description = Description::get('description')->pluck('description')->first();

        return view('main',compact('projects','description'));
    }
    public function addProject(Request $request){
        if($request->hasFile('image')){
            /* << ========== Retrieving File And storing into upload disks =========== >> */
            $fileName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads'), $fileName);
        }
        $project = new Projects;
        $project->description = $request->description;
        $project->link = $request->projectUrl;
        $project->image = $fileName;
        $project->save();
        return redirect('/admin');
    }
    public function updateProject(Request $request){

        if($request->hasFile('image')){
            /* << ========== Retrieving File And storing into upload disks =========== >> */
            $fileName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads'), $fileName);
        }
        Projects::where('id',$request->id)
        ->update(['description'=>$request->description,'link' => $request->projectUrl,'image' => $fileName]);
        return redirect('/admin');
    }

    public function deleteProject(Request $request){
        Projects::find($request->id)->delete();
        return response()->json();
    }
}
