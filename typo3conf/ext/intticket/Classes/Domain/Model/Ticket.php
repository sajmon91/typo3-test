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
 * Ticket
 */
class Ticket extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * subject
     *
     * @var string
     */
    protected $subject = '';

    /**
     * body
     *
     * @var string
     */
    protected $body = '';

    /**
     * notes
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intticket\Domain\Model\Note>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $notes = null;

    /**
     * __construct
     */
    public function __construct()
    {

        // Do not remove the next line: It would break the functionality
        $this->initializeObject();
    }

    /**
     * Initializes all ObjectStorage properties when model is reconstructed from DB (where __construct is not called)
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    public function initializeObject()
    {
        $this->notes = $this->notes ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the subject
     *
     * @return string $subject
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Sets the subject
     *
     * @param string $subject
     * @return void
     */
    public function setSubject(string $subject)
    {
        $this->subject = $subject;
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

    /**
     * Adds a Note
     *
     * @param \Int\Intticket\Domain\Model\Note $note
     * @return void
     */
    public function addNote(\Int\Intticket\Domain\Model\Note $note)
    {
        $this->notes->attach($note);
    }

    /**
     * Removes a Note
     *
     * @param \Int\Intticket\Domain\Model\Note $noteToRemove The Note to be removed
     * @return void
     */
    public function removeNote(\Int\Intticket\Domain\Model\Note $noteToRemove)
    {
        $this->notes->detach($noteToRemove);
    }

    /**
     * Returns the notes
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intticket\Domain\Model\Note> $notes
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Sets the notes
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intticket\Domain\Model\Note> $notes
     * @return void
     */
    public function setNotes(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $notes)
    {
        $this->notes = $notes;
    }
}
