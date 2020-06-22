<?php

namespace Jonassiewertsen\Documentation\Commands;

use Illuminate\Console\Command;
use Jonassiewertsen\Documentation\Helper\Documentation;
use Statamic\Facades\Collection;
use Statamic\Fields\Blueprint;
use Statamic\Structures\CollectionStructure;

class Setup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'documentation:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup Collections for the Documentation addon';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->createCollections();
        $this->createBlueprints();
        // TODO: vendor:publish the css file

        $this->info('Everything has been setup for you. Cheers!');
    }

    private function createBlueprints()
    {
        (new Blueprint)
            ->setHandle(Documentation::blueprintName())
            ->setContents([
                'title'    => 'Documentation',
                'sections' => [
                    'main'    => [
                        'fields' => [
                            ['handle' => 'content', 'field' => [
                                'buttons' => [
                                    'h2',
                                    'h3',
                                    'bold',
                                    'italic',
                                    'underline',
                                    'unorderedlist',
                                    'orderedlist',
                                    'quote',
                                    'anchor',
                                    'image',
                                    'table',
                                    'removeformat',
                                ],
                                'save_html'       => false,
                                'toolbar_mode'    => 'fixed',
                                'link_noopener'   => false,
                                'link_noreferrer' => false,
                                'target_blank'    => false,
                                'reading_time'    => false,
                                'fullscreen'      => true,
                                'allow_source'    => true,
                                'type'            => 'bard',
                                'localizable'     => false,
                                'listable'        => 'hidden',
                                'display'         => 'Content',
                            ]],
                        ],
                    ],
                    'sidebar' => [
                        'fields' => [
                            ['handle' => 'slug', 'field' => [
                                'type'        => 'slug',
                                'localizable' => false,
                                'listable'    => 'hidden',
                                'display'     => 'Slug',
                                'validate'    => 'required',
                            ]],
                        ],
                    ],
                ],
            ])->save();

    }

    private function createCollections()
    {
        Collection::make(Documentation::collectionName())
            ->entryBlueprints(Documentation::collectionName())
            ->title('Documentation')
            ->structure((new CollectionStructure)->maxDepth(2))
            ->save();
    }
}
