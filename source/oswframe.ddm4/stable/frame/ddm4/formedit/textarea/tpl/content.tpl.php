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

?>

<div class="form-group<?php if(osW_Form::getInstance()->getFormError($element)):?> has-error<?php endif?> ddm_element_<?php echo $this->getEditElementValue($ddm_group, $element, 'id')?>">
	<label<?php if($this->getEditElementOption($ddm_group, $element, 'read_only')!==true):?> for="<?php echo $element?>"<?php endif?> class="control-label"><?php echo h()->outputString($this->getEditElementValue($ddm_group, $element, 'title'))?><?php if($this->getEditElementOption($ddm_group, $element, 'required')===true):?><?php echo $this->getGroupMessage($ddm_group, 'form_title_required_icon')?><?php endif?><?php echo $this->getGroupMessage($ddm_group, 'form_title_closer')?></label>
	<?php if($this->getEditElementOption($ddm_group, $element, 'read_only')===true):?>
		<?php echo osW_Form::getInstance()->drawHiddenField($element, $this->getEditElementStorage($ddm_group, $element), array())?>
		<div class="form-control readonly"><?php echo h()->_outputString($this->getEditElementStorage($ddm_group, $element));?></div>
	<?php else:?>
		<?php echo osW_Form::getInstance()->drawTextareaField($element, $this->getEditElementStorage($ddm_group, $element), array('input_class'=>'form-control'));?>
	<?php endif?>
	<?php if(osW_Form::getInstance()->getFormError($element)):?>
		<span class="help-block"><?php echo osW_Form::getInstance()->getFormErrorMessage($element)?></span>
	<?php elseif($this->getEditElementOption($ddm_group, $element, 'notice')!=''):?>
		<span class="help-block"><?php echo h()->outputString($this->getEditElementOption($ddm_group, $element, 'notice'))?></span>
	<?php endif?>
	<?php if($this->getEditElementOption($ddm_group, $element, 'buttons')!=''):?>
		<div class="button-group">
		<?php echo implode(' ', $this->getEditElementOption($ddm_group, $element, 'buttons'))?>
		</div>
	<?php endif?>
</div>