<?php

namespace Jonassiewertsen\Documentation\Http\Controllers;

use Jonassiewertsen\Documentation\Helper\Documentation;
use Statamic\Facades\Entry;
use Statamic\Fieldtypes\Bard;

class DocumentationController {
    public function show($slug) {
        $documentation = Entry::findBySlug($slug, Documentation::collectionName());

        $bard = new Bard();
        $documentation->content = $bard->augment($documentation->content);

        return view('documentation::cp.show', compact('documentation'));
    }

    public function showChild($parent, $slug) {
        $documentation = Entry::findBySlug($slug, Documentation::collectionName());

        return view('documentation::cp.show', compact('documentation'));
    }
}
