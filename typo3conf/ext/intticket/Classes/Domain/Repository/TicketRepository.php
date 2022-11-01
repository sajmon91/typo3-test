<?php

declare(strict_types=1);

namespace Int\Intticket\Domain\Repository;


/**
 * This file is part of the "intticket" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Saša Stojanović <stojanovic@intention.rs>, Intention Digital
 */

/**
 * The repository for Tickets
 */
class TicketRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * @var array
     */
    protected $defaultOrderings = ['sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING];
}
