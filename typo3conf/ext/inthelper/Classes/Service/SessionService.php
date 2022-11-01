<?php
declare(strict_types=1);

namespace Int\Inthelper\Service;


/***
 *
 * This file is part of the "Intcheckout" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 Saša Stojanović <stojanovic@intention.rs>, Intention Digital
 *
 ***/

/**
 * Session class
 *
 * @package i_shop
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 *
 */
class SessionService
{

    /**
     * Returns the object stored in the user´s PHP session
     *
     * @param      $key
     *
     * @return array|bool|float|int|object|string|null the stored object
     * @throws \JsonException
     */
    public static function restoreFromSession($key)
    {
        if (!$GLOBALS['TSFE']->fe_user) {
            return null;
        }
        $sessionData = $GLOBALS['TSFE']->fe_user->getKey(
            'ses',
            $key
        );
        if (!$sessionData) {
            return null;
        }
        return json_decode($sessionData, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * Writes an object into the PHP session
     *
     * @param mixed  $value any serializable object to store into the session
     * @param string $key
     *
     * @return void this
     * @throws \JsonException
     */
    public static function writeToSession($value, string $key): void
    {
        if (!$GLOBALS['TSFE']->fe_user) {
            return;
        }
        $GLOBALS['TSFE']->fe_user->setKey(
            'ses',
            $key,
            json_encode($value, JSON_THROW_ON_ERROR)
        );
        $GLOBALS['TSFE']->fe_user->storeSessionData();
    }

    /**
     * Cleans up the session: removes the stored object from the PHP session
     *
     * @param $key
     *
     * @return void this
     */
    public static function cleanUpSession($key): void
    {
        if (!$GLOBALS['TSFE']->fe_user) {
            return;
        }
        $GLOBALS['TSFE']->fe_user->setKey(
            'ses',
            $key,
            null
        );
        $GLOBALS['TSFE']->fe_user->storeSessionData();
    }

}