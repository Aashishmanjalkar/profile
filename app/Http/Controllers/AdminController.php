<?php

namespace App\Http\Controllers;

use App\Models\Description;
use App\Models\Projects;
use App\Models\Resume;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function index(){
        $projects = Projects::all();
        $description = Description::pluck('description')->first();
        $skills = Skill::all();
        return view('admin',compact('projects','description','skills'));
    }

    public function main(){
        $projects = Projects::all();

        foreach ($projects as $value) {
            $path = public_path() . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR  . $value['image'];
            $exits = File::exists($path);

            $value['image'] = $exits ? url('uploads/' . $value['image']) : null;
        }
        $skills = Skill::all();
        $resume = Resume::pluck('resume')->first();
        $description = Description::pluck('description')->first();

        return view('main',compact('projects','description','resume','skills'));
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
            $fileName = time().'_'. str_replace(' ', '_',$request->file('image')->getClientOriginalName());
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

    public function updateDescription(Request $request){
        Description::where('id',1)->update(['description'=>$request->description]);
        return redirect('/admin');
    }

    public function updateResume(Request $request){

        if($request->hasFile('resume')){
            $path = public_path() . DIRECTORY_SEPARATOR . 'files';
            File::cleanDirectory($path);
            $fileName = str_replace(' ', '_',$request->file('resume')->getClientOriginalName());
            $request->file('resume')->move( public_path('files'), $fileName);
        }
        Resume::where('id',1)->update(['resume'=>$fileName]);
        return redirect('/admin');
    }

    public function addSkill(Request $request){
        $skill = new Skill();
        $skill->name = $request->skillName;
        $skill->percentage = $request->skillPercentage;
        $skill->color = $request->color;
        $skill->save();
        return redirect('/admin');
    }

    public function updateSkill(Request $request){
        Skill::where('id',$request->id)
        ->update(['name'=>$request->skillName,'percentage' => $request->skillPercentage,'color' => $request->color]);
        return redirect('/admin');
    }

    public function deleteSkill(Request $request){
        Skill::find($request->id)->delete();
        return response()->json();
    }
}
