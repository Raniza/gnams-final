@extends('app.app')

@section('content')
<!-- Main content -->
<div class="container px-5">
    <div class="row">
        <div class="col-12">
            <!-- Default box -->
            <div class="card">
                <div class="overlay" style="display: none;">
                    <img style="margin-left: auto; margin-right: auto; display: block; padding-top: 75px;" src="{{  asset('loading.gif') }}" alt="">
                </div>
                <div class="card-header">
                    <h3 class="card-title">Horensou - Create</h3>

                    <div class="float-right d-none d-sm-block">
                        <a href="{{ route('horensou.request.index') }}">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('horensou.request.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="department">Department</label>
                                    <input type="hidden" rows="2" id="department" name="department" value="{{ auth()->user()->department->id }}">
                                    <input type="text" rows="2" class="form-control form-control-border" value="{{ auth()->user()->department->name }}" disabled>
                                    @error('department') <span class="text-danger" style="font-size: 14px;">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="section">Section</label>
                                    <input type="hidden" rows="2" id="section" name="section" value="{{ auth()->user()->section->id }}">
                                    <input type="text" rows="2" class="form-control form-control-border" value="{{ auth()->user()->section->name }}" disabled>
                                    @error('section') <span class="text-danger" style="font-size: 14px;">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="shop">Shop</label>
                                    <select class="custom-select form-control-border" id="shop" name="shop" style="cursor: pointer;">
                                        <option value="">{{ $shops->count() > 0 ? 'Select shop' : 'No sho data'}}</option>
                                        @if($shops->count() > 0)
                                            @foreach ($shops as $shop)
                                                <option value="{{ $shop->id }}" {{ old('shop') == $shop->id ? "selected" : ""}}>{{ $shop->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('shop') <span class="text-danger" style="font-size: 14px;">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label style="margin-bottom: 35px;" for="category">Kategori</label>
                                    <select class="custom-select form-control-border" id="category" name="category" style="cursor: pointer;">
                                        <option value="">Select Category</option>
                                        @if ($categories->count() > 0)
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('category') <span class="text-danger" style="font-size: 14px;">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group mb-0">
                                    <label style="margin-bottom: 35px;" for="priority">Prioritas</label>
                                    <select class="custom-select form-control-border" id="priority" name="priority" style="cursor: pointer;">
                                        <option value="">Select Priority</option>
                                        @if ($priorities->count() > 0)
                                            @foreach ($priorities as $priority)
                                                <option value="{{ $priority->id }}" {{ old('priority') == $priority->id ? 'selected' : '' }}>{{ $priority->code }} - {{ $priority->desc }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('priority') <span class="text-danger" style="font-size: 14px;">{{ $message }}</span> @enderror
                                </div>
                                <div style="padding-left: 8px;">
                                    <p class="text-secondary mb-0" style="font-size: 14px;">1: Normal; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2: Segera; </p>
                                    <p class="text-secondary mt-0" style="font-size: 14px;">3: Secepatnya; 4: Urgent</p> 
                                </div>
                                
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label style="margin-bottom: 35px;" for="part_name">Nama Part</label>
                                    <input type="text" rows="2" class="form-control form-control-border" id="part_name" name="part_name" value="{{ old('part_name') }}">
                                    @error('part_name') <span class="text-danger" style="font-size: 14px;">{{ $message }}</span> @enderror
                                </div>
                                
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="">Point Masalah</label>
                                    <textarea class="form-control" rows="2" placeholder="Input point masalah ..." id="point_problem" name="point_problem">{{ old('point_problem') }}</textarea>
                                    @error('point_problem') <span class="text-danger" style="font-size: 14px;">{{ $message }}</span> @enderror
                                </div>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card card-outline card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            Detail Masalah
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <textarea id="detailProblem" name="detail_problem">
                                            {{ old('detail_problem') }}
                                        </textarea>
                                        @error('detail_problem') <span class="text-danger" style="font-size: 14px;">{{ $message }}</span> @enderror
                                        <span>
                                            <p class="text-muted" style="font-size: 14px;">
                                                Tuliskan secara detail fenomena sebelum masalah tersebut muncul
                                                hingga masalah ini terjadi.
                                            </p>
                                        </span>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-sm btn-primary" title="Menyimpan data" data-toggle="tooltip" style="border-radius: 25px;">Tambah</button>
                    </form>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="float-right d-none d-sm-block">
                        {{ date("d-M-Y") }}
                    </div>
                    Requestor: <span class="font-weight-bolder">{{ auth()->user()->name }}</span> 
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
<!-- /.content -->
<script>
    const shops = {{ Js::from($shops) }}
    console.log(shops);
</script>
@endsection