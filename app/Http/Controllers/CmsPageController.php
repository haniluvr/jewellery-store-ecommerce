<?php

namespace App\Http\Controllers;

use App\Models\CmsPage;

class CmsPageController extends Controller
{
    /**
     * Display the specified CMS page.
     */
    public function show(string $slug)
    {
        $page = CmsPage::published()
            ->where('slug', $slug)
            ->first();

        if (! $page) {
            abort(404);
        }

        $relatedArticles = collect();
        $currentCategory = $page->category ?: 'Latest';

        if ($page->type === 'news') {
            $relatedArticles = CmsPage::published()
                ->where('type', 'news')
                ->where('id', '!=', $page->id)
                ->where(function ($query) use ($page) {
                    if ($page->category) {
                        $query->where('category', $page->category);
                    }
                })
                ->limit(3)
                ->get();

            if ($relatedArticles->count() < 3) {
                $moreArticles = CmsPage::published()
                    ->where('type', 'news')
                    ->where('id', '!=', $page->id)
                    ->whereNotIn('id', $relatedArticles->pluck('id'))
                    ->limit(3 - $relatedArticles->count())
                    ->get();
                $relatedArticles = $relatedArticles->concat($moreArticles);
            }
        }

        return view('cms.show', compact('page', 'relatedArticles', 'currentCategory'));
    }
}
