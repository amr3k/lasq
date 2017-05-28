<?php
function lang ($phrase) {
    static $dict    =   [
// Global:
        'PAGE_TTL'  =>  'الرئيسية',
        'SOON'      =>  'هذه الميزة قادمة قريبا',
        'OR'        =>  '-أو-',
        'AT'        =>  'في الساعة',
        'EDIT'      =>  'تعديل',
        'DELETE'    =>  'حذف',
        'UPDATE'    =>  'تحديث',
        'ABOUT'     =>  'حول',
        'ERROR'     =>  'عذرا، لقد حدثت مشكلة أثناء محاولة تنفيذ طلبك',
// Database
        'DB_ERR'        =>  'عذرا، لقد حدثت مشكلة أثناء محاولة الإتصال بقاعدة البيانات',
        'DB_NO_RESULT'  =>  'لم يتم العثور على نتائج',
// Navagation bar:
        'NAV_BRAND'     =>      'الرئيسية',
        'NAV_DASH'      =>      'لوحة التحكم',
        'NAV_MMBR'      =>      'الأعضاء',
        'NAV_PASTES'    =>      'الملصقات',
        'NAV_LANG'      =>      'اللغة',
        'NAV_AR'        =>      'العربية',
        'NAV_EN'        =>      'English',
        'NAV_ADD'       =>      'أضف',
        'NAV_EXPLORE'   =>      'اكتشف',
        'NAV_GUEST'     =>      'زائر',
        'NAV_LOGIN'     =>      'تسجيل الدخول',
        'NAV_SETTINGS'  =>      'الإعدادات',
        'NAV_LOGOUT'    =>      'تسجيل الخروج',
// Footer:
        'FOOTER_ABOUT'          =>  'هذه من أولى التطبيقات التي قمت ببرمجتها بعد تعلمي للغة PHP.<br>'
        . ' بالتأكيد فإنها بهدف التعليم وليست لأغراض تجارية وليست خدمة حقيقية',
        'FOOTER_COPYRIGHT'      =>  'الحقوق محفوظة &#169; Amr Elkhenany',
// Forms
        'FORM_USER_NAME'        =>  'اسم المستخدم',
        'FORM_USER_PASS'        =>  'كلمة المرور',
        'FORM_LOGIN_BTN'        =>  'تسجيل الدخول',
        'FORM_SUBMIT_BTN'       =>  'تأكيد',
        'FORM_SEARCH_BTN'       =>  'بحث',
        'FORM_ADD_PST_TTL'      =>  'اكتب العنوان',
        'FORM_ADD_PST_TTL_PH'   =>  'العنوان',
        'FORM_ADD_PST_TXT'      =>  'اكتب النص',
        'FORM_ADD_PST_TXT_PH'   =>  'النص',
        'FORM_RECAPTCHA_LBL'    =>  'لابد من إثبات أنك لست روبوت',
// Form validation messages
        'FORM_V_INPUT_ALL_REQ'  =>  'من فضلك أكمل إدخال كافة البيانات المطلوبة',
        'FORM_V_USER_REGEX'     =>  'لابد أن يحتوي اسم المستخدم على 3-20 حرفا صغيرا فقط,',
        'FORM_V_PASS_REGEX'     =>  'كلمة المرور يجب أن تكون محصورة بين 8-128 رمزا وأن تحتوي على الأقل على حرفا صغيرا ورقما',
        'FORM_V_USER_PASS'      =>  'اسم المستخدم وكلمة المرور ليسا متطابقين',
        'FORM_V_RECAPTCHA'      =>  'لابد أن تكمل اختبار التحقق من هويتك',
        'FORM_MSG_SCS'          =>  'تم تسجيل الدخول بنجاح',
// Admin Page:
        'ADMIN_INDEX_REG_OFF'   =>  'حاليا، تسجيل العضويات متوقف حتى إشعار آخر<br> فقط مسئولو الموقع من يمكنهم تسجيل الدخول',
        'ADMIN_INDEX_HDR1'      =>  'مرحبا في صفحة المسئولين',
        'ADMIN_INDEX_HDR2'      =>  'من فضلك قم بتعبئة بياناتك',
// Dashboard:
        'ADMIN_DASH_MAIN_HDR1'  =>  'مرحبا في لوحة التحكم',
        'ADMIN_DASH_MAIN_STAT1' =>  'إجمالي عدد الأعضاء',
        'ADMIN_DASH_MAIN_STAT2' =>  'إجمالي عدد الملصقات',
// Pastes:
        'PASTES_HDR1'           =>  'عرض كافة الملصقات',
        'PASTES_PLCHLDR'        =>  'بحث في عناوين الملصقات',
        'PASTES_BTN_VIEW_ALL'   =>  'عرض كافة الملصقات',
        'PASTES_TBL_TOP_ROW1'   =>  '#',
        'PASTES_TBL_TOP_ROW2'   =>  'العنوان',
        'PASTES_TBL_TOP_ROW3'   =>  'تاريخ الإنشاء',
        'PASTES_TBL_TOP_ROW4'   =>  'المالك',
        'PASTES_TBL_TOP_ROW5'   =>  'أدوات التحكم',
    // Delete pastes:
        'PASTES_DEL_SUCCESS'    =>  'تم الحذف بنجاح',
// Public:
    // Index:
        'PUB_IND_BTN_ADD'       =>  'إضافة ملصق جديد',
        'PUB_IND_BTN_EXPLORE'   =>  'اكتشف',
    // Add
        'PUB_ADD_HDR1'          =>  'إضافة ملصق جديد',
        'PUB_ADD_ERR_FILE1'     =>  'عذرا، ظهرت مشكلات أثناء محاولة إنشاء ملف جديد، من فضلك حاول مرة أخرى',
    // View:
        'PUB_VIEW_OWNER'        =>  'تمت كتابتها بواسطة:',
        'PUB_VIEW_CREATED'      =>  'تاريخ الإنشاء:',
        'PUB_VIEW_BTN_PRINT'    =>  'طباعة',
        
    ];
    return $dict[$phrase];
}
?>