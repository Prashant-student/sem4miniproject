@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Create Post</div>

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
        </div>
    </div>
</div>
@endsection
