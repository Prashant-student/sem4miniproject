<?php

namespace App\Http\Controllers;
use App\Models\Posts;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Models\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts.posts.create');
    }
    public function show(\App\Models\Posts $post)
    {
        return view('posts.posts.show',compact('post'));
    }

    public function index(){
        $posts = Posts::with('user')->orderBy('percentage','DESC')->paginate(10);
        return view('home',compact('posts'));
    }

    public function edit(Posts $post){
        return view("posts.posts.edit",compact('post'));
    }

    public function update(Posts $post){
        $data = \request()->validate([
            'title'=>'required',
            'description'=>'required',
        ]);
        $post->update($data);
        return redirect('/home');
    }

    public function destroy(Posts $post){
        try {
            $post->delete();
        } catch (\Exception $e) {
            dd($e);
        }
        return redirect('/home');
    }

    public function store()
    {
        $data = \request()->validate([
           'cv_name'=>'required',
            'cluster_name'=>'required',
            'plant_area'=>'required',
            'crop_type_name'=>'required',
            'disposal_date'=>'required',
            'disposal_tonns'=>'required',
            'age_in_days'=>'required',
        ]);
            auth()->user()->posts()->create($data);
        return redirect('/profile/'.auth()->user()->id);
    }
    public function getprob()
    {
        $x =  '{"CV_NAME":"86032","CLUSTER_NAME":"SHIRAGUPPI","PLANT_AREA":3.0,"CROP_TYPE_NAME":"R1","AGE_IN_DAYS":409,"DISPOSAL_TIME":749}';
        $process = new Process(["python /python/script.py"]);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        dd($process->getOutput());
    }
    public function accept(Posts $post)
    {
        $user =\auth()->user()->id;
        $post->accept($user);
        return back();
    }
}
