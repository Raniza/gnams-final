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
                                    <select class="custom-select form-control-border" id="department" name="department" style="cursor: pointer;">
                                        <option value="" key="" class="text-muted">Select Department</option>
                                        @if ($departments->count() > 0)
                                            @foreach ($departments as $key => $department)
                                                <option value="{{ $department->id }}" key="{{ $key }}" {{ old('department') == $department->id ? "selected" : "" }}>{{ $department->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('department') <span class="text-danger" style="font-size: 14px;">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="section">Section</label>
                                    <select class="custom-select form-control-border" id="section" name="section" style="cursor: pointer;" disabled>
                                        <option value="">Select Section</option>
                                    </select>
                                    @error('section') <span class="text-danger" style="font-size: 14px;">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="shop">Shop</label>
                                    <select class="custom-select form-control-border" id="shop" name="shop" style="cursor: pointer;" disabled>
                                        <option value="">Select shop</option>
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
                    {{ auth()->user()->name }}
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
<!-- /.content -->
<script>
    const department = document.getElementById('department');
    const section = document.getElementById('section');
    const shop = document.getElementById('shop');
    let keyDepartment = null;
    const departments = {{ Js::from($departments) }}
    let shops;
    
    
    if (parseInt(department.value) >= 0 ) {
        keyDepartment = parseInt(department.options[department.selectedIndex].getAttribute('key'));
        shops = departments[keyDepartment].shops
        if (keyDepartment >= 0) {
            const dataSections = departments[keyDepartment].sections
            const oldSectionId = parseInt('{{ old("section") }}')
            for (let i = 0; i < dataSections.length; i++) {
                const sectionName = dataSections[i].name;
                const sectionId = dataSections[i].id
                const sectionHTML = `
                        <option value="${sectionId}" key="${i}" ${oldSectionId == sectionId ? 'selected' : ''}>${sectionName}</option>
                    `
                section.insertAdjacentHTML('beforeend', sectionHTML)
            }
            section.disabled = false;
            if (oldSectionId > 0) {
                const oldShopId = parseInt('{{ old("shop") }}')
                shop.disabled = false;
                if (oldShopId > 0) {
                    const filteredShops = shops.filter(eachObj => eachObj.section_id === oldSectionId)
                    for (let i = 0; i < filteredShops.length; i++) {
                        const shopName = filteredShops[i].name;
                        const shopId = filteredShops[i].id;
                        const shopHTML = `
                                <option value="${shopId}" key="${i}" ${oldShopId == shopId ? 'selected' : ''}>${shopName}</option>
                            `
                        shop.insertAdjacentHTML('beforeend', shopHTML)
                    }
                }
            }
        } else {
            section.disabled = true;
        }
    }
    department.onchange = function() {
        keyDepartment = parseInt(this.options[this.selectedIndex].getAttribute('key'));
        shops = keyDepartment >= 0 ? departments[keyDepartment].shops : ''
        section.innerHTML = "<option value=''>Select Section</option>"
        shop.innerHTML = "<option value=''>Select shop</option>"
        shop.disabled = true;
        if (keyDepartment >= 0) {
            const dataSections = departments[keyDepartment].sections
            for (let i = 0; i < dataSections.length; i++) {
                const sectionName = dataSections[i].name;
                const sectionId = dataSections[i].id
                const sectionHTML = `
                        <option value="${sectionId}" key="${i}">${sectionName}</option>
                    `
                section.insertAdjacentHTML('beforeend', sectionHTML)
            }
            section.disabled = false;
        } else {
            section.disabled = true;
            
        }
    }
    
    section.onchange = function() {
        const idSection = parseInt(this.options[this.selectedIndex].value)
        keySection = parseInt(this.options[this.selectedIndex].getAttribute('key'))
        shop.innerHTML = "<option value=''>Select Shop</option>"
        if (keySection >=0) {
            const filteredShops = shops.filter(eachObj => eachObj.section_id === idSection)
            for (let i = 0; i < filteredShops.length; i++) {
                const shopName = filteredShops[i].name;
                const shopId = filteredShops[i].id;
                const shopHTML = `
                        <option value="${shopId}" key="${i}">${shopName}</option>
                    `
                shop.insertAdjacentHTML('beforeend', shopHTML)
            }
            shop.disabled = false;
        } else {
            shop.disabled = true;
        }
        
    }

</script>
@endsection