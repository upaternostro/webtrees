<?php

/**
 * webtrees: online genealogy
 * Copyright (C) 2021 webtrees development team
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace Fisharebest\Webtrees\GedcomElements;

use Fisharebest\Webtrees\Tree;

/**
 * SOUR:DATA is an empty element with children; EVEN, AGNC and NOTE.
 */
class SourceData extends AbstractElement
{
    protected const SUBTAGS = [
        'DATE' => '0:1',
        'TEXT' => '0:M',
    ];

    protected const ABRIDGED_SUBTAGS = [
        'TEXT' => '0:M',
    ];

    /**
     * @param Tree $tree
     *
     * @return array<string,string>
     */
    public function subtags(Tree $tree): array
    {
        if ($tree->getPreference('FULL_SOURCES') === '1') {
            return static::SUBTAGS;
        }

        return static::ABRIDGED_SUBTAGS;
    }
}
