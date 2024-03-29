<?php

declare(strict_types=1);

namespace Sajmon\Test\Controller;

use TYPO3\CMS\Core\Utility\DebugUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;

use TYPO3\CMS\Core\Messaging\FlashMessage;
use TYPO3\CMS\Core\Utility\GeneralUtility;

use Symfony\Component\Mime\Address;
use TYPO3\CMS\Core\Mail\MailMessage;



/**
 * NewsController
 */
class ContactController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{


    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {   
     
        return $this->htmlResponse();
    }

    public function contactAction()
    {   
        $name = trim(filter_var(GeneralUtility::_POST('name'), FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $email = trim(filter_var(GeneralUtility::_POST('email'), FILTER_SANITIZE_EMAIL));
        $phone = trim(filter_var(GeneralUtility::_POST('phone'), FILTER_SANITIZE_NUMBER_INT));
        $msg = trim(filter_var(GeneralUtility::_POST('msg'), FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $country = trim(filter_var(GeneralUtility::_POST('country'), FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $languages = GeneralUtility::_POST('languages');

        if($languages){
            $languages = array_map(function($el){
                return trim(filter_var($el, FILTER_SANITIZE_FULL_SPECIAL_CHARS));;
            }, $languages);
        }

        
        $data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'msg' => $msg,
            'country' => $country,
            'languages' => $languages,
        ];

        $dataError = [
            'nameError' => '',
            'emailError' => '',
            'phoneError' => '',
            'langsError' => ''
        ];

        // validate name
        if($this->validateName($name)){
            $dataError['nameError'] = $this->validateName($name);
        }
        

        // validate email
        if($this->validateEmail($email)){
            $dataError['emailError'] = $this->validateEmail($email);
        }
        

        // validate phone
        if($this->validatePhone($phone)){
            $dataError['phoneError'] = $this->validatePhone($phone);
        }
        

        // validate language
        if($this->validateLanguage($languages)){
            $dataError['langsError'] = $this->validateLanguage($languages);
        }
        

        // check if errors are empty
        if($this->ifErrorsIsEmpty($dataError)){

            $this->addFlashMessage(
                'This message is successfully sent',
                '',
                FlashMessage::OK,
                true
             );
            
            $this->sendMail($data);
            $this->redirect('list', NULL, NULL, NULL);
            
        }else{
            
            foreach($dataError as $key => $value){

                if($value != NULL){
                    $this->addFlashMessage(
                        $value,
                        $key,
                        FlashMessage::ERROR,
                        true
                    );
                }
                
            }
            
            $this->redirect('list', NULL, NULL, NULL);
        }

        
        // DebuggerUtility::var_dump($dataError);
        // $this->redirect('list', NULL, NULL, $dataError);
    }

    /**
     * validate name
     * @param string $name
     * @return string|null
     */
    private function validateName(string $name): ?string
    {
        $letters = "/^[a-zA-Z]*$/";

        if(empty($name)){
            return 'Please enter a name';
        }

        if(!preg_match($letters, $name)){
            return 'Only letters are allowed';
        }

        return null;
    }

    /**
     * validate email address
     * @param string $email
     * @return string|null
     */
    private function validateEmail(string $email): ?string
    {
        $mailFormat = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";

        if(empty($email)){
            return 'Please enter a email';
        }

        if(!preg_match($mailFormat, $email)){
            return 'Invalid email address';
        }

        return null;
    }

    /**
     * validate phone number
     * @param string $phone
     * @return string|null
     */
    private function validatePhone(string $phone): ?string
    {
        $phoneFormat = "/^\+?([0-9]{2,3})\)?[\/. ]?([0-9]{2})[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/";

        if(!empty($phone)){
            if(!preg_match($phoneFormat, $phone)){
                return 'Invalid phone number';
            }
        }

        return null;
    }

    /**
     * validate language
     * @param array|null $langues
     * @return string|null
     */
    private function validateLanguage(?array $langues): ?string
    {
        if($langues === null){
            return 'Please select at least one language';
        }

        return null;
    }

    /**
     * send email
     * @param array $data
     * @return void
     */
    private function sendMail(array $data): void
    {
        $mail = GeneralUtility::makeInstance(MailMessage::class);
        $mail->from(new Address($data['email'], $data['name']));
        $mail->to(new Address('sic.techlab@gmail.com', 'Test Name'));
        $mail->subject('Your subject');
        $mail->text($data['msg']);
        $mail->html('<p>Here is the message itself</p>');
        // DebuggerUtility::var_dump($mail);
        // $mail->send();
    }

    /**
     * check if errors array is empty
     * @param array $errors
     * @return bool
     */
    private function ifErrorsIsEmpty(array $errors): bool
    {
        if(empty($errors['nameError']) && empty($errors['emailError']) && empty($errors['phoneError']) && empty($errors['langsError'])){

            return true;
        }

        return false;
    }

}
