<?php
/**
 *
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

declare(strict_types=1);

namespace Int\Intbuilder\Domain\Repository;

use Int\Intbuilder\Domain\Model\FileReference;
use Int\Inthelper\Domain\Repository\AbstractRepository;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapper;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * The repository for file reference records
 */
class FileReferenceRepository extends AbstractRepository
{
    /**
     * @param string $fieldname
     * @param string $tablenames
     * @param int    $uid_foreign
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\DBAL\Driver\Exception
     */
    public static function getTranslatedFileReferenceForPage(
        string $fieldname,
        string $tablenames,
        int $uid_foreign
    ): ObjectStorage {
        $queryBuilder  = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable(
            'sys_file_reference'
        );
        $fileReference = $queryBuilder
            ->select('*')
            ->from('sys_file_reference')
            ->andWhere(
                $queryBuilder->expr()->eq('fieldname', $queryBuilder->createNamedParameter($fieldname)),
                $queryBuilder->expr()->eq('tablenames', $queryBuilder->createNamedParameter($tablenames)),
                $queryBuilder->expr()->eq('uid_foreign', $queryBuilder->createNamedParameter($uid_foreign)),
            )
            ->orderBy('sorting_foreign')
            ->execute()
            ->fetchAllAssociative();

        $mapResults = GeneralUtility::makeInstance(DataMapper::class)->map(FileReference::class, $fileReference);

        $returnValue = new ObjectStorage();
        foreach ($mapResults as $singleObject) {
            $returnValue->attach($singleObject);
        }
        return $returnValue;
    }
}
