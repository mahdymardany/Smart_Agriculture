@extends('admin.master')
@section('main-content')
    <section class="content">
        <div class="container">
        </div>
        <div class="row">
            <!-- left column -->
            <div class="col-md-8 col-md-offset-2">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">ایجاد سنسور</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('sensors.store')}}" method="POST">
                        @csrf
                        @include('admin.section.errors')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="serial">نام زمین</label>
                                <input type="text" class="form-control" name="serial" id="serial" placeholder="شناسه سنسور">
                            </div>
                            <div class="form-group">
                                <label for="land_id">زمین</label>
                                <select class="form-control chosen-select" style="width: 100%;" name="land_id" id="land_id">
                                    @foreach($lands as $land)
                                         <option value="{{ $land->id }}">{{$land->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success" id="btn-map">ثبت</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{ asset('js/chosen.js') }}"></script>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('css/chosen.css')}}">
@endsection