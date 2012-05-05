<h2>Manage Platform</h2>
<?php

$addPlatform = new form(array('action'=>'?mode=manage-platform&id='.$platform->Platform_ID));
$addPlatform->setInputField(array('name'=>'Platform_Name', 'placeholder'=>'Mac,Windows,Linux', 'required'=>true, 'value'=>$platform->Platform_Name), 'Platform Name: ', true);

$addPlatform->setTextArea(array('name'=>'Platform_HowTo', 'placeholder'=>'Steps here', 'required'=>true, 'value'=>$platform->Platform_HowTo), 'How To: ', true);

//$addPlatform->setInputField(array('name'=>'Platform_worked', 'type'=>'number', 'placeholder'=>'0', 'value'=>$platform->Platform_worked), 'Worked: ', true);
//$addPlatform->setInputField(array('name'=>'Platform_failed', 'type'=>'number', 'placeholder'=>'0', 'value'=>$platform->Platform_failed), 'Failed: ', true);

$addPlatform->setInputField(array('name'=>'submit', 'value'=>'Submit', 'type'=>'Submit'));

if($addPlatform->isSent() && $addPlatform->validInput()){
	// It's been sent and it's valid. Do something with the data.
	// Use $_POST['name'] to access data, but you can also use $myForm->getInputValue('name')
	
	if($platform->Platform_ID == false){ // Were adding a new listing
		$platform = $platform->add($_POST['Platform_Name'], $_POST['Platform_HowTo']);
		
		$addPlatform->form_attr['action'] = '?mode=manage-platform&id='.$platform->Platform_ID; // Update the form to go to update.
		
		$notices->add('Platform has been added!');
	}else{
		$platform->Platform_Name = $_POST['Platform_Name'];
		$platform->Platform_HowTo = $_POST['Platform_HowTo'];
	
		$platform->update();
		
		$notices->add('Platform has been updated!');
	}
}

if(isset($_GET['delete'])){
	$platform->delete();
	$notices->add('Platform has been deleted :/');
	$addPlatform = new form();
}

if(is_array($notices->notices)){ // If there is an notice to display.
	$notices->display();
}

$addPlatform->display();


if($platform->Platform_ID !== false){
	echo '<p>Or '.$platform->deleteURL().' this Platform</p>';
}
?>