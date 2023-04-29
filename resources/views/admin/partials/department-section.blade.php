<div class="card">
    <div class="card-header bg-primary">
        <h3 class="card-title">Department and Section (Relationship)</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label class="font-weight-normal">Select Department</label>
                    <select class="form-control" style="cursor: pointer;" id="selectDepartmentBelongsTo">
                        <option class="text-muted" value="">Pilih Department</option>
                        @if ($departments->count() > 0)
                            @foreach($departments as $key => $department)
                                <option key="{{ $key }}" value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Section Belongs to Depertment Start -->
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Section Belongs to Depertment</h3>
                    </div>
                    <div class="card-body">
                        <!-- Section start -->
                        <div class="row">
                            <div class="col-4">
                                <ul class="list-group" id="ulSectionBelongsTo1">
                                    No Department Selected
                                </ul>
                            </div>
                            <div class="col-4">
                                <ul class="list-group" id="ulSectionBelongsTo2">
                                    
                                </ul>
                            </div>
                            <div class="col-4">
                                <ul class="list-group" id="ulSectionBelongsTo3">
                                    
                                </ul>
                            </div>
                        </div>
                        <!-- Section end -->
                    </div>
                </div>
                <!-- Section Belongs to Depertment End-->
            </div>
        </div>
    </div>
</div>