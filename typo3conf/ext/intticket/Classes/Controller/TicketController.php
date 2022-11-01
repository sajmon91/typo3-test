<?php

declare(strict_types=1);

namespace Int\Intticket\Controller;

use PhpImap\Mailbox;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/***
 *
 * This file is part of the "Intticket" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2021 Intention Digital
 *
 ***/

/**
 * TicketController
 */
class TicketController extends ActionController
{

    /**
     * ticketRepository
     *
     * @var \Int\Intticket\Domain\Repository\TicketRepository
     */
    protected $ticketRepository = null;

    /**
     * @param \Int\Intticket\Domain\Repository\TicketRepository $ticketRepository
     */
    public function injectTicketRepository(\Int\Intticket\Domain\Repository\TicketRepository $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $tickets = $this->ticketRepository->findAll();
        $this->view->assign('tickets', $tickets);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \Int\Intticket\Domain\Model\Ticket $ticket
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\Int\Intticket\Domain\Model\Ticket $ticket): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('ticket', $ticket);
        return $this->htmlResponse();
    }

    /**
     * action new
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function newAction(): \Psr\Http\Message\ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * action create
     *
     * @param \Int\Intticket\Domain\Model\Ticket $newTicket
     */
    public function createAction(\Int\Intticket\Domain\Model\Ticket $newTicket)
    {
        $this->addFlashMessage(
            'The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html',
            '',
            \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING
        );
        $this->ticketRepository->add($newTicket);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Int\Intticket\Domain\Model\Ticket $ticket
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("ticket")
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function editAction(\Int\Intticket\Domain\Model\Ticket $ticket): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('ticket', $ticket);
        return $this->htmlResponse();
    }

    /**
     * action update
     *
     * @param \Int\Intticket\Domain\Model\Ticket $ticket
     */
    public function updateAction(\Int\Intticket\Domain\Model\Ticket $ticket)
    {
        $this->addFlashMessage(
            'The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html',
            '',
            \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING
        );
        $this->ticketRepository->update($ticket);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Int\Intticket\Domain\Model\Ticket $ticket
     */
    public function deleteAction(\Int\Intticket\Domain\Model\Ticket $ticket)
    {
        $this->addFlashMessage(
            'The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html',
            '',
            \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING
        );
        $this->ticketRepository->remove($ticket);
        $this->redirect('list');
    }

    /**
     * action readMails
     *
     */
    public function readMailsAction()
    {

        echo '<pre>';

        $mailbox = new Mailbox(
            '{w00f64ef.kasserver.com:993/imap/ssl}INBOX', // IMAP server and mailbox folder
            'm04c3efa', // Username for the before configured mailbox
            '9WcADYZXvaZDTzoQ', // Password for the before configured username
            __DIR__, // Directory, where attachments will be saved (optional)
            'UTF-8', // Server encoding (optional)
            true, // Trim leading/ending whitespaces of IMAP path (optional)
            false // Attachment filename mode (optional; false = random filename; true = original filename)
        );

        try {
            // Get all emails (messages)
            // PHP.net imap_search criteria: http://php.net/manual/en/function.imap-search.php
            $mailsIds = $mailbox->searchMailbox('ALL');
        } catch (\PhpImap\Exceptions\ConnectionException $ex) {
            echo "IMAP connection failed: " . implode(",", $ex->getErrors('all'));
            die();
        }

        // If $mailsIds is empty, no emails could be found
        if (!$mailsIds) {
            die('Mailbox is empty');
        }

        // Get the first message
        // If '__DIR__' was defined in the first line, it will automatically
        // save all attachments to the specified directory
        $count = count($mailsIds);
        for ($i = 0; $i < 10; $i++) {
            $mail = $mailbox->getMail($mailsIds[$i]);

            // Print all information of $mail
            DebuggerUtility::var_dump($mail);
            echo $mail->textHtml;
        }

    }

    public function flattenParts($messageParts, $flattenedParts = [], $prefix = '', $index = 1, $fullPrefix = true)
    {

        foreach ($messageParts as $part) {
            $flattenedParts[$prefix . $index] = $part;
            if (isset($part->parts)) {
                if ($part->type == 2) {
                    $flattenedParts = $this->flattenParts(
                        $part->parts,
                        $flattenedParts,
                        $prefix . $index . '.',
                        0,
                        false
                    );
                } else {
                    if ($fullPrefix) {
                        $flattenedParts = $this->flattenParts($part->parts, $flattenedParts, $prefix . $index . '.');
                    } else {
                        $flattenedParts = $this->flattenParts($part->parts, $flattenedParts, $prefix);
                    }
                }
                unset($flattenedParts[$prefix . $index]->parts);
            }
            $index++;
        }

        return $flattenedParts;

    }

    function getPart($connection, $messageNumber, $partNumber, $encoding)
    {

        $data = imap_fetchbody($connection, $messageNumber, (string)$partNumber);
        if (!$data) {
            return '';
        }
        switch ($encoding) {
            case 0:
                return $data; // 7BIT
            case 1:
                return $data; // 8BIT
            case 2:
                return $data; // BINARY
            case 3:
                return base64_decode($data); // BASE64
            case 4:
                return quoted_printable_decode($data); // QUOTED_PRINTABLE
            case 5:
                return $data; // OTHER
        }


    }

    function getFilenameFromPart($part)
    {

        $filename = '';

        if ($part->ifdparameters) {
            foreach ($part->dparameters as $object) {
                if (strtolower($object->attribute) === 'filename') {
                    $filename = $object->value;
                }
            }
        }

        if (!$filename && $part->ifparameters) {
            foreach ($part->parameters as $object) {
                if (strtolower($object->attribute) === 'name') {
                    $filename = $object->value;
                }
            }
        }

        return $filename;

    }
}
