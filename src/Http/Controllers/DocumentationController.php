<?php

namespace Jonassiewertsen\Documentation\Http\Controllers;

use Jonassiewertsen\Documentation\Helper\Documentation;
use Statamic\Facades\Entry;

class DocumentationController {
    public function show($slug) {
        $documentation = Entry::findBySlug($slug, Documentation::collectionName());

        return view('documentation::cp.show',[
            'documentation' => $documentation->toAugmentedArray(['title', 'content'])
        ]);
    }

    public function showChild($parent, $slug) {
        $documentation = Entry::findBySlug($slug, Documentation::collectionName());

        return view('documentation::cp.show', compact('documentation'));
    }
}
