<div class="flex flex-col mb-4">
    <p class="mont-600 my-1">
        {{ $post->getDate()->format('F j, Y') }}
    </p>

    <h2>
        <a
            href="{{ $post->getUrl() }}"
            title="Read more - {{ $post->title }}"
            class="mont-600 active blog-title d-inline-block position-relative"
        >{{ $post->title }}</a>
    </h2>

    <p class="mb-4 mt-0">{!! $post->getExcerpt(200) !!}</p>

    <a
        href="{{ $post->getUrl() }}"
        title="Read more - {{ $post->title }}"
        class="mont-400 px-3 pagination"
    >READ</a>
    
    @if ($post->categories && $post->categories != []) | Category:
        @foreach ($post->categories as $i => $category)
	<a href="{{ '/cz/blog/categories/' . $category }}"
           title="View posts in {{ $category }}" class="d-inline-block mont-600 pagination border-0 px-2">{{ ucfirst($category) }}</a>
        @endforeach
    @endif
</div>
