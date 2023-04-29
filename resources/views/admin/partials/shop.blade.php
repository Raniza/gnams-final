<div class="col-12">
    <div class="card collapsed-card">
        <div class="card-header">
            <h3 class="card-title">Shop</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-plus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <!-- Card body start -->
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        @if ($shops->count() > 0)
                            <div class="col-4">
                                <ul class="list-group">
                                    @foreach($shops as $key => $shop)
                                        @if ($key%3 == 0)
                                            <li class="list-group-item" style="cursor: pointer;" data-section-id="{{ $shop->section_id }}">
                                                {{ $shop->name }}
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-4">
                                <ul class="list-group">
                                    @foreach($shops as $key => $shop)
                                        @if ($key%3 == 1)
                                            <li class="list-group-item" style="cursor: pointer;" data-section-id="{{ $shop->section_id }}">
                                                {{ $shop->name }}
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-4">
                                <ul class="list-group">
                                    @foreach($shops as $key => $shop)
                                        @if ($key%3 == 2)
                                            <li class="list-group-item" style="cursor: pointer;" data-section-id="{{ $shop->section_id }}">
                                                {{ $shop->name }}
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <div class="col">
                                <ul class="list-group">
                                    <li class="list-group-item">No Data</li>
                                </ul>
                            </div>
                        @endif
                    </div>    
                </div>
            </div>
        </div>
        <!-- Card body end -->
    </div>
</div>

