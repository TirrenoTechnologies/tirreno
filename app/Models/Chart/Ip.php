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

namespace Models\Chart;

class Ip extends \Models\BaseSql {
    use \Traits\DateRange;

    protected $DB_TABLE_NAME = 'event';

    public function getData(int $apiKey): array {
        $request = $this->f3->get('REQUEST');
        $ipId = $request['id'];

        $dateRange = $this->getLatest180DatesRange();

        $params = [
            ':api_key' => $apiKey,
            ':ip_id' => $ipId,
            ':end_time' => $dateRange['endDate'],
            ':start_time' => $dateRange['startDate'],
        ];

        $query = (
            "SELECT
                TEXT(date_trunc('day', event.time)) AS day,
                COUNT(event.id) AS event_count

            FROM
                event

            WHERE
                event.key = :api_key
                AND event.time >= :start_time
                AND event.time <= :end_time
                AND event.ip = :ip_id

            GROUP BY
                day

            ORDER BY
                day"
        );

        return $this->execQuery($query, $params);
    }
}