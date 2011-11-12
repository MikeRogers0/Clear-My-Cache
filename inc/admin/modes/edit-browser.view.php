<h2>Edit Browser</h2>
<?php
$addPlatform = new form();
$addPlatform->setInputField(array('name'=>'Platform', 'placeholder'=>'Mac', 'required'=>true), 'Platform: ', true);

$addPlatform->setTextArea(array('name'=>'Platform_HowTo', 'placeholder'=>'<p>Open Terminal right…</p>', 'required'=>true), 'How To: ', true);

$addPlatform->setInputField(array('name'=>'Platform_worked', 'type'=>'number', 'placeholder'=>'0', 'required'=>true, 'value'=>'0'), 'Worked: ', true);
$addPlatform->setInputField(array('name'=>'Platform_failed', 'type'=>'number', 'placeholder'=>'0', 'required'=>true, 'value'=>'0'), 'Failed: ', true);

$addPlatform->setInputField(array('name'=>'submit', 'value'=>'Submit', 'type'=>'Submit'));

if($addPlatform->isSent() && $addPlatform->validInput()){
	// It's been sent and it's valid. Do something with the data.
	// Use $_POST['name'] to access data, but you can also use $myForm->getInputValue('name')
	$notices->add('The form has worked!');
}

if(is_array($notices->notices)){ // If there is an notice to display.
	$notices->display();
}

$addPlatform->display();
?>