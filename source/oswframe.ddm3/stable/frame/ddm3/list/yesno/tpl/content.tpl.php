<?php

/*
 * Author: Juergen Schwind
 * Copyright: 2011 Juergen Schwind
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

?>

<td class="table_ddm_col table_ddm_col_data ddm_element_<?php echo $this->getListElementValue($ddm_group, $element, 'id') ?>">
	<?php if ($this->getListStorageValue($ddm_group, $this->getListElementValue($ddm_group, $element, 'name'))==1): ?><?php echo h()->_outputString($this->getListElementOption($ddm_group, $element, 'text_yes')) ?><?php else: ?><?php echo h()->_outputString($this->getListElementOption($ddm_group, $element, 'text_no')) ?><?php endif ?>
</td>