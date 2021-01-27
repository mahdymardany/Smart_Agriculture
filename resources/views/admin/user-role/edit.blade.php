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
                        <h3 class="box-title">ایجاد مقام</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('roles.update' , ['role' => $role->id]) }}" method="post">
                        @csrf
                        @method('PATCH')
                        {{ method_field('PATCH') }}
                        @include('admin.section.errors')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">نام مقام</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="نام مقام..."  value="{{ $role->name }}">
                            </div>
                            <div class="form-group">
{{--                                @php $collection = $role->permissions; $plucked = $collection->pluck('name'); dd($plucked); @endphp--}}
                                <label for="permissions">مجوز ها</label>
                                <select class="form-control chosen-select" name="permissions[]"  multiple data-placeholder="مجوز های مورد نظر را انتخاب کنید...">
                                    @foreach($permissions as $permission)
                                        <option value="{{ $permission->id }}" {{ in_array($permission->id , $role->permissions()->pluck('id')->toArray()) ? 'selected' : '' }}>
                                            {{ $permission->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">ثبت</button>
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
@endsection()
@section('css')
    <link rel="stylesheet" href="{{ asset('css/chosen.css') }}">
@endsection()