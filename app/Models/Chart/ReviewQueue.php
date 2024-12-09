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

class ReviewQueue extends Base {
    use \Traits\DateRange;

    protected $DB_TABLE_NAME = 'event';

    public function getData(int $apiKey): array {
        $data0 = [];
        $data1 = $this->getFirstLine($apiKey);

        for ($i = 0; $i < count($data1); ++$i) {
            $item = $data1[$i];
            $day = $item['day'];
            $reviewed = $item['reviewed'];
            $fraud = $item['fraud'];

            if (!isset($data0[$day])) {
                $data0[$day] = [
                    'day' => $day,

                    'daily_new_users_whitelisted' => 0,
                    'daily_new_users_on_review' => 0,
                    'daily_new_users_blacklisted' => 0,
                ];
            }

            if ($fraud === false && $reviewed) {
                ++$data0[$day]['daily_new_users_whitelisted'];
            } elseif ($fraud === true && $reviewed) {
                ++$data0[$day]['daily_new_users_blacklisted'];
            } else {
                ++$data0[$day]['daily_new_users_on_review'];
            }
        }

        $indexedData = array_values($data0);
        $ox = array_column($indexedData, 'day');
        $l1 = array_column($indexedData, 'daily_new_users_whitelisted');
        $l2 = array_column($indexedData, 'daily_new_users_on_review');
        $l3 = array_column($indexedData, 'daily_new_users_blacklisted');

        return $this->addEmptyDays([$ox, $l1, $l2, $l3]);
    }

    private function getFirstLine(int $apiKey): array {
        $query = (
            "SELECT
                TEXT(date_trunc('day', COALESCE(event_account.latest_decision, event_account.lastseen))::date) AS day,
                event_account.id,
                event_account.reviewed,
                event_account.fraud

            FROM
                event_account

            WHERE
                event_account.key = :api_key
                AND event_account.lastseen >= :start_time
                AND event_account.lastseen <= :end_time

            GROUP BY
                day, event_account.id

            ORDER BY
                day"
        );

        return $this->execute($query, $apiKey, false);
    }
}