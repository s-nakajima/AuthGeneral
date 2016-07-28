<?php
/**
 * TestAuthGeneral
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('AuthComponent', 'Controller/Component');
App::uses('Role', 'Roles.Model');
App::uses('UserRole', 'UserRoles.Model');

/**
 * TestAuthGeneral
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\AuthGeneral\TestSuite
 * @codeCoverageIgnore
 */
class TestAuthGeneral {

/**
 * Roles data for testing
 *
 * @var array
 */
	public static $roles = [
		Role::ROOM_ROLE_KEY_ROOM_ADMINISTRATOR => [
			'id' => '1',
			'username' => 'admin',
			'password' => 'admin',
			'role_key' => 'system_administrator',
			'handlename' => 'handle of admin',
			'email' => 'system_admin@exapmle.com',
		],
		Role::ROOM_ROLE_KEY_CHIEF_EDITOR => [
			'id' => '2',
			'username' => 'chief_editor',
			'password' => 'chief_editor',
			'role_key' => 'administrator',
			'handlename' => 'chief_editor of admin'
		],
		Role::ROOM_ROLE_KEY_EDITOR => [
			'id' => '3',
			'username' => 'editor',
			'password' => 'editor',
			'role_key' => 'common_user',
			'handlename' => 'editor of admin'
		],
		Role::ROOM_ROLE_KEY_GENERAL_USER => [
			'id' => '4',
			'username' => 'general_user',
			'password' => 'general_user',
			'role_key' => 'common_user',
			'handlename' => 'general_user of admin'
		],
		Role::ROOM_ROLE_KEY_VISITOR => [
			'id' => '5',
			'username' => 'visitor',
			'password' => 'visitor',
			'role_key' => 'common_user',
			'handlename' => 'visitor of admin'
		],
		UserRole::USER_ROLE_KEY_SYSTEM_ADMINISTRATOR => [
			'id' => '1',
			'username' => 'admin',
			'password' => 'admin',
			'role_key' => 'system_administrator',
			'handlename' => 'handle of admin'
		],
		UserRole::USER_ROLE_KEY_ADMINISTRATOR => [
			'id' => '2',
			'username' => 'chief_editor',
			'password' => 'chief_editor',
			'role_key' => 'administrator',
			'handlename' => 'chief_editor of admin'
		],
		UserRole::USER_ROLE_KEY_COMMON_USER => [
			'id' => '4',
			'username' => 'general_user',
			'password' => 'general_user',
			'role_key' => 'common_user',
			'handlename' => 'general_user of admin'
		],
	];

/**
 * Call logout action
 *
 * @param CakeTestCase $test CakeTestCase instance
 * @return void
 */
	public static function logout($test) {
		CakeSession::write('Auth.User', null);
	}

/**
 * Login as given roles
 *
 * @param CakeTestCase $test CakeTestCase instance
 * @param string $role role key
 * @return void
 */
	public static function login(CakeTestCase $test, $role = Role::ROOM_ROLE_KEY_ROOM_ADMINISTRATOR) {
		$test->controller->Components->Auth
			->staticExpects($test->any())
			->method('user')
			->will($test->returnCallback(function ($key = null) use ($role) {
				CakeSession::write('Auth.User', self::$roles[$role]);
				Current::$current['Permission']['html_not_limited']['value'] = true;
				if (isset(self::$roles[$role][$key])) {
					return self::$roles[$role][$key];
				} else {
					return self::$roles[$role];
				}
			}));

		$test->controller->Components->Auth->login([
			'username' => self::$roles[$role]['username'],
			'password' => self::$roles[$role]['password'],
		]);
	}

}
