<?php namespace Anomaly\Streams\Platform\Ui\Grid\Command;

use Anomaly\Streams\Platform\Ui\Grid\GridBuilder;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class MakeGrid
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Platform\Ui\Grid\Command
 */
class MakeGrid implements SelfHandling
{

    /**
     * The grid builder.
     *
     * @var GridBuilder
     */
    protected $builder;

    /**
     * Create a new MakeGrid instance.
     *
     * @param GridBuilder $builder
     */
    public function __construct(GridBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Handle the command.
     */
    public function handle()
    {
        $grid = $this->builder->getGrid();

        $options = $grid->getOptions();
        $data    = $grid->getData();

        $content = view($options->get('grid_view', 'streams::grid/grid'), $data)->render();

        $grid->setContent($content);
        $grid->addData('content', $content);
    }
}
