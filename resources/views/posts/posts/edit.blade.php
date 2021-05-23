@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Update Post</div>

                <div class="card-body">
                    <form  action="/p/{{ $post->id }}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="title" class="col-md-3 col-form-label text-md-right">Title</label>

                            <div class="col-md-8">
                                <input id="title" type="text"
                                       class="form-control"
                                       name="title" value="{{ old('title', $post->title) }}"
                                       required autocomplete="title" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-3 col-form-label text-md-right" >Description</label>

                            <div class="col-md-8">
                                <text-editor body="hello
                                **hey**
                                ```javascript
                                this is code
                                ```">
                                     <textarea size="100" id="description" type="text"
                                               class="form-control border-top-0"
                                               style="height: 250px"
                                               name="description"
                                               required autocomplete="current-description">
                                         {{ old('description', $post->description) }}
                                      </textarea>
                                </text-editor>
                            </div>
                        </div>

{{--                        <div class="form-group row">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                    <label class="form-check-label" for="remember">--}}
{{--                                        {{ __('Remember Me') }}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="d-flex justify-content-center">
                            <div class="form-group row mb-0 m-4">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" name="action" value="post" class="btn btn-primary">
                                        Update Question
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
