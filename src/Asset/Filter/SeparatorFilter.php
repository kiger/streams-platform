<?php

/*
 * This file is part of the Assetic package, an OpenSky project.
 *
 * (c) 2010-2014 OpenSky Project Inc
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Anomaly\Streams\Platform\Asset\Filter;

use Assetic\Asset\AssetInterface;
use Assetic\Filter\FilterInterface;

/**
 * Inserts a separator between assets to prevent merge failures
 * e.g. missing semicolon at the end of a JS file
 *
 * @author Robin McCorkell <rmccorkell@karoshi.org.uk>
 */
class SeparatorFilter implements FilterInterface
{

    /**
     * The separation character.
     *
     * @var string
     */
    private $separator;

    /**
     * Constructor.
     *
     * @param string $separator Separator to use between assets
     */
    public function __construct($separator = ';')
    {
        $this->separator = $separator;
    }

    /**
     * Filters an asset after it has been loaded.
     *
     * @param AssetInterface $asset
     */
    public function filterLoad(AssetInterface $asset)
    {
        //
    }

    /**
     * Filters an asset just before it's dumped.
     *
     * @param AssetInterface $asset
     */
    public function filterDump(AssetInterface $asset)
    {
        if ($content = $asset->getContent()) {
            $asset->setContent($content . $this->separator);
        }
    }
}
