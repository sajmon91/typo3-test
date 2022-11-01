<?php
declare(strict_types=1);

return [
    // Add own mappings here if needed


    // ------------------------------------------------------------------------------------------
    // DO NOT CHANGE BELOW THIS LINE

    Int\Intbuilder\Domain\Model\Pages::class   => [
        'tableName' => 'pages',
    ],
    Int\Intbuilder\Domain\Model\Content::class => [
        'tableName' => 'tt_content',
    ],
    Int\Intbuilder\Domain\Model\PagesNav::class => [
        'tableName' => 'pages',
    ],
    Int\Intbuilder\Domain\Model\RootPage::class => [
        'tableName' => 'pages',
    ],
    Int\Intbuilder\Domain\Model\FrontendUser::class => [
        'tableName' => 'fe_users',
    ],
    Int\Intbuilder\Domain\Model\Irre\HeroSlider::class => [
        'tableName' => 'tx_intbuilder_domain_model_irre_heroslider',
    ],
    Int\Intbuilder\Domain\Model\Irre\TeaserBox::class => [
        'tableName' => 'tx_intbuilder_domain_model_irre_teaserbox',
    ],
    Int\Intbuilder\Domain\Model\Irre\TeaserBoxIcon::class => [
        'tableName' => 'tx_intbuilder_domain_model_irre_teaserboxicon',
    ],
    Int\Intbuilder\Domain\Model\Irre\TeaserBoxImage::class => [
        'tableName' => 'tx_intbuilder_domain_model_irre_teaserboximage',
    ],
    Int\Intbuilder\Domain\Model\FileReference::class => [
        'tableName' => 'sys_file_reference',
    ]
];