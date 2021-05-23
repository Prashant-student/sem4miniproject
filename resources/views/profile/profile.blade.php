@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="d-flex row justify-content-center">
        <div class="col-3">
            <img src="{{$user->profile->profile_image()}}" class="rounded-circle" style="height: 250px">
        </div>
        <div class="col-9 pt-4">
            <div class="d-flex justify-content-between ">

                <div class="d-flex">
                    <h1>{{$user->username}}</h1>
                   <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
                </div>
                <div>
                    <div> @can('update', $user->profile)
                            <a href="/p/create">make a new post</a>
                        @endcan</div>
                </div>
            </div>

            @can('update', $user->profile)
            <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
            @endcan
            <div class="d-flex">
                <div class="pr-4"><strong>{{ $user->posts->count()}}</strong> posts </div>
                <div class="pr-4"><strong>{{ $user->profile->followers->count() }}</strong> followers</div>
                <div class="pr-4"><strong>{{ $user->following->count() }}</strong> following</div>
            </div>
            <div class="pt-3"><h3>{{$user->profile->title}} </h3></div>
            <div>{{$user->profile->description}}</div>
            <div><a href="{{$user->profile->url}}"><h6 style="color: #1b1e21">{{$user->profile->url}}</h6></a></div>
        </div>
        <div class="card m-4">
         @foreach($user->posts as $post)
                <div class="card" >
                    <a style="color: #0a0302" href="/p/{{$post->id}}">
                        <div class="card-header pt-3 d-flex justify-content-between" style="color: #1b1e21">
                            <h5>{{ $post->cv_name }} , {{$post->disposal_tonns}}</h5>
                            <div class="d-flex">
                                @can('update', $post)
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
                    </a>
                    <div class="card-body">
                        <p>Cluster_Name: {{$post->cluster_name}}</p>
                        <p>Plant area: {{$post->plant_area}}</p>
                        <p>Crop Type Name: {{$post->crop_type_name}}</p>
                        <p>Disposal Date: {{$post->disposal_date}}</p>
                        <p>Age In Days: {{$post->age_in_days}}</p>
                        @if($post->accpted_by)
                            <p>Accepted By: {{\App\Models\User::find($post->accepted_by)->username}}</p>
                        @endif

                    </div>
                    <div class="d-flex card-footer align-items-baseline">
                        <div>grown by:</div>
                        <div class="px-2"><img src="{{$post->user->profile->profile_image()}}"style="width: 35px" class="rounded-circle">
                        </div>
                        <div><a href="/profile/{{$post->user->id}}" style="color: #1b1e21">{{$post->user->username}}</a> </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>
</div>
@endsection
