@extends('layouts.app')

@section('content')
    <div  class="p-0 m-0" style="background-image: url('/images/8379.jpg');
  background-repeat: no-repeat;
  background-size: cover;
">
        <div class="container py-4" >
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <a href="/profile/{{auth()->user()->id}}">
                        <div class="card-header" style="color: #1b1e21"><h5>Profile</h5></div>
                    </a>
                    <div class="media m-0 align-content-center d-flex align-content-stretch">
                        <div class="card-header pl-5 pr-0 overflow-hidden" style="height: 1000px">
                                <nav>
                                    <div class="nav nav-tabs flex-column border-0 " id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link border-0 my-2 justify-content-end" id="nav-questions-tab" data-toggle="tab"
                                           href="#nav-questions"
                                           role="tab" aria-controls="nav-questions" aria-selected="false">Analysis</a>
                                        <a class="nav-item nav-link active border-0 my-2 justify-content-end" id="nav-posts-tab" data-toggle="tab"
                                           href="#nav-posts"
                                           role="tab" aria-controls="nav-posts" aria-selected="true">Sales</a>
                                        <a class="nav-item nav-link border-0 my-2 justify-content-end" id="nav-projects-tab" data-toggle="tab"
                                           href="#nav-projects"
                                           role="tab" aria-controls="nav-projects" aria-selected="false">Sell</a>
                                        <a class="nav-item nav-link border-0 my-2 justify-content-end" id="nav-predict-tab" data-toggle="tab"
                                           href="#nav-predict"
                                           role="tab" aria-controls="nav-predict" aria-selected="false">Predict</a>
                                        @if(auth()->user()->role == 'company')
                                            <a class="nav-item nav-link border-0 my-2 justify-content-end" id="nav-storage-tab" data-toggle="tab"
                                               href="#nav-storage"
                                               role="tab" aria-controls="nav-storage" aria-selected="false">Predict</a>
                                        @endif
                                    </div>
                                </nav>
                        </div>
                        <div class="card-body p-0 ">
                            <div class="tab-content " id="nav-tabContent">
                                <div class="tab-pane fade" id="nav-questions" role="tabpanel" aria-labelledby="nav-questions-tab">
                                    <div class="card-body">
                                        <img src="/images/pd.png">
                                    </div>
                                </div>
                                <div class="tab-pane fade show active " id="nav-posts" role="tabpanel" aria-labelledby="nav-posts-tab">
                                    <div class="card-body">
                                        @foreach($posts as $post)
                                                    <div class="card mb-3" >
                                                <a style="color: #0a0302" href="/p/{{$post->id}}">
                                                    <div class="card-header pt-3 d-flex justify-content-around" style="color: #1b1e21">
                                                        <div>
                                                            <h5>{{ $post->cv_name }} , {{$post->disposal_tonns}}</h5>
                                                        </div>
                                                        <div class="flex-grow-1"></div>
                                                        <div class="d-flex">
                                                            <div class="pr-2"><h5 style="color: #1f9d55">{{$post->percentage}}</h5>
                                                            </div>
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

                                                </div>
                                                <div class="d-flex card-footer align-items-baseline">
                                                    <div>grown by:</div>
                                                    <div class="px-2"><img src="{{$post->user->profile->profile_image()}}"style="width: 35px" class="rounded-circle">
                                                    </div>
                                                    <div><a href="/profile/{{$post->user->id}}" style="color: #1b1e21">{{$post->user->username}}</a> </div>

                                                </div>
                                            </div>
                                        @endforeach

                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-center">
                                                {{ $posts -> links("pagination::bootstrap-4") }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-projects" role="tabpanel" aria-labelledby="nav-projects-tab">
                                    <div class="card-body">
                                        <form  action="/p" enctype="multipart/form-data" method="post">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="cv_name" class="col-md-4 col-form-label text-md-right">CV Name:</label>

                                                <div class="col-md-4">
                                                    <input id="cv_name" type="text"
                                                           class="form-control"
                                                           name="cv_name" value="{{ old('cv_name') }}"
                                                           required autocomplete="cv_name" autofocus>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="cluster_name" class="col-md-4 col-form-label text-md-right">Cluster Name</label>

                                                <div class="col-md-4">
                                                    <input id="cluster_name" type="text"
                                                           class="form-control"
                                                           name="cluster_name" value="{{ old('cluster_name') }}"
                                                           required autocomplete="cluster_name" autofocus>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="plant_area" class="col-md-4 col-form-label text-md-right">Plant Area</label>

                                                <div class="col-md-4">
                                                    <input id="plant_area" type="number"
                                                           class="form-control"
                                                           name="plant_area" value="{{ old('plant_area') }}"
                                                           required autocomplete="plant_area" autofocus>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="crop_type_name" class="col-md-4 col-form-label text-md-right">Crop Type Name</label>

                                                <div class="col-md-4">
                                                    <input id="crop_type_name" type="text"
                                                           class="form-control"
                                                           name="crop_type_name" value="{{ old('crop_type_name') }}"
                                                           required autocomplete="crop_type_name" autofocus>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="disposal_date" class="col-md-4 col-form-label text-md-right">Disposal Date</label>

                                                <div class="col-md-4">
                                                    <input id="disposal_date" type="text"
                                                           class="form-control"
                                                           name="disposal_date" value="{{ old('disposal_date') }}"
                                                           required autocomplete="disposal_date" autofocus>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="disposal_tonns" class="col-md-4 col-form-label text-md-right">Disposal Tonns</label>

                                                <div class="col-md-4">
                                                    <input id="disposal_tonns" type="number"
                                                           class="form-control"
                                                           name="disposal_tonns" value="{{ old('disposal_tonns') }}"
                                                           required autocomplete="disposal_tonns" autofocus>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="age_in_days" class="col-md-4 col-form-label text-md-right">Age in days</label>

                                                <div class="col-md-4">
                                                    <input id="age_in_days" type="number"
                                                           class="form-control"
                                                           name="age_in_days" value="{{ old('age_in_days') }}"
                                                           required autocomplete="age_in_days" autofocus>

                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-center">
                                                <div class="form-group row mb-0 m-4">
                                                    <div class="col-md-4 offset-md-4">
                                                        <button type="submit" name="action" value="post" class="btn btn-primary">
                                                            Post
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-predict" role="tabpanel" aria-labelledby="nav-predict-tab">
                                    <div class="card-body">
                                        <form  action="/p/getprob" enctype="multipart/form-data" method="post">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="cv_name" class="col-md-4 col-form-label text-md-right">CV Name:</label>

                                                <div class="col-md-4">
                                                    <input id="cv_name" type="text"
                                                           class="form-control"
                                                           name="cv_name" value="{{ old('cv_name') }}"
                                                           required autocomplete="cv_name" autofocus>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="cluster_name" class="col-md-4 col-form-label text-md-right">Cluster Name</label>

                                                <div class="col-md-4">
                                                    <input id="cluster_name" type="text"
                                                           class="form-control"
                                                           name="cluster_name" value="{{ old('cluster_name') }}"
                                                           required autocomplete="cluster_name" autofocus>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="plant_area" class="col-md-4 col-form-label text-md-right">Plant Area</label>

                                                <div class="col-md-4">
                                                    <input id="plant_area" type="number"
                                                           class="form-control"
                                                           name="plant_area" value="{{ old('plant_area') }}"
                                                           required autocomplete="plant_area" autofocus>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="crop_type_name" class="col-md-4 col-form-label text-md-right">Crop Type Name</label>

                                                <div class="col-md-4">
                                                    <input id="crop_type_name" type="text"
                                                           class="form-control"
                                                           name="crop_type_name" value="{{ old('crop_type_name') }}"
                                                           required autocomplete="crop_type_name" autofocus>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="disposal_date" class="col-md-4 col-form-label text-md-right">Disposal Date</label>

                                                <div class="col-md-4">
                                                    <input id="disposal_date" type="text"
                                                           class="form-control"
                                                           name="disposal_date" value="{{ old('disposal_date') }}"
                                                           required autocomplete="disposal_date" autofocus>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="disposal_tonns" class="col-md-4 col-form-label text-md-right">Disposal Tonns</label>

                                                <div class="col-md-4">
                                                    <input id="disposal_tonns" type="number"
                                                           class="form-control"
                                                           name="disposal_tonns" value="{{ old('disposal_tonns') }}"
                                                           required autocomplete="disposal_tonns" autofocus>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="age_in_days" class="col-md-4 col-form-label text-md-right">Age in days</label>

                                                <div class="col-md-4">
                                                    <input id="age_in_days" type="number"
                                                           class="form-control"
                                                           name="age_in_days" value="{{ old('age_in_days') }}"
                                                           required autocomplete="age_in_days" autofocus>

                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-center">
                                                <div class="form-group row mb-0 m-4">
                                                    <div class="col-md-4 offset-md-4">
                                                        <button type="submit" name="action" value="post" class="btn btn-primary">
                                                            Predict
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                                @if(auth()->user()->role == 'company')  <div class="tab-pane fade" id="nav-posts" role="tabpanel" aria-labelledby="nav-posts-tab">
                                    <div class="card-body">
                                        @foreach($posts as $post)
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

                                                </div>
                                                <div class="d-flex card-footer align-items-baseline">
                                                    <div>grown by:</div>
                                                    <div class="px-2"><img src="{{$post->user->profile->profile_image()}}"style="width: 35px" class="rounded-circle">
                                                    </div>
                                                    <div><a href="/profile/{{$post->user->id}}" style="color: #1b1e21">{{$post->user->username}}</a> </div>

                                                </div>
                                            </div>
                                        @endforeach

                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-center">
                                                {{ $posts -> links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
        </div>
@endsection

