<?php

//namespace app\components;

/*
 * CommonProperties to store variables used for connexion etc.
 * @author nicolas malservet
 * @since version 0.16
 */

class CommonProperties
{
    /*
     * DEV MODE : true or false.
     * if true activate some refrences to the server to localhost and send mails to the from mail ( admin mail)
     */
    public static $DEV_MODE = true;
    /*
     * connection string used in ./protected/config/main_dev.php
     */
    public static $CONNECTION_STRING = 'mysql:host=localhost;dbname=biobankapps';
    public static $CONNECTION_LOGIN = 'root';
    public static $CONNECTION_PASSWORD = 'root';
    /**
     * Mail system active: true if you want to send email.
     */
    public static $MAIL_SYSTEM_ACTIVE = true;
    /*
     * Admin email to send mails in case of errors or news.
     */
    public static $ADMIN_EMAIL = 'matthieu.penicaud@inserm.fr';
    /*
     * SMTP Sender. Allow the script sendmailcommand to send mails via smtp with autentication
     */
    public static $SMTP_SENDER_HOST = 'ebiobanques.fr';
    public static $SMTP_SENDER_PORT = '25';
    public static $SMTP_SENDER_USERNAME = 'robot@ebiobanques.fr';
    public static $SMTP_SENDER_PASSWORD = 'ia4ever@2014';
    public static $SMTP_SENDER_FROM_EMAIL = 'robot@ebiobanques.fr';
}