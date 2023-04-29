@extends('app.app')

@section('content')
<!-- Main content -->
<div class="row">
    <div class="col-12">
        <!-- Default box -->
        <div class="card collapsed-card">
            
            <div class="card-header">
                <h3 class="card-title">Department & Section</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @include('admin.partials.department')
                    @include('admin.partials.section')
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<div class="row">
    @include('admin.partials.shop')
</div>
<div class="row">
    <div class="col-12">
        <div class="card collapsed-card">
            <div class="card-header">
                <h3 class="card-title">Positions and Department - Section - Shop Relationship</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        @include('admin.partials.position')
                    </div>
                    <div class="col-9">
                        @include('admin.partials.department-section')
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        @include('admin.partials.section-shop')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content -->
<script>
    const selectDepartmentBelongsTo = document.getElementById('selectDepartmentBelongsTo')
    const selectSectionBelongsTo = document.getElementById('selectSectionBelongsTo')
    
    departments = {{ Js::from($departments) }}
    sections = {{ Js::from($sections) }}
    // shops = {{ Js::from($shops) }}
    // console.log(departments);
    // console.log(sections);
    // console.log(shops);
    document.addEventListener('DOMContentLoaded', function() {
        
    })

    selectDepartmentBelongsTo.onchange = function() {
        const departmentIndex = parseInt(this.options[this.selectedIndex].getAttribute('key'))
        const sectionsBelongsTo = departmentIndex >= 0 ? departments[departmentIndex].sections : ''
        const ulSectionBelongsTo1 = document.getElementById('ulSectionBelongsTo1')
        const ulSectionBelongsTo2 = document.getElementById('ulSectionBelongsTo2')
        const ulSectionBelongsTo3 = document.getElementById('ulSectionBelongsTo3')

        function ulSectionEmpty(text) {
            ulSectionBelongsTo1.innerHTML = text ? text : ''
            ulSectionBelongsTo2.innerHTML = ''
            ulSectionBelongsTo3.innerHTML = ''
        }
        // console.log(this.selectedIndex);
        if (this.selectedIndex == 0) {
            ulSectionEmpty('Department not selected')
        }

        if (sectionsBelongsTo.length > 0) {
            // console.log(sectionsBelongsTo);
            ulSectionBelongsTo1.innerHTML = ''
            ulSectionBelongsTo2.innerHTML = ''
            ulSectionBelongsTo3.innerHTML = ''
            for (let i = 0; i < sectionsBelongsTo.length; i++) {
                const html = `
                        <li class="list-group-item" style="cursor: pointer;" data-section="${sectionsBelongsTo[i].id}">
                            ${sectionsBelongsTo[i].name}
                        </li>
                    `
                switch (i%3) {
                    case 0:
                        ulSectionBelongsTo1.insertAdjacentHTML('beforeend', html)
                        break;

                    case 1:
                        ulSectionBelongsTo2.insertAdjacentHTML('beforeend', html)
                        break;

                    case 2:
                        ulSectionBelongsTo3.insertAdjacentHTML('beforeend', html)
                        break;
                }

            }
        } else {
            if (this.selectedIndex !== 0) ulSectionEmpty('No section data')
        }
    }

    selectSectionBelongsTo.onchange = function() {
        const sectionIndex = parseInt(this.options[this.selectedIndex].getAttribute('key'))
        const shopsBelongsTo = sectionIndex >= 0 ? sections[sectionIndex].shops : ''
        const ulShopBelongsTo1 = document.getElementById('ulShopBelongsTo1')
        const ulShopBelongsTo2 = document.getElementById('ulShopBelongsTo2')
        const ulShopBelongsTo3 = document.getElementById('ulShopBelongsTo3')
        
        function ulShopEmpty(text) {
            ulShopBelongsTo1.innerHTML = text ? text : ''
            ulShopBelongsTo2.innerHTML = ''
            ulShopBelongsTo3.innerHTML = ''
        }

        if (this.selectedIndex == 0) {
            ulShopEmpty('Section not selected')
        }

        if (shopsBelongsTo.length > 0) {
            ulShopEmpty()

            for (let i = 0; i < shopsBelongsTo.length; i++) {
                const html = `
                        <li class="list-group-item" style="cursor: pointer;" data-section="${shopsBelongsTo[i].id}">
                            ${shopsBelongsTo[i].name}
                        </li>
                    `
                switch (i%3) {
                    case 0:
                        ulShopBelongsTo1.insertAdjacentHTML('beforeend', html)
                        break;

                    case 1:
                        ulShopBelongsTo2.insertAdjacentHTML('beforeend', html)
                        break;

                    case 2:
                        ulShopBelongsTo3.insertAdjacentHTML('beforeend', html)
                        break;
                    
                    default:
                        ulShopEmpty()
                        break;
                }
            }
        } else {
            if (this.selectedIndex !== 0) ulShopEmpty('No shop data')
        }
    }
</script>
@endsection