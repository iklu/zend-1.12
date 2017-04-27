<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Application_Model_GuestbookMapper
 *
 * @author ovidiu.dragoi
 */
class Application_Model_GuestbookMapper {
    public function save(Application_Model_Guestbook $guestbook);
    public function find($id);
    public function fetchAll();
}
