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

class Events extends Base {
    protected $DB_TABLE_NAME = 'event';

    public function getData(int $apiKey): array {
        $data = $this->getFirstLine($apiKey);

        $ox = array_column($data, 'day');
        $l1 = array_column($data, 'event_count');

        return $this->addEmptyDays([$ox, $l1]);
    }

    private function getFirstLine(int $apiKey): array {
        $query = (
            "SELECT
                TEXT(date_trunc('day', event.time)::date) AS day,
                COUNT(event.id) AS event_count

            FROM
                event

            WHERE
                event.key = :api_key
                AND event.time >= :start_time
                AND event.time <= :end_time

            GROUP BY
                day

            ORDER BY
                day;"
        );

        return $this->execute($query, $apiKey);
    }
}