<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

use yii\db\Migration;

/**
 * Initializes i18n messages tables.
 *
 *
 *
 * @author Dmitry Naumenko <d.naumenko.a@gmail.com>
 * @since 2.0.7
 */
class m150207_210500_i18n_init extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%i18n_message}}', [
            'id' => $this->primaryKey(),
            'category' => $this->string(),
            'message' => $this->text(),
        ], $tableOptions);

        $this->createTable('{{%i18n_translation}}', [
            'id' => $this->integer()->notNull(),
            'language' => $this->string(5)->notNull(),
            'translation' => $this->text(),
        ], $tableOptions);

        $this->createTable('{{%i18n_language}}', [
            'id' => $this->primaryKey(),
            'language' => $this->string(5)->notNull()->unique(),
            'name' => $this->string(50)->notNull(),
        ], $tableOptions);

        $this->addPrimaryKey('pk_i18n_translation_id_i18n_language', '{{%i18n_translation}}', ['id', 'language']);
        $this->addForeignKey('fk_i18n_translation_i18n_message', '{{%i18n_translation}}', 'id', '{{%i18n_message}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_i18n_translation_i18n_language', '{{%i18n_translation}}', 'language', '{{%i18n_language}}', 'language', 'CASCADE', 'CASCADE');

        $this->batchInsert('{{%i18n_language}}', ['id', 'language', 'name'], [
            [1, 'en', 'English'],
            [2, 'ru', 'Русский'],
        ]);

        $this->batchInsert('{{%i18n_message}}', ['id', 'category', 'message'], [
            [1, 'app', 'Signup Confirmation'],
            [2, 'app', 'Password Reset Link'],
            [3, 'app', "User with the same email as in {client} account already exists but isn't linked to it.<br /> Login using email first to link it."],
            [4, 'app', 'The {client} account is already linked to a different user.'],
            [5, 'app', 'The {client} account is already linked to your user.'],
            [6, 'app', 'You are not allowed to perform this action.<br /> Only registered administrators can login to the Admin Panel.'],
            [7, 'app', 'The {client} account is successfully linked to your user.'],
            [8, 'app', 'The {client} account is successfully linked to your user.<br /> The data associated with an old user logged with the {client} account before is merged with your user now.'],
            [9, 'app', 'No file uploaded.'],
            [10, 'app', 'The file is empty.'],
            [11, 'app', 'Wrong image format. Allowed formats are jpg, png and gif.'],
            [12, 'app', 'File uploading error. No writing/modifying file permission.'],
            [13, 'app', 'Refresh Data'],
            [14, 'app', 'Add New Record'],
            [15, 'app', 'Block Selected'],
            [16, 'app', 'Unblock Selected'],
            [17, 'app', 'Mark Selected as Read'],
            [18, 'app', 'Mark Selected as Unread'],
            [19, 'app', 'Delete Selected'],
            [20, 'app', 'Are you sure you want to delete the selected items?'],
            [21, 'app', 'Per page'],
            [22, 'app', 'Hello'],
            [23, 'app', 'Thank you for signup'],
            [24, 'app', 'Follow the link below to confirm your email'],
            [25, 'app', 'Your personal data'],
            [26, 'app', 'Follow the link below to reset your password'],
            [27, 'app', 'Incorrect username or password.'],
            [28, 'app', 'ID'],
            [29, 'app', 'Name'],
            [30, 'app', 'Slug'],
            [31, 'app', 'Default'],
            [32, 'app', 'Language'],
            [33, 'app', 'Link Name'],
            [34, 'app', 'Page Title'],
            [35, 'app', 'Meta Keywords'],
            [36, 'app', 'Meta Description'],
            [37, 'app', 'Header'],
            [38, 'app', 'Content'],
            [39, 'app', 'Category'],
            [40, 'app', 'Message'],
            [41, 'app', 'Only logged'],
            [42, 'app', 'Only not logged'],
            [43, 'app', 'Owner'],
            [44, 'app', 'Sorting'],
            [45, 'app', 'Visible'],
            [46, 'app', 'Title'],
            [47, 'app', 'Created'],
            [48, 'app', 'Updated'],
            [49, 'app', 'Custom'],
            [50, 'app', 'System'],
            [51, 'app', 'Type'],
            [52, 'app', 'Role Name'],
            [53, 'app', 'Male'],
            [54, 'app', 'Female'],
            [55, 'app', 'Username'],
            [56, 'app', 'Auth Key'],
            [57, 'app', 'Password Hash'],
            [58, 'app', 'Password Reset Token'],
            [59, 'app', 'Access Token'],
            [61, 'app', 'First Name'],
            [62, 'app', 'Last Name'],
            [63, 'app', 'Role'],
            [64, 'app', 'Country'],
            [65, 'app', 'Zip'],
            [66, 'app', 'City'],
            [67, 'app', 'Address'],
            [68, 'app', 'Phone'],
            [69, 'app', 'Avatar'],
            [70, 'app', 'Birth Date'],
            [71, 'app', 'Gender'],
            [72, 'app', 'Verified'],
            [73, 'app', 'Active'],
            [74, 'app', 'Last Login'],
            [75, 'app', 'User'],
            [76, 'app', 'Source'],
            [77, 'app', 'Source ID'],
            [78, 'app', 'Screen Name'],
            [79, 'app', 'Parent'],
            [80, 'app', 'Module Name'],
            [81, 'app', 'Keywords'],
            [82, 'app', 'Module'],
            [83, 'app', 'Menu'],
            [84, 'app', 'Page'],
            [85, 'app', 'Link Caption'],
            [86, 'app', 'Url'],
            [87, 'app', 'No'],
            [88, 'app', 'Yes'],
            [89, 'app', 'Parent Category'],
            [90, 'app', 'Description'],
            [91, 'app', 'Translation'],
            [92, 'app', 'Source Message'],
            [93, 'app', 'Question'],
            [94, 'app', 'Sender Email'],
            [95, 'app', 'Sender Name'],
            [96, 'app', 'Subject'],
            [97, 'app', 'Letter Body'],
            [98, 'app', 'Opened'],
            [99, 'app', 'Verification Code'],
            [100, 'app', 'Sender'],
            [102, 'app', 'Phone Code'],
            [103, 'app', 'Image'],
            [104, 'app', 'Image Url'],
            [105, 'app', 'Thumbnail Url'],
            [106, 'app', 'Key'],
            [107, 'app', 'Value'],
            [108, 'app', 'Code'],
            [109, 'app', 'Menu Name'],
            [110, 'app', 'Price'],
            [111, 'app', 'The requested page does not exist.'],
            [112, 'app', 'Saving value error.'],
            [113, 'app', 'Link a new Social Account'],
            [114, 'app', 'Edit User'],
            [116, 'app', 'Users'],
            [117, 'app', 'Add User'],
            [118, 'app', 'Block'],
            [119, 'app', 'Unblock'],
            [120, 'app', 'Expand'],
            [121, 'app', 'Search'],
            [122, 'app', 'Reset'],
            [123, 'app', 'Roles'],
            [124, 'app', 'Add Role'],
            [125, 'app', 'General'],
            [126, 'app', 'Contacts'],
            [127, 'app', 'Settings'],
            [128, 'app', 'Password'],
            [129, 'app', 'Create'],
            [130, 'app', 'Update'],
            [131, 'app', 'Delete Image'],
            [132, 'app', 'Are you sure you want to delete the image?'],
            [133, 'app', 'Edit Theme'],
            [134, 'app', 'Themes'],
            [135, 'app', 'Delete'],
            [137, 'app', 'Add Theme'],
            [138, 'app', 'Theme Settings'],
            [139, 'app', 'Noname'],
            [140, 'app', 'Set as Default'],
            [141, 'app', 'Are you sure you want to set the theme as default?'],
            [142, 'app', 'Edit Setting'],
            [143, 'app', 'Add Setting'],
            [144, 'app', 'Site Settings'],
            [145, 'app', 'Edit Page'],
            [146, 'app', 'Pages'],
            [147, 'app', 'Add Page'],
            [148, 'app', 'Translation List'],
            [149, 'app', 'Categories'],
            [150, 'app', 'Add Category'],
            [151, 'app', 'Menus'],
            [152, 'app', 'Add Menu'],
            [153, 'app', 'Meta Tags'],
            [154, 'app', 'Translations'],
            [155, 'app', 'Admin Panel'],
            [156, 'app', 'My Profile'],
            [157, 'app', 'Logout'],
            [158, 'app', 'Created by'],
            [159, 'app', 'Edit Translation'],
            [160, 'app', 'Add Translation'],
            [162, 'app', 'Edit Language'],
            [163, 'app', 'Languages'],
            [164, 'app', 'Add Language'],
            [165, 'app', 'Language Info'],
            [166, 'app', 'Edit Category'],
            [167, 'app', 'Disable'],
            [168, 'app', 'Enable'],
            [170, 'app', 'Media Category'],
            [171, 'app', 'Edit Product'],
            [172, 'app', 'Products'],
            [173, 'app', 'Add Product'],
            [176, 'app', 'Edit Module'],
            [177, 'app', 'Modules'],
            [178, 'app', 'Add Module'],
            [179, 'app', 'Module Settings'],
            [180, 'app', 'Login'],
            [182, 'app', 'The above error occurred while the Web server was processing your request.'],
            [183, 'app', 'Please contact us if you think this is a server error. Thank you.'],
            [184, 'app', 'Edit Item'],
            [185, 'app', 'Items'],
            [186, 'app', 'Questions'],
            [187, 'app', 'Add Question'],
            [188, 'app', 'Add Item'],
            [190, 'app', 'Link Caption Translations'],
            [191, 'app', 'Edit Menu'],
            [192, 'app', 'Add New Menu Item'],
            [193, 'app', 'Custom Link'],
            [194, 'app', 'Text Item'],
            [195, 'app', 'Item Count'],
            [196, 'app', 'Caption'],
            [197, 'app', 'Toggle'],
            [198, 'app', 'Show Details'],
            [199, 'app', 'Hide Details'],
            [200, 'app', 'Add Items'],
            [201, 'app', 'Add Pages'],
            [202, 'app', 'Add Link'],
            [203, 'app', 'Add Text Item'],
            [204, 'app', 'Select All'],
            [205, 'app', 'Item List'],
            [206, 'app', 'List does not contain any items.'],
            [207, 'app', 'Edit Email'],
            [208, 'app', 'View Email'],
            [209, 'app', 'Emails'],
            [210, 'app', 'Add Email'],
            [211, 'app', 'Mark as Not Read'],
            [212, 'app', 'Mark as Read'],
            [214, 'app', 'User Email'],
            [215, 'app', 'Edit Role'],
            [216, 'app', 'User Role'],
            [217, 'app', 'Permission'],
            [218, 'app', 'User doesn’t have access to the admin panel'],
            [219, 'app', 'Super admin has full access to the admin panel'],
            [220, 'app', 'Page Categories'],
            [222, 'app', 'Edit File'],
            [223, 'app', 'Media'],
            [224, 'app', 'Add File'],
            [225, 'app', 'Media Files'],
            [226, 'app', 'Copy'],
            [227, 'app', 'Media File'],
            [228, 'app', 'Generated'],
            [229, 'app', 'Data Export'],
            [230, 'app', 'Sign In to Your Account'],
            [231, 'app', 'Please fill out the following fields to login:'],
            [232, 'app', 'Sign In With'],
            [233, 'app', 'If you forgot your password you can'],
            [234, 'app', 'reset it'],
            [235, 'app', 'Please fill out the following fields to signup:'],
            [236, 'app', 'Signup'],
            [237, 'app', 'Please fill out your email. A link to reset password will be sent there.'],
            [238, 'app', 'Save'],
            [239, 'app', 'Change Password'],
            [240, 'app', 'Edit Profile'],
            [241, 'app', 'Web development company'],
            [242, 'app', 'Our team consists of experienced web developers, designers and managers.'],
            [243, 'app', 'We are looking for new clients or ongoing relationship with new business partners!'],
            [244, 'app', 'Hire dedicated team of Professional web Developers & Designers and other experts from us and you can be sure that you will be always provided with the high quality and timeliness of our work.'],
            [245, 'app', 'About Us'],
            [246, 'app', 'Blog'],
            [247, 'app', 'Contact Info'],
            [248, 'app', 'Telephone'],
            [249, 'app', 'Fax'],
            [251, 'app', 'Drop Us A Few Lines'],
            [252, 'app', 'If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.'],
            [253, 'app', 'E-mail'],
            [254, 'app', 'Full Name'],
            [255, 'app', 'Submit'],
            [256, 'app', 'Homepage'],
            [257, 'app', 'Contact Us'],
            [258, 'app', 'Submit'],
            [260, 'app', 'Login via Networks'],
            [261, 'app', 'Thank you for signup. An activation link is sent to {email} to verify your email address.'],
            [262, 'app', 'There is a registering user error. Please correct validation errors.'],
            [263, 'app', 'Your signup is confirmed. Thank you for using our site.'],
            [264, 'app', 'Access token error. Please check your confirmation link.'],
            [265, 'app', 'A reset password link is sent to your email. Please, сheck your email for further instructions.'],
            [266, 'app', 'Sorry, we are unable to reset password for email provided.'],
            [267, 'app', 'New password is successfully saved. Thank you for using our site.'],
            [268, 'app', 'Thank you for contacting us. We will respond to you as soon as possible.'],
            [269, 'app', 'There is an sending email error.'],
            [270, 'app', 'Send'],
            [271, 'app', 'Quick Links'],
            [272, 'app', 'Do not hesitate to {contact_link} if you have any questions or feature requests'],
            [273, 'app', 'contact us'],
            [274, 'app', 'Copyright'],
            [275, 'app', 'All Rights Reserved'],
            [276, 'app', 'Content Rubrics'],
            [277, 'app', 'My Company'],
            [278, 'app', 'Helpful Data'],
            [279, 'app', 'Online'],
            [280, 'app', 'Support'],
            [281, 'app', 'Our'],
            [282, 'app', 'Data'],
            [283, 'app', 'Protection'],
            [284, 'app', 'Category does not contain any items.'],
            [285, 'app', 'Meet Our Team'],
            [286, 'app', 'Show All'],
            [287, 'app', 'Product Info'],
            [288, 'app', 'Latest Items'],
            [289, 'app', 'by'],
            [290, 'app', 'on'],
            [291, 'app', 'All Categories'],
            [292, 'app', 'Top Stories'],
            [293, 'app', 'Read More'],
            [294, 'app', 'This username has already been taken.'],
            [295, 'app', 'This email address has already been taken.'],
            [296, 'app', 'Wrong password reset token.'],
            [297, 'app', 'Old Password is incorrect.'],
            [298, 'app', 'There is no user with such email.'],
            [299, 'app', 'of'],
            [300, 'app', 'Network'],
            [301, 'app', 'Accounts'],
            [302, 'app', 'Generel'],
            [303, 'app', 'Networks'],
            [304, 'app', 'Uncategorised'],
            [305, 'app', 'Type Name'],
            [306, 'app', 'Confirm Password'],
            [307, 'app', 'Inherited'],
            [308, 'app', 'Enable Selected'],
            [309, 'app', 'Disable Selected'],
            [310, 'app', 'More'],
            [311, 'app', 'Read'],
            [312, 'app', 'Yes (use Link Caption of the selected page)'],
            [313, 'app', 'No (enter Link Caption and translations manually)'],
            [314, 'app', 'Catalog'],
            [315, 'app', 'FAQ'],
            [316, 'app', 'Cancel'],
            [317, 'app', 'Test Mode'],
            [318, 'app', 'Sorry, but you are not allowed to perform this action because you have been granted only read permissions.'],
            [319, 'app', 'Go Back'],
            [320, 'app', 'Demo admin credentials for examination'],
            [321, 'app', 'Username/password'],
        ]);

        $this->batchInsert('{{%i18n_translation}}', ['id', 'language', 'translation'], [
            [1, 'ru', 'Подтверждение Регистрации'],
            [2, 'ru', 'Ссылка на Переустановку Пароля'],
            [3, 'ru', 'Пользователь с электронной почтой {client} уже существует, но он не прикреплен к аккаунту. Зайдите используя электронный адрес, чтобы прикрепить пользователя.'],
            [4, 'ru', 'Аккаунт {client} уже связан с другим пользователем.'],
            [5, 'ru', 'Аккаунт {client} уже связан с вашем пользователем.'],
            [6, 'ru', 'Вам запрещено выполнить это действие.<br /> Только зарегистрированным администраторы могут войти в Панель Настроек.'],
            [7, 'ru', 'Аккаунт {client} успешно связан с вашем пользователем.'],
            [8, 'ru', 'Аккаунт {client} успешно связан с вашим пользователем. Данные связанные с существующим пользователем залогиненным как {client} теперь присоединены к вашему пользователем.'],
            [9, 'ru', 'Файл не загружен'],
            [10, 'ru', 'Файл пуст.'],
            [11, 'ru', 'Неправильный формат изображения. Разрешенные форматы jpg, png и gif.'],
            [12, 'ru', 'Ошибка при загрузке файла. Нет разрешения на запись/обновление.'],
            [13, 'ru', 'Обновить Данные'],
            [14, 'ru', 'Добавить Новую Запись'],
            [15, 'ru', 'Блокировать Выбранные'],
            [16, 'ru', 'Разблокировать Выбранные'],
            [17, 'ru', 'Пометить выбранные как Прочтенные'],
            [18, 'ru', 'Пометить выбранные как Непрочтенные'],
            [19, 'ru', 'Удалить Выбранные'],
            [20, 'ru', 'Вы уверены что хотите удалить выбранные элементы?'],
            [21, 'ru', 'На старнице'],
            [22, 'ru', 'Здравствуйте,'],
            [23, 'ru', 'Спасибо за регистрацию'],
            [24, 'ru', 'Перейдите по нижеприведенной ссылке, чтобы подтвердить ваш электронный адрес'],
            [25, 'ru', 'Ваши личные данные'],
            [26, 'ru', 'Перейдите по нижеприведенной ссылке, чтобы изменить свой пароль'],
            [27, 'ru', 'Некорректное Имя Пользователя или Пароль'],
            [28, 'ru', null],
            [29, 'ru', 'Название'],
            [30, 'ru', null],
            [31, 'ru', 'По-умолчанию'],
            [32, 'ru', 'Язык '],
            [33, 'ru', 'Имя ссылки'],
            [34, 'ru', 'Заголовок Страницы'],
            [35, 'ru', 'Мета Ключевые Слова'],
            [36, 'ru', 'Мета Описание'],
            [37, 'ru', 'Хедер'],
            [38, 'ru', 'Контент'],
            [39, 'ru', 'Категория'],
            [40, 'ru', 'Сообщение'],
            [41, 'ru', 'Только залогиненные'],
            [42, 'ru', 'Только не залогиненные'],
            [43, 'ru', 'Владелец'],
            [44, 'ru', 'Сортировка'],
            [45, 'ru', 'Видимое'],
            [46, 'ru', 'Заголовок'],
            [47, 'ru', 'Созданое'],
            [48, 'ru', 'Обновленное'],
            [49, 'ru', 'Пользовательский'],
            [50, 'ru', 'Системный'],
            [51, 'ru', 'Тип'],
            [52, 'ru', 'Название Роли'],
            [53, 'ru', 'Мужчина'],
            [54, 'ru', 'Женщина'],
            [55, 'ru', 'Имя Пользователя'],
            [56, 'ru', 'Ключ авторизации'],
            [57, 'ru', 'Хэш Пароля'],
            [58, 'ru', 'Ключ на Смену Пароля'],
            [59, 'ru', 'Ключ доступа'],
            [61, 'ru', 'Имя'],
            [62, 'ru', 'Фамилия'],
            [63, 'ru', 'Роль'],
            [64, 'ru', 'Страна'],
            [65, 'ru', 'Почтовый Код'],
            [66, 'ru', 'Город'],
            [67, 'ru', 'Адрес'],
            [68, 'ru', 'Телефон'],
            [69, 'ru', 'Аватар'],
            [70, 'ru', 'Дата Рождения'],
            [71, 'ru', 'Пол'],
            [72, 'ru', 'Подтверждён'],
            [73, 'ru', 'Активирован'],
            [74, 'ru', 'Последний Логин'],
            [75, 'ru', 'Пользователь'],
            [76, 'ru', 'Источник'],
            [77, 'ru', 'ID Источника'],
            [78, 'ru', 'Ник Аккаунта'],
            [79, 'ru', 'Родитель'],
            [80, 'ru', 'Имя Модуля'],
            [81, 'ru', 'Ключевые слова'],
            [82, 'ru', 'Модуль'],
            [83, 'ru', 'Меню'],
            [84, 'ru', 'Страница'],
            [85, 'ru', 'Подпись к Ссылке'],
            [86, 'ru', null],
            [87, 'ru', 'Нет'],
            [88, 'ru', 'Да'],
            [89, 'ru', 'Родительская Категория'],
            [90, 'ru', 'Описание'],
            [91, 'ru', 'Перевод'],
            [92, 'ru', 'Исходный Текст'],
            [93, 'ru', 'Вопрос'],
            [94, 'ru', 'E-mail Отправителя'],
            [95, 'ru', 'Имя Отправителя'],
            [96, 'ru', 'Тема'],
            [97, 'ru', 'Текст Письма'],
            [98, 'ru', 'Открытый'],
            [99, 'ru', 'Код Подтверждения'],
            [100, 'ru', 'Отправитель'],
            [102, 'ru', 'Телефонный Код'],
            [103, 'ru', 'Изображение'],
            [104, 'ru', 'Адрес Изображения'],
            [105, 'ru', 'Адрес Эскиза'],
            [106, 'ru', 'Ключ'],
            [107, 'ru', 'Значение'],
            [108, 'ru', 'Код'],
            [109, 'ru', 'Название Меню'],
            [110, 'ru', 'Цена'],
            [111, 'ru', 'Запрашиваемая страница не существует.'],
            [112, 'ru', 'Ошибка сохранения значения.'],
            [113, 'ru', 'Привязать новый Социальный Аккаунт'],
            [114, 'ru', 'Редактировать Пользователя'],
            [116, 'ru', 'Пользователи'],
            [117, 'ru', 'Добавить Пользователя'],
            [118, 'ru', 'Блокировать'],
            [119, 'ru', 'Разблокировать'],
            [120, 'ru', 'Расширить'],
            [121, 'ru', 'Поиск'],
            [122, 'ru', 'Сбросить'],
            [123, 'ru', 'Роли'],
            [124, 'ru', 'Добавить Роль'],
            [125, 'ru', 'Общие'],
            [126, 'ru', 'Контакты'],
            [127, 'ru', 'Настройки'],
            [128, 'ru', 'Пароль'],
            [129, 'ru', 'Создать'],
            [130, 'ru', 'Обновить'],
            [131, 'ru', 'Удалить Изображение'],
            [132, 'ru', 'Вы уверены что хотите удалить изображение?'],
            [133, 'ru', 'Редактировать Тему'],
            [134, 'ru', 'Темы'],
            [135, 'ru', 'Удалить'],
            [137, 'ru', 'Добавить Тему'],
            [138, 'ru', 'Настройки темы'],
            [139, 'ru', 'Без имени'],
            [140, 'ru', 'По-умолчанию'],
            [141, 'ru', 'Вы уверены что хотите установить тему по умолчанию?'],
            [142, 'ru', 'Редактировать Настройку'],
            [143, 'ru', 'Добавить Настройку'],
            [144, 'ru', 'Настройки Сайта'],
            [145, 'ru', 'Редактировать Страницу'],
            [146, 'ru', 'Страницы'],
            [147, 'ru', 'Добавить Страницу'],
            [148, 'ru', 'Список Переводов'],
            [149, 'ru', 'Категории'],
            [150, 'ru', 'Добавить Категорию'],
            [151, 'ru', 'Меню'],
            [152, 'ru', 'Добавить Меню'],
            [153, 'ru', 'Мета Теги'],
            [154, 'ru', 'Переводы'],
            [155, 'ru', 'Админ Панель'],
            [156, 'ru', 'Мой Профиль'],
            [157, 'ru', 'Выйти'],
            [158, 'ru', 'Создано'],
            [159, 'ru', 'Редактировать Перевод'],
            [160, 'ru', 'Добавить Перевод'],
            [162, 'ru', 'Редактировать Язык'],
            [163, 'ru', 'Языки'],
            [164, 'ru', 'Добавить Язык'],
            [165, 'ru', 'Информация о Языке'],
            [166, 'ru', 'Редактировать Категорию'],
            [167, 'ru', 'Отключить'],
            [168, 'ru', 'Активировать'],
            [170, 'ru', 'Медиа-категория'],
            [171, 'ru', 'Редактировать Продукт'],
            [172, 'ru', 'Товары'],
            [173, 'ru', 'Добавить Продукт'],
            [176, 'ru', 'Редактировать Модуль'],
            [177, 'ru', 'Модули'],
            [178, 'ru', 'Добавить Модуль'],
            [179, 'ru', 'Параметры Модуля'],
            [180, 'ru', 'Логин'],
            [182, 'ru', 'Вышеприведенная ошибка возникла во время обработки вашего запроса сервером.'],
            [183, 'ru', 'Пожалуйста, свяжитесь с нами если вы думаете, что это ошибка со стороны сервера. Спасибо.'],
            [184, 'ru', 'Редактировать Элемент'],
            [185, 'ru', 'Элементы'],
            [186, 'ru', 'Вопросы'],
            [187, 'ru', 'Добавить Вопрос'],
            [188, 'ru', 'Добавить Элемент'],
            [190, 'ru', 'Переводы Подписи к Ссылке'],
            [191, 'ru', 'Редактировать Меню'],
            [192, 'ru', 'Добавить Новый Элемент Меню'],
            [193, 'ru', 'Пользовательская ссылка'],
            [194, 'ru', 'Текстовый Элемент'],
            [195, 'ru', 'Количество Элементов'],
            [196, 'ru', 'Подпись'],
            [197, 'ru', 'Опции'],
            [198, 'ru', 'Показать Детали'],
            [199, 'ru', 'Скрыть Детали'],
            [200, 'ru', 'Добавить Элементы'],
            [201, 'ru', 'Добавить Страницы'],
            [202, 'ru', 'Добавить Ссылку'],
            [203, 'ru', 'Добавить Текстовый Элемент'],
            [204, 'ru', 'Выбрать Все'],
            [205, 'ru', 'Список Элементов'],
            [206, 'ru', 'Список не содержит элементов.'],
            [207, 'ru', 'Редактировать Письмо'],
            [208, 'ru', 'Просмотреть Письмо'],
            [209, 'ru', 'Письма'],
            [210, 'ru', 'Добавить Письмо'],
            [211, 'ru', 'Пометить как Непрочтенное'],
            [212, 'ru', 'Пометить как Прочтенное'],
            [214, 'ru', 'Email пользователя'],
            [215, 'ru', 'Редактировать Роль'],
            [216, 'ru', 'Роль Пользователя'],
            [217, 'ru', 'Права Доступа'],
            [218, 'ru', 'Пользователь не имеет прав для доступа в панель администрирования'],
            [219, 'ru', 'Супер админ имеет полный доступ к панели настроек'],
            [220, 'ru', 'Категории Страниц'],
            [222, 'ru', 'Редактировать Файл'],
            [223, 'ru', 'Медиа'],
            [224, 'ru', 'Добавить Файл'],
            [225, 'ru', 'Медиа-файлы'],
            [226, 'ru', 'Копия'],
            [227, 'ru', 'Медиа-файл'],
            [228, 'ru', 'Сгенерировано'],
            [229, 'ru', 'Експорт Данных'],
            [230, 'ru', 'Зайти в Свой Аккаунт'],
            [231, 'ru', 'Пожалуйста, заполните следующие поля для входа:'],
            [232, 'ru', 'Зайти с Помощью'],
            [233, 'ru', 'Если вы забыли пароль вы можете'],
            [234, 'ru', 'повторно установить его'],
            [235, 'ru', 'Пожалуйста, заполните следующие поля для регистрации:'],
            [236, 'ru', 'Зарегистрироваться'],
            [237, 'ru', 'Пожалуйста, введите вашу электронную почту. Ссылка на смену пароля будет выслана на эту почту.'],
            [238, 'ru', 'Сохранить'],
            [239, 'ru', 'Изменить Пароль'],
            [240, 'ru', 'Редактировать Профиль'],
            [241, 'ru', 'Компания веб-разработки'],
            [242, 'ru', 'Наша команда состоит из опытных веб-разработчиков, дизайнеров и менеджеров.'],
            [243, 'ru', 'Мы ищем новых клиентов или долгосрочные бизнес-отношения!'],
            [244, 'ru', 'Наняв специализированную команду Профессиональных веб-разработчиков и дизайнеров, а также других наших експертов вы можете быть уверены в том, что вам всегда будет предоставлен результат высокого качества в поставленные сроки.'],
            [245, 'ru', 'О Компании'],
            [246, 'ru', 'Блог'],
            [247, 'ru', 'Контактная Информация'],
            [248, 'ru', 'Контактный телефон'],
            [249, 'ru', 'Факс'],
            [251, 'ru', 'Напишите Нам Пару Строк'],
            [252, 'ru', 'Если у вас есть деловые предложения или другие вопросы, пожалуйста, заполните следующую форму чтобы связаться с нами. Спасибо.'],
            [253, 'ru', null],
            [254, 'ru', 'Полное Имя'],
            [255, 'ru', 'Отправить'],
            [256, 'ru', 'Домашняя Страница'],
            [257, 'ru', 'Свяжитесь С Нами'],
            [260, 'ru', 'Войти через Социальные Сети'],
            [261, 'ru', 'Спасибо за регистрацию. Ссылка для активации отправлена на {email} для подтверждения вашей электронной почты.'],
            [262, 'ru', 'Ошибка регистрации пользователя. Пожалуйста, исправьте ошибки валидации.'],
            [263, 'ru', 'Ваша регистрация подтверждена. Спасибо за использование нашего сайта.'],
            [264, 'ru', 'Ошибка ключа доступа. Пожалуйста, проверьте вашу ссылку для подтверждения.'],
            [265, 'ru', 'Ссылка на смену пароля отправлена на вашу электронную почту. Пожалуйста, проверьте вашу почту для получения дальнейших инструкций.'],
            [266, 'ru', 'Извините, мы не смогли поменять пароль для предоставленной электронной почты.'],
            [267, 'ru', 'Новый пароль успешно сохранен. Спасибо за использование нашего сайта.'],
            [268, 'ru', 'Спасибо, что связались с нами. Мы ответим вам в ближайший срок.'],
            [269, 'ru', 'Ошибка отправки письма.'],
            [270, 'ru', 'Отправить'],
            [271, 'ru', 'Полезные ссылки'],
            [272, 'ru', 'Если у вас есть какие-либо вопросы или пожелания, пожалуйста, {contact_link}'],
            [273, 'ru', 'свяжитесь с нами'],
            [274, 'ru', 'Авторское право'],
            [275, 'ru', 'Все Права Защищены'],
            [276, 'ru', 'Рубрики Содержимого'],
            [277, 'ru', 'Моя Компания'],
            [278, 'ru', 'Полезная Информация'],
            [279, 'ru', null],
            [280, 'ru', 'Поддержка'],
            [281, 'ru', 'Наши'],
            [282, 'ru', 'Данных'],
            [283, 'ru', 'Защита'],
            [284, 'ru', 'Категория не содержит элементов.'],
            [285, 'ru', 'Наша Команда'],
            [286, 'ru', 'Показать Все'],
            [287, 'ru', 'Информация о Продукте'],
            [288, 'ru', 'Новые Предложения'],
            [289, 'ru', 'от'],
            [290, 'ru', 'от'],
            [291, 'ru', 'Все Категории'],
            [292, 'ru', 'Последние Статьи'],
            [293, 'ru', 'Читать дальше'],
            [294, 'ru', 'Имя пользователя занято.'],
            [295, 'ru', 'Электронная почта занята.'],
            [296, 'ru', 'Неверный пароль сброса токена.'],
            [297, 'ru', 'Старый пароль некорректно введён.'],
            [298, 'ru', 'Пользователя с данной электронной почтой не существует.'],
            [299, 'ru', 'из'],
            [300, 'ru', 'Социальная cеть'],
            [301, 'ru', 'Аккаунты'],
            [302, 'ru', 'Общие'],
            [303, 'ru', 'Социальные cети'],
            [304, 'ru', 'Без категории'],
            [305, 'ru', 'Тип'],
            [306, 'ru', 'Подтверждение пароля'],
            [307, 'ru', 'Наследуемая'],
            [308, 'ru', 'Сделать Доступными Выделенные'],
            [309, 'ru', 'Сделать Недоступными Выделенные'],
            [310, 'ru', 'Еще'],
            [311, 'ru', 'Просмотр'],
            [312, 'ru', 'Да (наследовать подпись ссылки из текущей страницы)'],
            [313, 'ru', 'Нет (ввести подпись ссылки и ее переводы вручную)'],
            [314, 'ru', 'Каталог'],
            [315, 'ru', 'Вопросы'],
            [316, 'ru', 'Отменить'],
            [317, 'ru', 'Тестовый режим'],
            [318, 'ru', 'Извините, но у вас нет доступа для выполнения данного действия, потому что Вы получили доступ только на чтение.'],
            [319, 'ru', 'Назад'],
            [320, 'ru', 'Доступы для тестового администратора'],
            [321, 'ru', 'Имя пользователя/пароль'],
        ]);
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_i18n_translation_i18n_message', '{{%i18n_translation}}');
        $this->dropForeignKey('fk_i18n_translation_i18n_language', '{{%i18n_translation}}');

        $this->dropTable('{{%i18n_language}}');
        $this->dropTable('{{%i18n_translation}}');
        $this->dropTable('{{%i18n_message}}');
    }
}
