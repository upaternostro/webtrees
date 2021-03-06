<?php

namespace Fisharebest\Localization\Locale;

use Fisharebest\Localization\Territory\TerritoryCg;

/**
 * Class LocaleLnCg
 *
 * @author    Greg Roach <fisharebest@gmail.com>
 * @copyright (c) 2019 Greg Roach
 * @license   GPLv3+
 */
class LocaleLnCg extends LocaleLn
{
    public function territory()
    {
        return new TerritoryCg();
    }
}
