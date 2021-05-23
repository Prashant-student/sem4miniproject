@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="p-4">
                    <div class="card col-md-11 justify-content-center">
                        <div class="card-header pt-3 d-flex justify-content-between" style="color: #1b1e21">
                            <h5>{{ $post->title }}</h5>
                            <div class="d-flex">
                                @can('update', $post->user->profile)
                                    <a href="/pr/{{$post->id}}/edit" class="btn btn-sm btn-outline-info">Edit</a>
                                    <form class="pl-3" method="post" action="/q/{{$post->id}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-sm btn-outline-info"
                                                onclick="return confirm('Are u sure?')">
                                            Delete
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                            <div class="card-body">
                            <p>{{ $post->description }}</p>
                            <div style="background-color: #95999c; max-width: 70px" class="rounded align-items-center">
                                <div class="px-3">tags</div>
                            </div>
                        </div>
                        <div class="d-flex card-footer align-items-baseline">
                            <div>posted by:</div>
                            <div class="px-2"><img src="{{$post->user->profile->profile_image()}}"style="width: 35px" class="rounded-circle">
                            </div>
                            <div><a href="/profile/{{$post->user->id}}" style="color: #1b1e21">{{$post->user->username}}</a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

