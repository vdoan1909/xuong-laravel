<li class="nav-item">
    <a href="#" class="nav-link">
        {{ $catalogue->name }}
    </a>

    @if ($catalogue->children)
        <ul class="nav nav-sm flex-column">
            @foreach ($catalogue->children as $child)
                @include('admin.catalogue.nested-catalogue', ['catalogue' => $child])
            @endforeach
        </ul>
    @endif
</li>
