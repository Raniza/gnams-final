<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Positions</h3>
    </div>
    <div class="card-body">
        @if ($positions->count() > 0)
            <ul class="list-group">
                @foreach ($positions as $position)
                    <li class="list-group-item" style="cursor: pointer;">
                        {{ $position->position }}
                    </li>
                @endforeach
            </ul>    
        @else
        @endif
    </div>
</div>