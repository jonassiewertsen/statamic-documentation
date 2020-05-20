<?php

namespace Jonassiewertsen\Documentation\Http\Controllers;

use Jonassiewertsen\Documentation\Helper\Documentation;
use Statamic\Facades\Entry;
use Statamic\Fieldtypes\Bard;

class DocumentationController {
    public function show($slug) {
        $documentation = Entry::findBySlug($slug, Documentation::collectionName());

        $documentation->content = (new Bard())->augment($documentation->content);

        $documentation->content = str_replace(
            '<table',
            '<div class="tableWrapper"><table',
            $documentation->content
        );

        $documentation->content = str_replace(
            'table>',
            'table></div>',
            $documentation->content
        );

        return view('documentation::cp.show', compact('documentation'));
    }

    public function showChild($parent, $slug) {
        $documentation = Entry::findBySlug($slug, Documentation::collectionName());

        return view('documentation::cp.show', compact('documentation'));
    }
}
