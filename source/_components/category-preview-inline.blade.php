<div class="flex flex-col mb-4">
    <h2>
        <a
            href="/cz/blog/categories/{{ $post->category }}"
            title="Read more - {{ $post->title }}"
            class="mont-600 active blog-title d-inline-block position-relative"
        >{{ $post->title }}</a>
    </h2>

    <p class="mb-4 mt-0">{!! $post->getExcerpt(200) !!}</p>

    <a
        href="/cz/blog/categories/{{ $post->category }}"
        title="Read more - {{ $post->title }}"
        class="mont-400 px-3 pagination"
    >READ</a>
</div>
