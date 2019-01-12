<?php
/**
 * webtrees: online genealogy
 * Copyright (C) 2019 webtrees development team
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
declare(strict_types=1);

namespace Fisharebest\Webtrees\Services;

use Fisharebest\Localization\Locale\LocaleEnUs;
use Fisharebest\Webtrees\TestCase;
use Illuminate\Support\Collection;
use Mockery;

/**
 * Test harness for the class SearchService
 *
 * @covers \Fisharebest\Webtrees\Services\SearchService
 */
class SearchServiceTest extends TestCase
{
    protected static $uses_database = true;

    /**
     * @return void
     */
    public function testSearchesReturnCollections(): void
    {
        $search_service = new SearchService(new LocaleEnUs());
        $tree           = $this->importTree('demo.ged');

        $result = $search_service->searchFamilies([$tree], ['foo']);
        $this->assertInstanceOf(Collection::class, $result);

        $result = $search_service->searchFamilyNames([$tree], ['foo']);
        $this->assertInstanceOf(Collection::class, $result);

        $result = $search_service->searchIndividuals([$tree], ['foo']);
        $this->assertInstanceOf(Collection::class, $result);

        $result = $search_service->searchIndividualNames([$tree], ['foo']);
        $this->assertInstanceOf(Collection::class, $result);

        $result = $search_service->searchMedia([$tree], ['foo']);
        $this->assertInstanceOf(Collection::class, $result);

        $result = $search_service->searchNotes([$tree], ['foo']);
        $this->assertInstanceOf(Collection::class, $result);

        $result = $search_service->searchRepositories([$tree], ['foo']);
        $this->assertInstanceOf(Collection::class, $result);

        $result = $search_service->searchSourcesByName([$tree], ['foo']);
        $this->assertInstanceOf(Collection::class, $result);

        $result = $search_service->searchSubmitters([$tree], ['foo']);
        $this->assertInstanceOf(Collection::class, $result);

        $result = $search_service->searchPlaces($tree, 'foo');
        $this->assertInstanceOf(Collection::class, $result);
    }
}