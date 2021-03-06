<?php
/**
 * AuthGeneralController::logout()のテスト
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('NetCommonsControllerTestCase', 'NetCommons.TestSuite');
App::uses('TestAuthGeneral', 'AuthGeneral.TestSuite');

/**
 * AuthGeneralController::logout()のテスト
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\AuthGeneral\Test\Case\Controller
 */
class AuthGeneralControllerLogoutTest extends NetCommonsControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array();

/**
 * Plugin name
 *
 * @var array
 */
	public $plugin = 'auth_general';

/**
 * Controller name
 *
 * @var string
 */
	protected $_controller = 'auth_general';

/**
 * ログイン状態と判定させるMock生成する
 *
 * @return void
 */
	protected function _mockLoggedIn() {
		TestAuthGeneral::login($this);
	}

/**
 * ログアウトのテスト
 *
 * @return void
 */
	public function testLogout() {
		//ログイン状態と判定させるMock生成
		$this->_mockLoggedIn();
		$this->assertTrue($this->controller->Auth->loggedIn());

		$this->testAction('/auth_general/auth_general/logout', array(
			'data' => array(),
		));

		$this->assertFalse($this->controller->Auth->loggedIn());
	}
}
