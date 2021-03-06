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
			'UserRoleSetting' => [
				'id' => '1',
				'role_key' => 'system_administrator',
				'origin_role_key' => 'system_administrator',
				'use_private_room' => '1',
			],
		],
		Role::ROOM_ROLE_KEY_CHIEF_EDITOR => [
			'id' => '2',
			'username' => 'chief_editor',
			'password' => 'chief_editor',
			'role_key' => 'administrator',
			'handlename' => 'chief_editor of admin',
			'UserRoleSetting' => [
				'id' => '2',
				'role_key' => 'administrator',
				'origin_role_key' => 'administrator',
				'use_private_room' => '1',
			],
		],
		Role::ROOM_ROLE_KEY_EDITOR => [
			'id' => '3',
			'username' => 'editor',
			'password' => 'editor',
			'role_key' => 'common_user',
			'handlename' => 'editor of admin',
			'UserRoleSetting' => [
				'id' => '3',
				'role_key' => 'common_user',
				'origin_role_key' => 'common_user',
				'use_private_room' => '1',
			],
		],
		Role::ROOM_ROLE_KEY_GENERAL_USER => [
			'id' => '4',
			'username' => 'general_user',
			'password' => 'general_user',
			'role_key' => 'common_user',
			'handlename' => 'general_user of admin',
			'UserRoleSetting' => [
				'id' => '3',
				'role_key' => 'common_user',
				'origin_role_key' => 'common_user',
				'use_private_room' => '1',
			],
		],
		Role::ROOM_ROLE_KEY_VISITOR => [
			'id' => '5',
			'username' => 'visitor',
			'password' => 'visitor',
			'role_key' => 'common_user',
			'handlename' => 'visitor of admin',
			'UserRoleSetting' => [
				'id' => '3',
				'role_key' => 'common_user',
				'origin_role_key' => 'common_user',
				'use_private_room' => '1',
			],
		],
		UserRole::USER_ROLE_KEY_SYSTEM_ADMINISTRATOR => [
			'id' => '1',
			'username' => 'admin',
			'password' => 'admin',
			'role_key' => 'system_administrator',
			'handlename' => 'handle of admin',
			'UserRoleSetting' => [
				'id' => '1',
				'role_key' => 'system_administrator',
				'origin_role_key' => 'system_administrator',
				'use_private_room' => '1',
			],
		],
		UserRole::USER_ROLE_KEY_ADMINISTRATOR => [
			'id' => '2',
			'username' => 'chief_editor',
			'password' => 'chief_editor',
			'role_key' => 'administrator',
			'handlename' => 'chief_editor of admin',
			'UserRoleSetting' => [
				'id' => '2',
				'role_key' => 'administrator',
				'origin_role_key' => 'administrator',
				'use_private_room' => '1',
			],
		],
		UserRole::USER_ROLE_KEY_COMMON_USER => [
			'id' => '4',
			'username' => 'general_user',
			'password' => 'general_user',
			'role_key' => 'common_user',
			'handlename' => 'general_user of admin',
			'UserRoleSetting' => [
				'id' => '3',
				'role_key' => 'common_user',
				'origin_role_key' => 'common_user',
				'use_private_room' => '1',
			],
		],
	];

/**
 * Call logout action
 *
 * @param CakeTestCase $test CakeTestCase instance
 * @return void
 */
	public static function logout($test) {
		$reflectionClass = new ReflectionClass('AuthComponent');
		$property = $reflectionClass->getProperty('_user');
		$property->setAccessible(true);
		$property->setValue($test->controller->Components->Auth, []);
	}

/**
 * Login as given roles
 *
 * @param CakeTestCase $test CakeTestCase instance
 * @param string $role role key
 * @return void
 */
	public static function login(CakeTestCase $test, $role = Role::ROOM_ROLE_KEY_ROOM_ADMINISTRATOR) {
		$reflectionClass = new ReflectionClass('AuthComponent');
		$property = $reflectionClass->getProperty('_user');
		$property->setAccessible(true);
		if (isset(self::$roles[$role])) {
			$property->setValue($test->controller->Components->Auth, self::$roles[$role]);
		} else {
			$property->setValue($test->controller->Components->Auth, []);
		}
	}

}
