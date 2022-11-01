<?php

declare(strict_types=1);

namespace Int\Intitems\Controller;


use Int\Intitems\Domain\Model\Item;
use Int\Intitems\Domain\Repository\ItemRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * This file is part of the "intitems" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2021 Saša Stojanović <stojanovic@intention.rs>, Intention Digital
 */

/**
 * ItemController
 */
class ItemController extends ActionController
{

    /**
     * itemRepository
     *
     * @var \Int\Intitems\Domain\Repository\ItemRepository|null
     */
    protected ?ItemRepository $itemRepository = null;

    /**
     * @param \Int\Intitems\Domain\Repository\ItemRepository $itemRepository
     */
    public function injectItemRepository(ItemRepository $itemRepository): void
    {
        $this->itemRepository = $itemRepository;
    }

    /**
     * action list
     *
     * @return void
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
     */
    public function listAction(): void
    {
        if ($this->settings['categories'] && !empty($this->settings['categories'])) {
            $items = $this->itemRepository->findByCategoryCsv($this->settings['categories']);
        } else {
            $items = $this->itemRepository->findAll();
        }
        $this->view->assign('items', $items);
    }

    /**
     * action show
     *
     * @param \Int\Intitems\Domain\Model\Item $item
     *
     * @return void
     */
    public function showAction(Item $item): void
    {
        $this->view->assign('item', $item);
    }
}
