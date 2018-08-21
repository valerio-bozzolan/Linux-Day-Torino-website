<?php
# Linux Day 2016 - Construct a database chapter
# Copyright (C) 2016, 2017, 2018 Valerio Bozzolan, Linux Day Torino
#
# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU Affero General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU Affero General Public License for more details.
#
# You should have received a copy of the GNU Affero General Public License
# along with this program.  If not, see <http://www.gnu.org/licenses/>.

trait ChapterTrait {
	function getChapterID() {
		return $this->nonnull('chapter_ID');
	}

	function getChapterUID() {
		return $this->get('chapter_uid');
	}

	function getChapterName() {
		return _( $this->get('chapter_name') );
	}

	private function normalizeChapter() {
		$this->integers('chapter_ID');
	}
}

class Chapter extends Queried {
	use ChapterTrait;

	/**
	 * Database table name
	 */
	const T = 'chapter';

	/**
	 * Maximum UID length
	 *
	 * @override
	 */
	const MAXLEN_UID = 32;

	function __construct() {
		$this->normalizeChapter();
	}

	static function queryByUID( $chapter_uid ) {
		return self::factoryByUID( $chapter_uid )->queryRow();

	}
}
