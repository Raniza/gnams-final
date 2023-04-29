<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Section and Shop (Relationship)</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label class="font-weight-normal">Select Section</label>
                    <select class="form-control" style="cursor: pointer;" id="selectSectionBelongsTo">
                        <option class="text-muted" value="">Pilih Section</option>
                        @if ($sections->count() > 0)
                            @foreach($sections as $key => $section)
                                <option key="{{ $key }}" value="{{ $section->id }}">{{ $section->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Shops Belongs to Section</h3>
                    </div>
                    <div class="card-body">
                        <!-- Shop start -->
                        <div class="row">
                            <div class="col-4">
                                <ul class="list-group" id="ulShopBelongsTo1">
                                    No Section Selected
                                </ul>
                            </div>
                            <div class="col-4">
                                <ul class="list-group" id="ulShopBelongsTo2">
                                    
                                </ul>
                            </div>
                            <div class="col-4">
                                <ul class="list-group" id="ulShopBelongsTo3">
                                    
                                </ul>
                            </div>
                        </div>
                        <!-- Shop end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>