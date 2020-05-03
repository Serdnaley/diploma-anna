<div class="card">
    <div class="card__bg"></div>
    <div class="card__content">
        <a href="{{ route('category.show', ['category' => $category]) }}"  class="card__title">
            {{ $category->name }}
        </a>
        <p class="card__actions">
            @if(Gate::allows('update', $category))
                <a href="{{ route('category.edit', ['category' => $category]) }}" class="btn btn-link">
                    Edit category
                </a>
                <span class="color-secondary">&bull;</span>
            @endif
            <a href="{{ route('category.show', ['category' => $category]) }}" class="btn btn-primary">
                View category
            </a>
        </p>
    </div>
</div>
