<?php
/**
 * @author: freefcw
 * Date: 12/28/13
 * Time: 2:17 PM
 */

class Model_Mail extends Model_Base
{
    static $cols = array(
        'mail_id',
        'to_user',
        'from_user',
        'title',
        'content',
        'new_mail',
        'reply',
        'in_date',
        'defunct',
    );

    static $primary_key = 'mail_id';
    static $table = 'mail';

    public $mail_id;
    public $to_user;
    public $from_user;
    public $title;
    public $content;
    public $new_mail;
    public $reply;
    public $in_date;
    public $defunct;

    /**
     * @param     $username
     * @param int $page
     * @param int $limit
     *
     * @return Model_Mail
     */
    public static function find_user_inbox($username, $page = 1, $limit =  20)
    {
        $filter = array(
            'to_user' => $username,
        );

        return self::find($filter, $page, $limit);
    }

    /**
     * @param     $username
     * @param int $page
     * @param int $limit
     *
     * @return Model_Mail
     */
    public static function find_user_outbox($username, $page = 1, $limit = 20)
    {
        $filter = array(
            'from_user' => $username,
        );

        return self::find($filter, $page, $limit);
    }

    protected function initial_data()
    {
        $this->new_mail = 1;
        $this->in_date = OJ::format_time();
        $this->reply = 0;
        $this->defunct = 'N';
    }

    public function validate()
    {}
}