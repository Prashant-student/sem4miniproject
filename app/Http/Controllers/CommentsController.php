<?php

namespace App\Http\Controllers;

use App\Models\Answers;
use App\Models\Posts;
use App\Models\Projects;
use App\Models\Questions;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function commentQuestion(Questions $question)
    {
        $comment = \request()->comment;
        auth()->user()->commentQuestion($question,$comment);
        return back();
    }
    public function commentAnswer(Answers $answer)
    {
        $comment = \request()->comment;
        auth()->user()->commentAnswer($answer,$comment);
        return back();
    }
    public function commentPost(Posts $post)
    {
        $comment = \request()->comment;
        auth()->user()->commentPost($post,$comment);
        return back();
    }
    public function commentProject(Projects $project)
    {
        $comment = \request()->comment;
        auth()->user()->commentProject($project,$comment);
        return back();
    }
}
