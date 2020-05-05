<div class="category m-4">
    <a
        href="{{ route('category.show', ['category' => $category]) }}"
        class="btn"
    >
        {{ $category->name }}
    </a>
</div>
