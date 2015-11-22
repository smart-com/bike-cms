<?php

	/**
	 * Если я могу определить константы так,
	 * то зачем мне вызывать функцию???
	 */

	const DB_NAME = 'BIKECMS';
	const DB_USER = 'root';
	const DB_PASSWORD = '';
	const DB_HOST = 'localhost';
	const CHARSET = 'utf8';

	const DIR_BASE = __ROOT__ . '/';
	const DIR_MODEL = DIR_BASE . 'models/';
	const DIR_CTRL = DIR_BASE . 'controllers/';
	const DIR_VIEW = DIR_BASE . 'templates/';

	const DEFAULT_CTRL = 'Article';
	const DEFAULT_ACTION = 'Index';
	const DEFAULT_LAYOUT = 'layout.tpl';

	const CONTENT_TPL_VAR = 'content_tpl';

