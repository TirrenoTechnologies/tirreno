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

declare(strict_types=1);

namespace Sensor\Model\Enriched;

class PhoneEnriched {
    public function __construct(
        public string $phoneNumber,
        public int $profiles,
        public ?string $countryCode,
        public int $callingCountryCode,
        public string $nationalFormat,
        public bool $invalid,
        public ?string $validationErrors,
        public ?string $carrierName,
        public string $type,
        public ?bool $alertList,
    ) {
    }
}
