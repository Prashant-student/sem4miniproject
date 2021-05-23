@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">Edit Profile</div>

                    <div class="card-body">
                        <form  action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
                            @csrf
                            @method('PATCH')

                            <div class="form-group row">
                                <label for="title" class="col-md-3 col-form-label text-md-right">Title</label>

                                <div class="col-md-8">
                                    <input id="title" type="text"
                                           class="form-control"
                                           name="title" value="{{ old('title') ?? $user->profile->title }}"
                                           required autocomplete="title" autofocus>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-3 col-form-label text-md-right" >Description</label>

                                <div class="col-md-8">
                                <textarea size="100" id="description" type="text"
                                          class="form-control"
                                          style="height: 150px"
                                          name="description"
                                          value="{{ old('description') ?? $user->profile->description }}"
                                          autocomplete="current-description">
                                </textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="url" class="col-md-3 col-form-label text-md-right">URL</label>

                                <div class="col-md-8">
                                    <input id="url" type="url"
                                           class="form-control"
                                           name="url" value="{{ old('url') ?? $user->profile->url}}"
                                           autocomplete="url" autofocus>

                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="image" class="col-md-3 col-form-label text-md-right">Profile image</label>

                                <div class="col-md-8">
                                    <input id="image" type="file"
                                           class="form-control"
                                           name="image" value="{{ old('image') }}"
                                           autofocus>

                                </div>
                            </div>

{{--                            <div class="form-group row">--}}
{{--                                <div class="col-md-6 offset-md-4">--}}
{{--                                    <div class="form-check">--}}
{{--                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                        <label class="form-check-label" for="remember">--}}
{{--                                            {{ __('Remember Me') }}--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save Profile
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
