<?php

/**
 * Contact Model
 * @author James Fairhurst <info@jamesfairhurst.co.uk>
 */
class Contact extends AppModel {

	/**
	 * Model Class name
	 * @param string
	 */
	public $name = 'Contact';

	/**
	 * Validation Rules
	 * @param array
	 */
	public $validate = array(
		'name' => 'notEmpty',
        'email' => array(
			'rule' => 'email',
			'message' => 'Please enter a valid Email Address'
		),
		'telephone' => array(
			'rule' => 'numeric',
			'message' => 'Please enter a numeric Telephone Number'
		),
		'message' => 'notEmpty'
    );
}