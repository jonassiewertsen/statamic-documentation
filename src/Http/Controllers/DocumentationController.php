<?php

namespace Jonassiewertsen\Documentation\Http\Controllers;

use Jonassiewertsen\Documentation\Helper\Documentation;
use Statamic\Facades\Entry;

class DocumentationController {
    /**
     * Our Controller for to show parent entries
     */
    public function show($slug) {
        return view('documentation::cp.show',[
            'documentation' => $this->getEntry($slug),
        ]);
    }

    /**
     * Our Controller for to show child entries
     */
    public function showChild($parent, $slug) {
        return view('documentation::cp.show',[
            'documentation' => $this->getEntry($slug),
        ]);
    }

    /**
     * Fetching an entry by slug
     */
    private function getEntry($slug) {
        $documentation = Entry::query()->where('slug', $slug)->where('collection', Documentation::collectionName())->first();
        return $documentation->toAugmentedArray(['title', 'content']);
    }
}
