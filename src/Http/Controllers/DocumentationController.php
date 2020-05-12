<?php

namespace Jonassiewertsen\Documentation\Http\Controllers;

use Jonassiewertsen\Documentation\Helper\Documentation;
use Statamic\Facades\Entry;

class DocumentationController {
    public function show($slug) {
        $documentation = Entry::findBySlug($slug, Documentation::collectionName());

        return view('howToAddon::documentation.show', compact('documentation'));
    }

    public function showChild($parent, $slug) {
        $documentation = Entry::findBySlug($slug, Documentation::collectionName());

        return view('howToAddon::documentation.show', compact('documentation'));
    }
}
