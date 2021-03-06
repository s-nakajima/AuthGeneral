<?php
/**
 * AuthGeneral Controller
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('AuthGeneralAppController', 'AuthGeneral.Controller');

/**
 * AuthGeneral Controller
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\AuthGeneral\Controller
 */
class AuthGeneralController extends AuthGeneralAppController {

/**
 * ログイン処理
 *
 * @return void
 **/
	public function login() {
		$this->view = 'Auth.Auth/login';
		parent::login();
	}
}
