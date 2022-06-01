<?php

use Illuminate\Support\Str;

return [
    'baseUrl' => '/',
    'production' => true,
    'siteName' => 'DevConf.CZ Blog',
    'siteAuthor' => 'Josef Ridky <jridky@redhat.com>',

    // collections
    'collections' => [
        'posts' => [
            'author' => 'DevConf.CZ Team', // Default author, if not provided in a post
            'sort' => '-date',
            'published' => true,
            'path' => '/cz/blog/{filename}',
            'filter' => function ($item) {
                return $item->published;
            }
        ],
        'categories' => [
            'path' => '/cz/blog/categories/{filename}',
            'sort' => '-date',
//            'posts' => function ($page, $allPosts, $category) {
//                return $allPosts->filter(function ($post) use ($category) {
//                    return collect($post->categories)->contains($category);
//                    return $post->categories ? in_array($category, $post->categories, true) : false;
//                });
//            },
        ],
    ],

    // helpers
    'getPostsForCategory' => function ($page, $articles, $category) {
        return $articles->filter(function ($article) use ($category) {
            return collect(($article->categories ? $article->categories : [] ))->contains($category);
        });
    },
    'getDate' => function ($page) {
        return Datetime::createFromFormat('U', $page->date);
    },
    'getExcerpt' => function ($page, $length = 255) {
        if ($page->excerpt) {
            return $page->excerpt;
        }

        $content = preg_split('/<!-- more -->/m', $page->getContent(), 2);
        $cleaned = trim(
            strip_tags(
                preg_replace(['/<pre>[\w\W]*?<\/pre>/', '/<h\d>[\w\W]*?<\/h\d>/'], '', $content[0]),
                '<code>'
            )
        );

        if (count($content) > 1) {
            return $cleaned;
        }

        $truncated = substr($cleaned, 0, $length);

        if (substr_count($truncated, '<code>') > substr_count($truncated, '</code>')) {
            $truncated .= '</code>';
        }

        return strlen($cleaned) > $length
            ? preg_replace('/\s+?(\S+)?$/', '', $truncated) . '...'
            : $cleaned;
    },
    'isActive' => function ($page, $path) {
        return Str::endsWith(trimPath($page->getPath()), trimPath($path));
    },
];
