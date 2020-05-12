<?php

namespace Jonassiewertsen\Statamic\HowTo\Commands;

use Illuminate\Console\Command;
use Jonassiewertsen\Statamic\HowTo\Helper\Documentation;
use Jonassiewertsen\Statamic\HowTo\Helper\Video;
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

        $this->info('Everything has been setup for you. Cheers!');
    }

    private function createBlueprints()
    {
        (new Blueprint)
            ->setHandle(Documentation::blueprintName())
            ->setContents([
                'title'    => 'How to documentation',
                'sections' => [
                    'main'    => [
                        'fields' => [
                            ['handle' => 'content', 'field' => [
                                'restrict'              => false,
                                'automatic_line_breaks' => true,
                                'automatic_links'       => false,
                                'escape_markup'         => false,
                                'smartypants'           => false,
                                'type'                  => 'markdown',
                                'localizable'           => false,
                                'listable'              => 'hidden',
                                'display'               => 'Content',
                                'validate'              => 'required',
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
            ->title('How to documentation')
            ->structure((new CollectionStructure)->maxDepth(2))
            ->save();
    }
}
