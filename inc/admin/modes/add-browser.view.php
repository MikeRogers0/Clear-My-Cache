<h2>Add Browser</h2>
<?php
$addBrowser = new form();
$addBrowser->setInputField(array('name'=>'Browser', 'placeholder'=>'Chrome', 'required'=>true), 'Browser: ', true);
$addBrowser->setInputField(array('name'=>'Browser_MajorVer', 'type'=>'number', 'placeholder'=>'17', 'required'=>true), 'Major Version: ', true);

$addBrowser->setTextArea(array('name'=>'Browser_HowTo', 'placeholder'=>'<p>Press clear cache.</p>', 'required'=>true), 'How To: ', true);

$platformOptions = $addBrowser->setSelectField(array('name'=>'Platform'), 'Platform: ', TRUE);
$platforms = platform::getPlatforms();
foreach($platforms as $platform){
	$platformOptions->addOption($platform->ID, $platform->Platform, false);
}

$addBrowser->setInputField(array('name'=>'Browser_worked', 'type'=>'number', 'placeholder'=>'0', 'required'=>true, 'value'=>'0'), 'Worked: ', true);
$addBrowser->setInputField(array('name'=>'Browser_failed', 'type'=>'number', 'placeholder'=>'0', 'required'=>true, 'value'=>'0'), 'Failed: ', true);

$addBrowser->setInputField(array('name'=>'submit', 'value'=>'Submit', 'type'=>'Submit'));

if($addBrowser->isSent() && $addBrowser->validInput()){
	// It's been sent and it's valid. Do something with the data.
	// Use $_POST['name'] to access data, but you can also use $myForm->getInputValue('name')
	$notices->add('The form has worked!');
}

if(is_array($notices->notices)){ // If there is an notice to display.
	$notices->display();
}

$addBrowser->display();
?>