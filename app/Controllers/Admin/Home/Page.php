<?php

/**
 * Tirreno ~ Open source user analytics
 * Copyright (c) Tirreno Technologies Sàrl (https://www.tirreno.com)
 *
 * Licensed under GNU Affero General Public License version 3 of the or any later version.
 * For full copyright and license information, please see the LICENSE
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Tirreno Technologies Sàrl (https://www.tirreno.com)
 * @license       https://opensource.org/licenses/AGPL-3.0 AGPL License
 * @link          https://www.tirreno.com Tirreno(tm)
 */

namespace Controllers\Admin\Home;

class Page extends \Controllers\Pages\Base {
    use \Traits\Filter;

    public $page = 'AdminHome';

    public function getPageParams(): array {
        [$startDate, $endDate] = $this->getFilter();

        $pageParams = [
            'FILTER_START_DATE' => $startDate,
            'FILTER_END_DATE' => $endDate,
            'LOAD_DATATABLE' => true,
            'LOAD_AUTOCOMPLETE' => true,
            'HTML_FILE' => 'admin/home.html',
            'JS' => 'admin_dashboard.js',
        ];

        return parent::applyPageParams($pageParams);
    }
}