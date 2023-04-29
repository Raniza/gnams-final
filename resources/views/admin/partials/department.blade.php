<div class="col-3">
    <div class="card card-primary">
        <div class="card-header py-2">
            <h4 class="card-title">Department</h4>
        </div>
        <div class="card-body">
            <ul class="list-group">
                @if ($departments->count() > 0)
                    @foreach($departments as $department)
                        <li class="list-group-item" style="cursor: pointer;">{{ $department->name }}</li>
                    @endforeach
                @else
                    <li class="list-group-item">No Data</li>
                @endif
            </ul>
        </div>
    </div>
</div>