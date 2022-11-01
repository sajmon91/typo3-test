<?php

declare(strict_types=1);

namespace Int\Intticket\Domain\Model;


/**
 * This file is part of the "intticket" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Saša Stojanović <stojanovic@intention.rs>, Intention Digital
 */

/**
 * Note
 */
class Note extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * sender
     *
     * @var string
     */
    protected $sender = '';

    /**
     * receivers
     *
     * @var string
     */
    protected $receivers = '';

    /**
     * body
     *
     * @var string
     */
    protected $body = '';

    /**
     * Returns the sender
     *
     * @return string $sender
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Sets the sender
     *
     * @param string $sender
     * @return void
     */
    public function setSender(string $sender)
    {
        $this->sender = $sender;
    }

    /**
     * Returns the receivers
     *
     * @return string $receivers
     */
    public function getReceivers()
    {
        return $this->receivers;
    }

    /**
     * Sets the receivers
     *
     * @param string $receivers
     * @return void
     */
    public function setReceivers(string $receivers)
    {
        $this->receivers = $receivers;
    }

    /**
     * Returns the body
     *
     * @return string $body
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Sets the body
     *
     * @param string $body
     * @return void
     */
    public function setBody(string $body)
    {
        $this->body = $body;
    }
}
