<?php

namespace Jonassiewertsen\Documentation\Http\Controllers;

use Jonassiewertsen\Documentation\Helper\Documentation;
use Statamic\Facades\Entry;

class DocumentationController {
    public function show($slug) {
        return view('documentation::cp.show',[
            'documentation' => $this->getEntry($slug),
        ]);
    }

    public function showChild($parent, $slug) {
        return view('documentation::cp.show',[
            'documentation' => $this->getEntry($slug),
        ]);
    }

    private function getEntry($slug) {
        $documentation = Entry::findBySlug($slug, Documentation::collectionName());
        return $documentation->toAugmentedArray(['title', 'content']);
    }
}
