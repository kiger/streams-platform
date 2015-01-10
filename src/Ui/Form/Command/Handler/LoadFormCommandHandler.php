<?php namespace Anomaly\Streams\Platform\Ui\Form\Command\Handler;

use Anomaly\Streams\Platform\Ui\Form\Command\LoadFormCommand;

/**
 * Class LoadFormCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Platform\Ui\Form\Command
 */
class LoadFormCommandHandler
{

    /**
     * Handle the command.
     *
     * @param LoadFormCommand $command
     */
    public function handle(LoadFormCommand $command)
    {
        $form = $command->getForm();

        $data = $form->getData();

        $options = $form->getOptions();

        if ($form->getStream()) {
            $options->translatable = $form->getStream()->isTranslatable();
        }

        $data->put('form', $form);
    }
}