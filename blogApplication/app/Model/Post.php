<?php
class Post extends AppModel {

    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'body' => array(
            'rule' => 'notEmpty'
        )
    );
    public function isOwnedBy($post, $user) {
        return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
    }

    public function getUserImg($user) {
        $image_url = $this->query('SELECT `image_url` FROM users WHERE `id` ='.$user);
        //var_dump($image_url[0]['users']['image_url']);
        return $image_url[0]['users']['image_url'];
    }
}