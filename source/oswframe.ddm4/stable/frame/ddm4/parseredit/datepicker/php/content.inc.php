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

$fields=array();
$fields['element']=$element;
$fields['element_title']=$this->getEditElementValue($ddm_group, $element, 'title');
$this->setFilterElementStorage($ddm_group, $element, $fields);
$this->setFilterErrorElementStorage($ddm_group, $element, false);

if ($this->getEditElementOption($ddm_group, $element, 'required')===true) {
	if ((strlen($this->getDoEditElementStorage($ddm_group, $element))!=8)&&($this->getDoEditElementStorage($ddm_group, $element)=='00000000')) {
		osW_Form::getInstance()->addFormError($element, h()->_setText($this->getGroupMessage($ddm_group, 'validation_element_miss'), $this->getFilterElementStorage($ddm_group, $element)));
		osW_MessageStack::getInstance()->add('form', 'error', array('msg'=>h()->_setText($this->getGroupMessage($ddm_group, 'validation_element_miss'), $this->getFilterElementStorage($ddm_group, $element))));
		$this->setFilterErrorElementStorage($ddm_group, $element, true);
	}
}

if (($this->getFilterErrorElementStorage($ddm_group, $element)!==true)&&($this->getDoEditElementStorage($ddm_group, $element)!='')&&($this->getDoEditElementStorage($ddm_group, $element)!='00000000')) {
	if(checkdate(substr($this->getDoEditElementStorage($ddm_group, $element), 4, 2), substr($this->getDoEditElementStorage($ddm_group, $element), 6, 2), substr($this->getDoEditElementStorage($ddm_group, $element), 0, 4))!==true) {
		osW_Form::getInstance()->addFormError($element, h()->_setText($this->getGroupMessage($ddm_group, 'validation_element_incorrect'), $this->getFilterElementStorage($ddm_group, $element)));
		osW_MessageStack::getInstance()->add('form', 'error', array('msg'=>h()->_setText($this->getGroupMessage($ddm_group, 'validation_element_incorrect'), $this->getFilterElementStorage($ddm_group, $element))));
		$this->setFilterErrorElementStorage($ddm_group, $element, true);
	}
}

if (($this->getFilterErrorElementStorage($ddm_group, $element)!==true)&&($this->getEditElementValidation($ddm_group, $element, 'value_min')!='')) {
	if ($this->getDoEditElementStorage($ddm_group, $element)<$this->getEditElementValidation($ddm_group, $element, 'value_min')) {
		osW_Form::getInstance()->addFormError($element, h()->_setText($this->getGroupMessage($ddm_group, 'validation_element_tosmall'), $this->getFilterElementStorage($ddm_group, $element)));
		osW_MessageStack::getInstance()->add('form', 'error', array('msg'=>h()->_setText($this->getGroupMessage($ddm_group, 'validation_element_tosmall'), $this->getFilterElementStorage($ddm_group, $element))));
		$this->setFilterErrorElementStorage($ddm_group, $element, true);
	}
}

if (($this->getFilterErrorElementStorage($ddm_group, $element)!==true)&&($this->getEditElementValidation($ddm_group, $element, 'value_max')!='')) {
	if ($this->getDoEditElementStorage($ddm_group, $element)>$this->getEditElementValidation($ddm_group, $element, 'value_max')) {
		osW_Form::getInstance()->addFormError($element, h()->_setText($this->getGroupMessage($ddm_group, 'validation_element_tobig'), $this->getFilterElementStorage($ddm_group, $element)));
		osW_MessageStack::getInstance()->add('form', 'error', array('msg'=>h()->_setText($this->getGroupMessage($ddm_group, 'validation_element_tobig'), $this->getFilterElementStorage($ddm_group, $element))));
		$this->setFilterErrorElementStorage($ddm_group, $element, true);
	}
}

if (($this->getFilterErrorElementStorage($ddm_group, $element)!==true)&&($this->getEditElementValidation($ddm_group, $element, 'preg')!='')) {
	if (!preg_match($this->getEditElementValidation($ddm_group, $element, 'preg'), $this->getDoEditElementStorage($ddm_group, $element))) {
		osW_Form::getInstance()->addFormError($element, h()->_setText($this->getGroupMessage($ddm_group, 'validation_element_regerror'), $this->getFilterElementStorage($ddm_group, $element)));
		osW_MessageStack::getInstance()->add('form', 'error', array('msg'=>h()->_setText($this->getGroupMessage($ddm_group, 'validation_element_regerror'), $this->getFilterElementStorage($ddm_group, $element))));
		$this->setFilterErrorElementStorage($ddm_group, $element, true);
	}
}

if (($this->getFilterErrorElementStorage($ddm_group, $element)!==true)&&(is_array($this->getEditElementValidation($ddm_group, $element, 'filter')))) {
	foreach ($this->getEditElementValidation($ddm_group, $element, 'filter') as $filter => $values) {
		if (($this->getFilterErrorElementStorage($ddm_group, $element)!==true)) {
			$values['module']=$filter;
			$this->parseFilterEditElementPHP($ddm_group, $element, $values);
		}
	}
}

?>