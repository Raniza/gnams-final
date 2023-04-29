<div class="col-9">
    <div class="card card-primary">
        <div class="card-header py-2">
            <h4 class="card-title">Section</h4>
        </div>
        <div class="card-body">
            <div class="row">
            @if ($sections->count() > 0)
                <div class="col-4">
                    <ul class="list-group">
                        @foreach($sections as $key => $section)
                            @if ($key%3 == 0)
                                <li class="list-group-item" style="cursor: pointer;" data-department-id="{{ $section->department_id }}">
                                    {{ $section->name }}
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="col-4">
                    <ul class="list-group">
                        @foreach($sections as $key => $section)
                            @if ($key%3 == 1)
                                <li class="list-group-item" style="cursor: pointer;" data-department-id="{{ $section->department_id }}">
                                    {{ $section->name }}
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="col-4">
                    <ul class="list-group">
                        @foreach($sections as $key => $section)
                            @if ($key%3 == 2)
                                <li class="list-group-item" style="cursor: pointer;" data-department-id="{{ $section->department_id }}">
                                    {{ $section->name }}
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