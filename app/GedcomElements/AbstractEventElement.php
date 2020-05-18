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

use Fisharebest\Webtrees\I18N;
use Fisharebest\Webtrees\Tree;

use function e;

/**
 * Events which can take "Y" to indicate that they occurred, but date/place are unknown.
 */
class AbstractEventElement extends AbstractElement
{
    /**
     * Create a default value for this element.
     *
     * @param Tree $tree
     *
     * @return string
     */
    public function default(Tree $tree): string
    {
        return 'Y';
    }

    /**
     * An edit control for this data.
     *
     * @param string $id
     * @param string $name
     * @param string $value
     * @param Tree   $tree
     *
     * @return string
     */
    public function edit(string $id, string $name, string $value, Tree $tree): string
    {
        return
            '<div class="form-check">' .
            $this->editHidden($id, $name, $value ? 'Y' : '') .
            '<input class="form-check-input" type="checkbox" value="Y" id="' . e($id) . '-check" ' . ($value ? 'checked' : '') . '>' .
            '<label class="form-check-label" for="' . e($id) . '-check">' .
            I18N::translate('This event occurred, but the details are unknown.') .
            '</label>' .
            '</div>' .
            '<script>' .
            'document.getElementById("' . e($id) . '-check").addEventListener("change", function () {' .
            'document.getElementById("' . e($id) . '").value = this.checked ? "Y" : "";' .
            '})' .
            '</script>';
    }
}
