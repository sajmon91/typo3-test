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

namespace Int\Inthelper\ViewHelpers;

use Int\Inthelper\Helper\SlackHelper;
use Int\Inthelper\Utility\FileUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use \Datetime;

/**
 * Creates rich tags for various purposes
 */
class RichTagsViewHelper extends AbstractViewHelper
{


    /**
     * Add allowed richtags as lowercase
     * Add value to switch schema org construction in render() method
     *
     * @var array
     */
    protected $allowedRichTagTypes = [
        'event',
        'organization',
        'news',
        'blog',
        'location',
    ];

    protected $contextSchema = 'http://schema.org';


    /**
     * Initialize arguments
     *
     * @return void
     * @api
     *
     */
    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('type', 'string', 'Type of Rich Tag (event, location, organisation)', true);

        // Shared tag arguments
        $this->registerArgument('description', 'string', 'Tag description', false);
        $this->registerArgument('image', 'string', 'Image', false);
        $this->registerArgument('url', 'string', 'Url', false);
        $this->registerArgument('name', 'string', 'Name Event, Blog, News', false);
        $this->registerArgument('headline', 'string', 'Main Blog headline', false);
        $this->registerArgument('about', 'string', 'Short Blog description', false);
        $this->registerArgument('author', 'string', 'Author of Event, Blog, News etc', false);
        $this->registerArgument('address', 'string', 'Address of Location, Organization', false);
        $this->registerArgument('telephone', 'string', 'Telephone of Location or Organization', false);
        $this->registerArgument('logo', 'string', 'Logo', false);

        // Event specific tag arguments
        $this->registerArgument('title', 'string', 'Title', false);
        $this->registerArgument('startDate', 'DateTime', 'Start Date', false);
        $this->registerArgument('endDate', 'DateTime', 'End Date', false);
        $this->registerArgument('eventAttendanceMode', 'string', 'Event Attendance', false);
        $this->registerArgument('eventStatus', 'string', 'Event Status', false);
        $this->registerArgument('offers', 'string', 'Offers', false);
        $this->registerArgument('performer', 'string', 'Performer', false);
        // We need to use locationName, not just name because we have location in more tags (and maybe outer tag have also tag name)
        $this->registerArgument('locationName', 'string', 'Location  Name', false);
        // We need to use locationAddress, not just address because we have location in more tags (and maybe outer tag have also tag address)
        $this->registerArgument('locationAddress', 'string', 'Location Address', false);

        // News specific tag arguments
        // We need to use publisherName  and authorName ( both tags appear in Event and we cannot assign them to just name)
        $this->registerArgument('publisherName', 'string', 'Name of news publisher', false);
        // Every image extension except svg
        $this->registerArgument('publisherLogo', 'string', 'Logo of News publisher', false);
        $this->registerArgument('authorName', 'string', 'Name of author news', false);
        $this->registerArgument('articleBody', 'string', 'Body of News Article', false);
        $this->registerArgument('datePublished', 'DateTime', 'Date when news article is published', false);
        $this->registerArgument('dateModified', 'DateTime', 'Date when news article is modified', false);
        $this->registerArgument('mainEntityOfPage', 'string', 'Main entity of new article page', false);

        // Blog specific tag arguments
        $this->registerArgument('dateCreated', 'DateTime', 'Date when Blog is created', false);
        $this->registerArgument('genre', 'string', 'Blog genre', false);
        $this->registerArgument('isFamilyFriendly', 'boolean', 'Boolean value if Blog is family friendly', false);

        // Location specific tag arguments
        $this->registerArgument('latitude', 'string', 'Location latitude', false);
        $this->registerArgument('longitude', 'string', 'Location longitude', false);

        // Organization specific tag arguments
        $this->registerArgument('email', 'string', 'Organization Email', false);
        $this->registerArgument('socialNetworkLinkedIn', 'string', 'Url of Organization LinkedIn profil', false);
        $this->registerArgument('socialNetworkTwitter', 'string', 'Url of Organization Twitter profil', false);
        $this->registerArgument('socialNetworkFacebook', 'string', 'Url of Organization Facebook profil', false);
        $this->registerArgument('socialNetworkInstagram', 'string', 'Url of Organization Instagram profil', false);
        $this->registerArgument('socialNetworkYoutube', 'string', 'Url of Organization Youtube profil', false);
        $this->registerArgument('socialNetworkXing', 'string', 'Url of Organization Xing profil', false);
    }

    /**
     * Split the link tag
     *
     * @return string
     *
     */
    public function render()
    {
        $returnData = '';

        // We have to validate the type first
        $type = $this->arguments['type'];
        // Validate argument
        // Throws an error if not found
        $this->validateType($type);

        // Global fields
        $name        = $this->arguments['name'] ?: '';
        $description = $this->arguments['description'] ?: '';
        $image       = $this->arguments['image'] ?: '';
        $url         = $this->arguments['url'] ?: '';
        $headline    = $this->arguments['headline'] ?: '';
        $about       = $this->arguments['about'] ?: '';
        $author      = $this->arguments['author'] ?: '';
        $address     = $this->arguments['address'] ?: '';
        $logo        = $this->arguments['logo'] ?: '';
        $telephone   = $this->arguments['telephone'] ?: '';

        // Event specific fields
        $title               = $this->arguments['title'] ?: '';
        $startDate           = $this->arguments['startDate'] ?: null;
        $endDate             = $this->arguments['endDate'] ?: null;
        $locationName        = $this->arguments['locationName'] ?: '';
        $locationAddress     = $this->arguments['locationAddress'] ?: '';
        $eventAttendanceMode = $this->arguments['eventAttendanceMode'] ?: '';
        $eventStatus         = $this->arguments['eventStatus'] ?: '';
        $offers              = $this->arguments['offers'] ?: '';
        $performer           = $this->arguments['performer'] ?: '';

        // News tags arguments
        $publisherName    = $this->arguments['publisherName'] ?: '';
        $publisherLogo    = $this->arguments['publisherLogo'] ?: '';
        $articleBody      = $this->arguments['articleBody'] ?: '';
        $authorName       = $this->arguments['authorName'] ?: '';
        $datePublished    = $this->arguments['datePublished'] ?: null;
        $dateModified     = $this->arguments['dateModified'] ?: null;
        $mainEntityOfPage = $this->arguments['mainEntityOfPage'] ?: '';

        // Blog tags arguments
        $dateCreated      = $this->arguments['dateCreated'] ?: null;
        $genre            = $this->arguments['genre'] ?: '';
        $isFamilyFriendly = $this->arguments['isFamilyFriendly'] ?: '';

        // Location tags arguments
        $latitude  = $this->arguments['latitude'] ?: '';
        $longitude = $this->arguments['longitude'] ?: '';

        // Organization tag arguments
        $email = $this->arguments['email'] ?: '';

        $socialNetworkLinkedIn  = $this->arguments['socialNetworkLinkedIn'] ?: '';
        $socialNetworkTwitter   = $this->arguments['socialNetworkTwitter'] ?: '';
        $socialNetworkFacebook  = $this->arguments['socialNetworkFacebook'] ?: '';
        $socialNetworkInstagram = $this->arguments['socialNetworkInstagram'] ?: '';
        $socialNetworkYoutube   = $this->arguments['socialNetworkYoutube'] ?: '';
        $socialNetworkXing      = $this->arguments['socialNetworkXing'] ?: '';

        switch ($type) {
            case 'event':
                $returnData = $this->createEventFields(
                    $title,
                    $startDate,
                    $endDate,
                    $locationName,
                    $locationAddress,
                    $description,
                    $eventAttendanceMode,
                    $eventStatus,
                    $image,
                    $offers,
                    $performer,
                    $url
                );
                break;
            case 'news':
                $returnData = $this->createNewsFields(
                    $publisherName,
                    $publisherLogo,
                    $headline,
                    $authorName,
                    $image,
                    $url,
                    $datePublished,
                    $articleBody,
                    $dateModified,
                    $mainEntityOfPage
                );
                break;
            case 'blog':
                $returnData = $this->createBlogFields(
                    $name,
                    $headline,
                    $about,
                    $author,
                    $url,
                    $dateCreated,
                    $genre,
                    $isFamilyFriendly,
                    $image
                );
                break;
            case 'organization':
                $returnData = $this->createOrganizationFields(
                    $description,
                    $telephone,
                    $email,
                    $logo,
                    $url,
                    $socialNetworkLinkedIn,
                    $socialNetworkTwitter,
                    $socialNetworkFacebook,
                    $socialNetworkInstagram,
                    $socialNetworkYoutube,
                    $socialNetworkXing
                );
                break;
            case 'location':
                $returnData = $this->createLocationFields(
                    $address,
                    $name,
                    $url,
                    $latitude,
                    $longitude,
                    $telephone,
                    $logo
                );
                break;
            default:
                $this->validateType($this->arguments['type'] . ' missing in switch construction');
                break;
        }

        return '<script type="application/ld+json">' . $returnData . '</script>';

    }

    /**
     * Validates Rich Tag type
     *
     * @param string $type Type of Rich tag
     *
     * @return bool
     */
    private function validateType(string $type): bool
    {
        $isAllowed = in_array($type, $this->allowedRichTagTypes, true);

        if (!$isAllowed) {
            $errorMessage = 'Rich Tag type "' . $type . '" not allowed in RichTagsViewHelper';
            /*
                        SlackHelper::notifySlackChannel(
                            'Rich Tag type not allowed',
                            $errorMessage,
                            [ 'File: ' . __FILE__ . ':' . __LINE__ ],
                            SlackHelper::LOGTYPE_ERROR
                        );
            */
            return false;
        }

        return true;
    }


    /**
     * * Location property for Event type
     *      Required tags:
     *      - locationName
     *      - locationAddress
     *
     * This is location property for Event type (We use createLocationFields for Place schema type)
     *
     * @param string $locationName    Location name
     * @param string $locationAddress Location Address
     *
     * @return array
     */
    private function createLocation($locationName, $locationAddress): array
    {

        $missingFieldsArray = [];

        if (empty($locationName)) {
            $missingFieldsArray[] = 'locationName';
        }
        if (empty($locationAddress)) {
            $missingFieldsArray[] = 'locationAddress';
        }

        // Check for missing fields
        if (count($missingFieldsArray)) {
            $errorMessage = 'Unable to create location tag because of missing tag';
            /*
                        SlackHelper::notifySlackChannel(
                            'Location arguments missing',
                            $errorMessage,
                            [ 'File: ' . __FILE__ . ':' . __LINE__ ],
                            SlackHelper::LOGTYPE_ERROR
                        );
            */
            return [];
        }

        // All needed fields available
        $returnValues            = [];
        $returnValues['name']    = $locationName;
        $returnValues['@type']   = 'Place';
        $returnValues['address'] = $locationAddress;

        return $returnValues;
    }

    /**
     * Event
     *      type: event
     *      Required tags:
     *      - title
     *      - locationName
     *      - locationAddress
     *      - startDate
     *      - endDate
     *      Recommended tags:
     *      - description
     *      - eventAttendanceMode
     *      - eventStatus
     *      - image
     *      - offers
     *      - performer
     *      - url
     *
     * @param string   $title               Location title
     * @param Datetime $startDate           Start date event
     * @param Datetime $endDate             End date event
     * @param string   $locationName        Location Name
     * @param string   $locationAddress     Location Address
     * @param string   $description         Event Description
     * @param string   $eventAttendanceMode Event Attendance Mode
     * @param string   $eventStatus         Event Status
     * @param string   $image               Event Image
     * @param string   $offers              Event Offers
     * @param string   $performer           Event Performer
     * @param string   $url                 Url of Event
     *
     * @return string
     */
    private function createEventFields(
        string $title,
        DateTime $startDate,
        DateTime $endDate,
        string $locationName,
        string $locationAddress,
        $description,
        $eventAttendanceMode,
        $eventStatus,
        $image,
        $offers,
        $performer,
        $url
    ): string {

        $missingFieldsArray = [];

        if (empty($title)) {
            $missingFieldsArray[] = 'title';
        }
        if (empty($locationName)) {
            $missingFieldsArray[] = 'locationName';
        }
        if (empty($locationAddress)) {
            $missingFieldsArray[] = 'locationAddress';
        }
        if (!($startDate instanceof DateTime)) {
            $missingFieldsArray[] = 'startDate';
        }
        if (!($endDate instanceof DateTime)) {
            $missingFieldsArray[] = 'endDate';
        }

        // Check for missing fields
        if (count($missingFieldsArray)) {
            $errorMessage = 'Unable to create Event tag because of missing tag: ' . implode(',', $missingFieldsArray);
            /*
                        SlackHelper::notifySlackChannel(
                            'Event missing arguments',
                            $errorMessage,
                            [ 'File: ' . __FILE__ . ':' . __LINE__ ],
                            SlackHelper::LOGTYPE_ERROR
                        );
            */
            return '';
        }

        $returnDataArray['@context']  = $this->contextSchema;
        $returnDataArray['@type']     = 'Event';
        $returnDataArray['about']     = $title;
        $returnDataArray['location']  = $this->createLocation(
            $locationName,
            $locationAddress
        );
        $returnDataArray['name']      = $title;
        $returnDataArray['startDate'] = $startDate->format('Y-m-d');
        $returnDataArray['endDate']   = $endDate->format('Y-m-d');


        if (!empty($description)) {
            $returnDataArray['description'] = $description;
        }

        if (!empty($eventAttendanceMode)) {
            $returnDataArray['eventAttendanceMode'] = $eventAttendanceMode;
        }

        if (!empty($eventStatus)) {
            $returnDataArray['eventStatus'] = $eventStatus;
        }

        if (!empty($image) && FileUtility::validateAbsoluteFile($image)) {
            $returnDataArray['image'] = $image;
        }

        if (!empty($offers)) {
            $returnDataArray['offers'] = $offers;
        }

        if (!empty($performer)) {
            $returnDataArray['performer'] = $performer;
        }
        if (!empty($url) && GeneralUtility::isValidUrl($url)) {
            $returnDataArray['url'] = $url;
        }

        return json_encode($returnDataArray, JSON_PRETTY_PRINT);
    }

    /**
     * Publisher
     *      Required tags:
     *      - publisherName
     *      - publisherLogo
     *
     * @param string $publisherName Name of publisher News
     * @param string $publisherLogo Logo of News Publisher
     *
     * @return array
     */
    private function createPublisher($publisherName, $publisherLogo): array
    {

        $missingFieldsArray = [];

        if (empty($publisherName)) {
            $missingFieldsArray[] = 'publisherName';
        }
        if (empty($publisherLogo) || !FileUtility::validateAbsoluteFile($publisherLogo)) {
            $missingFieldsArray[] = 'publisherLogo';
        }

        // Check for missing fields
        if (count($missingFieldsArray)) {
            $errorMessage = 'Unable to create publisher news tag because of missing tag: ' . implode(
                    ',',
                    $missingFieldsArray
                );
            /*
                        SlackHelper::notifySlackChannel(
                            'Publisher missing arguments',
                            $errorMessage,
                            [ 'File: ' . __FILE__ . ':' . __LINE__ ],
                            SlackHelper::LOGTYPE_ERROR
                        );
            */
            return [];
        }

        // All needed fields available
        $returnValues          = [];
        $returnValues['@type'] = 'Organization';
        $returnValues['name']  = $publisherName;
        $returnValues['logo']  = [
            '@type' => 'ImageObject',
            'url'   => $publisherLogo,
        ];

        return $returnValues;
    }

    /**
     * Publisher
     *      Required tags:
     *      - authorName
     *
     * @param string $authorName Name of News author
     *
     * @return array
     */
    private function createAuthor($authorName): array
    {

        $missingFieldsArray = [];

        if (empty($authorName)) {
            $missingFieldsArray[] = 'authorName';
        }

        // Check for missing fields
        if (count($missingFieldsArray)) {
            $errorMessage = 'Unable to create author news tag because of missing tag: ' . implode(
                    ',',
                    $missingFieldsArray
                );
            /*
                        SlackHelper::notifySlackChannel(
                            'Author news arguments missing',
                            $errorMessage,
                            [ 'File: ' . __FILE__ . ':' . __LINE__ ],
                            SlackHelper::LOGTYPE_ERROR
                        );
            */
            return [];
        }

        // All needed fields available
        $returnValues          = [];
        $returnValues['@type'] = 'Organization';
        $returnValues['name']  = $authorName;

        return $returnValues;
    }

    /**
     * News
     *      type: news
     *      Required tags:
     *      - publisherName
     *      - headline
     *      - image
     *      - authorName
     *      - url
     *      - publisherLogo
     *      - datePublished
     *      Recommended tags:
     *      - articleBody
     *      - dateModified
     *      - mainEntityOfPage
     *
     * @param string   $publisherName    Name of publisher
     * @param string   $publisherLogo    Logo of publisher
     * @param string   $headline         Main news headline
     * @param string   $authorName       Name of news author
     * @param string   $image            News image
     * @param string   $url              Url of News
     * @param string   $articleBody      Body of News Article
     * @param DateTime $datePublished    Date when news is published
     * @param DateTime $dateModified     Date when news is modified
     * @param string   $mainEntityOfPage Main news Entity
     *
     * @return string
     */
    private function createNewsFields(
        string $publisherName,
        string $publisherLogo,
        string $headline,
        string $authorName,
        string $image,
        string $url,
        DateTime $datePublished,
        $articleBody,
        DateTime $dateModified,
        $mainEntityOfPage

    ): string {
        $missingFieldsArray = [];

        if (empty($publisherName)) {
            $missingFieldsArray[] = 'publisherName';
        }

        if (empty($headline)) {
            $missingFieldsArray[] = 'headline';
        }

        if (empty($image) || !FileUtility::validateAbsoluteFile($image)) {
            $missingFieldsArray[] = 'image';
        }

        if (empty($authorName)) {
            $missingFieldsArray[] = 'authorName';
        }

        if (empty($url) || !GeneralUtility::isValidUrl($url)) {
            $missingFieldsArray[] = 'url';
        }

        if (empty($publisherLogo) || !FileUtility::validateAbsoluteFile($publisherLogo)) {
            $missingFieldsArray[] = 'publisherLogo';
        }

        if (!($datePublished instanceof DateTime)) {
            $missingFieldsArray[] = 'datePublished';
        }

        // Check for missing fields
        if (count($missingFieldsArray)) {
            $errorMessage = 'Unable to create News tag because of missing tag: ' . implode(',', $missingFieldsArray);
            /*
                        SlackHelper::notifySlackChannel(
                            'News missing arguments',
                            $errorMessage,
                            [ 'File: ' . __FILE__ . ':' . __LINE__ ],
                            SlackHelper::LOGTYPE_ERROR
                        );
            */
            return '';
        }

        $returnDataArray['@context']      = $this->contextSchema;
        $returnDataArray['@type']         = 'NewsArticle';
        $returnDataArray['url']           = $url;
        $returnDataArray['headline']      = $headline;
        $returnDataArray['image']         = $image;
        $returnDataArray['datePublished'] = $datePublished->format('Y-m-d');
        $returnDataArray['publisher']     = $this->createPublisher(
            $publisherName,
            $publisherLogo
        );
        $returnDataArray['author']        = $this->createAuthor(
            $authorName
        );


        if ($dateModified instanceof DateTime) {
            $returnDataArray['dateModified'] = $dateModified->format('Y-m-d');
        }

        if (!empty($mainEntityOfPage)) {
            $returnDataArray['mainEntityOfPage'] = $mainEntityOfPage;
        }
        if (!empty($articleBody)) {
            $returnDataArray['articleBody'] = $articleBody;
        }

        return json_encode($returnDataArray, JSON_PRETTY_PRINT);

    }

    /**
     * Blog
     *      type: blog
     *      Required tags:
     *      - name
     *      - headline
     *      - about
     *      - author
     *      - url
     *      Recommended tags:
     *      - genre
     *      - isFamilyFriendly
     *      - image
     *      - dateCreated
     *
     * @param string   $name             Name of Blog
     * @param string   $headline         Main Blog headline
     * @param string   $about            Short Blog description
     * @param Datetime $dateCreated      Date when Blog is created
     * @param string   $genre            Blog genre
     * @param string   $image            Blog image
     * @param string   $url              Blog Url
     * @param string   $authorName       Blog Author
     * @param boolean  $isFamilyFriendly Boolean value is Blog family friendly
     *
     * @return string
     */
    private function createBlogFields(
        string $name,
        string $headline,
        string $about,
        string $authorName,
        string $url,
        DateTime $dateCreated,
        $genre,
        $isFamilyFriendly,
        $image

    ): string {
        $missingFieldsArray = [];

        if (empty($name)) {
            $missingFieldsArray[] = 'name';
        }

        if (empty($headline)) {
            $missingFieldsArray[] = 'headline';
        }

        if (empty($about)) {
            $missingFieldsArray[] = 'about';
        }

        if (empty($authorName)) {
            $missingFieldsArray[] = 'authorName';
        }

        if (empty($url)) {
            $missingFieldsArray[] = 'url';
        }

        // Check for missing fields
        if (count($missingFieldsArray)) {
            $errorMessage = 'Unable to create Blog tag because of missing tag: ' . implode(',', $missingFieldsArray);
            /*
                        SlackHelper::notifySlackChannel(
                            'Blog missing arguments',
                            $errorMessage,
                            [ 'File: ' . __FILE__ . ':' . __LINE__ ],
                            SlackHelper::LOGTYPE_ERROR
                        );
            */
            return '';
        }

        $returnDataArray['@context'] = $this->contextSchema;
        $returnDataArray['@type']    = 'Blog';
        $returnDataArray['url']      = $url;
        $returnDataArray['about']    = $about;
        $returnDataArray['headline'] = $headline;
        $returnDataArray['image']    = $image;
        $returnDataArray['author']   = $this->createAuthor(
            $authorName
        );

        if ($dateCreated instanceof DateTime) {
            $returnDataArray['dateCreated'] = $dateCreated->format('Y-m-d');
        }

        if (!empty($isFamilyFriendly)) {
            $returnDataArray['isFamilyFriendly'] = $isFamilyFriendly;
        }

        if (!empty($genre)) {
            $returnDataArray['genre'] = $genre;
        }

        return json_encode($returnDataArray, JSON_PRETTY_PRINT);

    }


    /**
     *     * Location
     *      type: location
     *      Required tags:
     *      - address
     *      - url
     *      - latitude
     *      - longitude
     *      - name
     *      Recommended tags:
     *      - telephone
     *      - logo
     *
     * @param string $address   Location Address
     * @param string $telephone Location Telephone
     * @param string $name      Location Name
     * @param string $url       Location Url
     * @param string $latitude  Location Latitude
     * @param string $longitude Location Longitude
     * @param string $logo      Location Logo
     *
     * @return string
     */
    private function createLocationFields(
        string $address,
        string $name,
        string $url,
        string $latitude,
        string $longitude,
        $telephone,
        $logo

    ): string {

        $missingFieldsArray = [];

        if (empty($address)) {
            $missingFieldsArray[] = 'address';
        }

        if (empty($url) || !GeneralUtility::isValidUrl($url)) {
            $missingFieldsArray[] = 'url';
        }

        if (empty($latitude)) {
            $missingFieldsArray[] = 'latitude';
        }

        if (empty($longitude)) {
            $missingFieldsArray[] = 'longitude';
        }

        if (empty($name)) {
            $missingFieldsArray[] = 'name';
        }

        // Check for missing fields
        if (count($missingFieldsArray)) {
            $errorMessage = 'Unable to create Location tag because of missing tag: ' . implode(
                    ',',
                    $missingFieldsArray
                );
            /*
                        SlackHelper::notifySlackChannel(
                            'Locations missing arguments',
                            $errorMessage,
                            [ 'File: ' . __FILE__ . ':' . __LINE__ ],
                            SlackHelper::LOGTYPE_ERROR
                        );
            */
            return '';
        }

        $returnDataArray['@context']  = $this->contextSchema;
        $returnDataArray['@type']     = 'Place';
        $returnDataArray['address']   = $address;
        $returnDataArray['url']       = $url;
        $returnDataArray['latitude']  = $latitude;
        $returnDataArray['longitude'] = $longitude;
        $returnDataArray['name']      = $name;


        if (!empty($telephone)) {
            $returnDataArray['telephone'] = $telephone;
        }

        if (!empty($logo) && FileUtility::validateAbsoluteFile($logo)) {
            $returnDataArray['logo'] = $logo;
        }

        return json_encode($returnDataArray, JSON_PRETTY_PRINT);

    }

    /**
     * Organization
     *      type: organization
     *      Required tags:
     *      - description
     *      - telephone
     *      - email
     *      - url
     *      - logo
     *      Recommended tags:
     *      - socialNetworkLinkedIn
     *      - socialNetworkTwitter
     *      - socialNetworkFacebook
     *      - socialNetworkYoutube
     *      - socialNetworkInstagram
     *      - socialNetworkXing
     *
     * @param string $description            Organization description
     * @param string $telephone              Organization telephone
     * @param string $email                  Organization Email
     * @param string $logo                   Organization logo
     * @param string $url                    Url of Organizaton
     * @param string $socialNetworkLinkedIn  LinkedIn link of Organization
     * @param string $socialNetworkTwitter   Twitter link of Organization
     * @param string $socialNetworkFacebook  Facebook link of Organization
     * @param string $socialNetworkInstagram Instagram link of Organization
     * @param string $socialNetworkYoutube   Youtube link of Organization
     * @param string $socialNetworkXing      Xing link of Organization
     *
     * @return string
     */
    private function createOrganizationFields(
        string $description,
        string $telephone,
        string $email,
        string $logo,
        string $url,
        $socialNetworkLinkedIn,
        $socialNetworkTwitter,
        $socialNetworkFacebook,
        $socialNetworkInstagram,
        $socialNetworkYoutube,
        $socialNetworkXing
    ): string {

        $missingFieldsArray = [];

        if (empty($description)) {
            $missingFieldsArray[] = 'description';
        }

        if (empty($telephone)) {
            $missingFieldsArray[] = 'telephone';
        }

        if (empty($email) || !GeneralUtility::validEmail($email)) {
            $missingFieldsArray[] = 'email';
        }

        if (empty($url) || !GeneralUtility::isValidUrl($url)) {
            $missingFieldsArray[] = 'url';
        }

        if (empty($logo) || !FileUtility::validateAbsoluteFile($logo)) {
            $missingFieldsArray[] = 'logo';
        }

        // Check for missing fields
        if (count($missingFieldsArray)) {
            $errorMessage = 'Unable to create Organization tag because of missing tag: ' . implode(
                    ',',
                    $missingFieldsArray
                );
            /*
                        SlackHelper::notifySlackChannel(
                            'Organization missing arguments',
                            $errorMessage,
                            [ 'File: ' . __FILE__ . ':' . __LINE__ ],
                            SlackHelper::LOGTYPE_ERROR
                        );
            */
            return '';
        }

        $returnDataArray['@context']    = $this->contextSchema;
        $returnDataArray['@type']       = 'Organization';
        $returnDataArray['url']         = $url;
        $returnDataArray['description'] = $description;
        $returnDataArray['telephone']   = $telephone;
        $returnDataArray['logo']        = $logo;
        $returnDataArray['email']       = $email;

        $sameAsArray = $this->createSameAsSocialNetworks(
            $socialNetworkLinkedIn,
            $socialNetworkTwitter,
            $socialNetworkFacebook,
            $socialNetworkInstagram,
            $socialNetworkYoutube,
            $socialNetworkXing
        );

        if (count($sameAsArray)) {
            $returnDataArray['sameAs'] = $sameAsArray;
        }


        return json_encode($returnDataArray, JSON_PRETTY_PRINT);

    }

    /**
     * @param string $socialNetworkLinkedIn  LinkedIn link of Organization
     * @param string $socialNetworkTwitter   Twitter link of Organization
     * @param string $socialNetworkFacebook  Facebook link of Organization
     * @param string $socialNetworkInstagram Instagram link of Organization
     * @param string $socialNetworkYoutube   Youtube link of Organization
     * @param string $socialNetworkXing      Xing link of Organization
     *
     * @return array
     */
    private function createSameAsSocialNetworks(
        $socialNetworkLinkedIn = '',
        $socialNetworkTwitter = '',
        $socialNetworkFacebook = '',
        $socialNetworkInstagram = '',
        $socialNetworkYoutube = '',
        $socialNetworkXing = ''
    ): array {

        // All needed fields available
        $returnValues = [];

        if (!empty($socialNetworkYoutube) && GeneralUtility::isValidUrl($socialNetworkYoutube)) {
            $returnValues[] = $socialNetworkYoutube;
        }

        if (!empty($socialNetworkTwitter) && GeneralUtility::isValidUrl($socialNetworkTwitter)) {
            $returnValues[] = $socialNetworkTwitter;
        }

        if (!empty($socialNetworkFacebook) && GeneralUtility::isValidUrl($socialNetworkFacebook)) {
            $returnValues[] = $socialNetworkFacebook;
        }

        if (!empty($socialNetworkInstagram) && GeneralUtility::isValidUrl($socialNetworkInstagram)) {
            $returnValues[] = $socialNetworkInstagram;
        }

        if (!empty($socialNetworkLinkedIn) && GeneralUtility::isValidUrl($socialNetworkLinkedIn)) {
            $returnValues[] = $socialNetworkLinkedIn;
        }

        if (!empty($socialNetworkLinkedIn) && GeneralUtility::isValidUrl($socialNetworkLinkedIn)) {
            $returnValues[] = $socialNetworkLinkedIn;
        }

        if (!empty($socialNetworkXing) && GeneralUtility::isValidUrl($socialNetworkXing)) {
            $returnValues[] = $socialNetworkXing;
        }


        return $returnValues;
    }

}
