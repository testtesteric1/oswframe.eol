<?php

/*
 * Author: Juergen Schwind
 * Copyright: Juergen Schwind
 * Link: http://oswframe.com
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details:
 * http://www.gnu.org/licenses/gpl.html
 *
 */

if (!in_array($data[$element], array('', '0', '0.0', '%'))) {
	$ddm_search_case_array[]=$this->getGroupOption($ddm_group, 'alias', 'database').'.'.$options['name'].' LIKE \'%'.osW_Database::getInstance()->escape_string($data[$element]).'%\'';
}

?>