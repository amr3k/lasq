<?php
function lang ($phrase) {
    static $dict    =   [
// Global:
        'PAGE_TTL'  =>  'Main',
        'SOON'      =>  'This feature is coming soon',
        'OR'        =>  '-Or-',
        'AT'        =>  'At',
        'EDIT'      =>  'Edit',
        'DELETE'    =>  'Delete',
        'UPDATE'    =>  'Update',
        'ABOUT'     =>  'About',
        'ERROR'     =>  'Sorry, We had an error while attempting to complete your request',
// Database
        'DB_ERR'        =>  'Sorry we had some issues while connecting to database',
        'DB_NO_RESULT'  =>  'Found no results',
// Navagation bar:
        'NAV_BRAND'     =>      'Main',
        'NAV_DASH'      =>      'Dashboard',
        'NAV_MMBR'      =>      'Members',
        'NAV_PASTES'    =>      'Pastes',
        'NAV_LANG'      =>      'Language',
        'NAV_AR'        =>      'العربية',
        'NAV_EN'        =>      'English',
        'NAV_ADD'       =>      'Add',
        'NAV_EXPLORE'   =>      'Explore',
        'NAV_GUEST'     =>      'Guest',
        'NAV_LOGIN'     =>      'Login',
        'NAV_SETTINGS'  =>      'Settings',
        'NAV_LOGOUT'    =>      'Logout',
// Footer:
        'FOOTER_ABOUT'          =>  'This is one of my first web applications after learning PHP.<br>'
        . ' It\'s just a training, Not real web service',
        'FOOTER_COPYRIGHT'      =>  'Copyright &#169; Amr Elkhenany',
// Forms
        'FORM_USER_NAME'        =>  'User name',
        'FORM_USER_PASS'        =>  'Password',
        'FORM_LOGIN_BTN'        =>  'Login',
        'FORM_SUBMIT_BTN'       =>  'Submit',
        'FORM_SEARCH_BTN'       =>  'Search',
        'FORM_ADD_PST_TTL'      =>  'Type a title',
        'FORM_ADD_PST_TTL_PH'   =>  'Title',
        'FORM_ADD_PST_TXT'      =>  'Type your text',
        'FORM_ADD_PST_TXT_PH'   =>  'Text',
        'FORM_RECAPTCHA_LBL'    =>  'Prove that you are human',
// Form validation messages
        'FORM_V_INPUT_ALL_REQ'  =>  'Please fill in all required fields',
        'FORM_V_USER_REGEX'     =>  'Username must be between 3-20 charachters and can only contain small letters,',
        'FORM_V_PASS_REGEX'     =>  'Password must be betwwen 6 - 128 charachters and must have at least 1 number and 1 letter',
        'FORM_V_USER_PASS'      =>  'Username and password don\'t match',
        'FORM_V_RECAPTCHA'      =>  'You must complete the reCAPTCHA test',
        'FORM_MSG_SCS'          =>  'You are logged in',
// Admin Page:
        'ADMIN_INDEX_REG_OFF'   =>  'Crrently, Registration is off <br> Only site admins can login',
        'ADMIN_INDEX_HDR1'      =>  'Welcome to Admin page',
        'ADMIN_INDEX_HDR2'      =>  'Please Enter your credentials to continue',
// Dashboard:
        'ADMIN_DASH_MAIN_HDR1'  =>  'Welcome to dashboard',
        'ADMIN_DASH_MAIN_STAT1' =>  'Total members',
        'ADMIN_DASH_MAIN_STAT2' =>  'Total Pastes',
// Pastes:
        'PASTES_HDR1'           =>  'View all pastes',
        'PASTES_PLCHLDR'        =>  'Search paste titles',
        'PASTES_BTN_VIEW_ALL'   =>  'View all pastes',
        'PASTES_TBL_TOP_ROW1'   =>  'ID',
        'PASTES_TBL_TOP_ROW2'   =>  'Title',
        'PASTES_TBL_TOP_ROW3'   =>  'Created on',
        'PASTES_TBL_TOP_ROW4'   =>  'Owner',
        'PASTES_TBL_TOP_ROW5'   =>  'Controls',
    // Delete pastes:
        'PASTES_DEL_SUCCESS'    =>  'You have successfully deleted one paste',
// Public:
    // Index:
        'PUB_IND_BTN_ADD'       =>  'Add a new paste',
        'PUB_IND_BTN_EXPLORE'   =>  'Explore',
    // Add
        'PUB_ADD_HDR1'          =>  'Add a new paste',
        'PUB_ADD_ERR_FILE1'     =>  'Sorry, We have trouble with creating files right now, Please try again later',
    // View:
        'PUB_VIEW_OWNER'        =>  'Written by:',
        'PUB_VIEW_CREATED'      =>  'Created on:',
        'PUB_VIEW_BTN_PRINT'    =>  'Print',
        
    ];
    return $dict[$phrase];
}
?>