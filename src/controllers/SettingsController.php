<?php

use Laconia\Controller;
use Laconia\ListClass;

class SettingsController extends Controller
{
    public $page_title = 'Settings';
    public $message;
    public $user;

    public function post() 
    {
        // Get user by session value
        $userId = $this->session->getSessionValue('user_id');
        $this->session->authenticate($userId);
        
        $get = filter_get();
        $post = filter_post();
       
        if (isset($post['delete_user'])) {
            $this->userControl->deleteUser($userId);
            $this->session->logout();

            $this->message = USER_DELETED;
        
            echo $this->message;
            exit;
        } else if (isset($post['email'])) {

            // Update settings
            $this->userControl->updateUserSettings($post, $userId);
            $this->user = $this->userControl->getUser($userId);

            $this->message = SETTINGS_UPDATE_SUCCESS;
         
            echo $this->message;
            exit;
        }
    }

    public function get() 
    {
        $userId = $this->session->getSessionValue('user_id');
        $this->session->authenticate($userId);

        $get = filter_get();
        
        // Get user by session value
        $this->user = $this->userControl->getUser($userId);

        $this->view('settings');
    }
}