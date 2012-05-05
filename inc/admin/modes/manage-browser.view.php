<h2>Manage Browser</h2>
<?php

$addBrowser = new form(array('action'=>'?mode=manage-browser&id='.$browser->Browser_ID));
$addBrowser->setInputField(array('name'=>'Browser_Name', 'placeholder'=>'Chrome,Opera,etc', 'required'=>true, 'value'=>$browser->Browser_Name), 'Browser Name: ', true);
$addBrowser->setInputField(array('name'=>'Browser_MajorVer', 'type'=>'number', 'placeholder'=>'0 for default, or like 17', 'required'=>true, 'value'=>$browser->Browser_MajorVer), 'Major Version: ', true);

$platformOptions = $addBrowser->setSelectField(array('name'=>'Platform_ID', 'value'=>$browser->Platform_ID), 'Platform: ', TRUE);
$platforms = platform::getPlatforms();
foreach($platforms as $platform){
	$platformOptions->addOption($platform->Platform_ID, $platform->Platform_Name);
}

$addBrowser->setTextArea(array('name'=>'Browser_HowTo', 'placeholder'=>'Steps here.', 'required'=>true, 'value'=>$browser->Browser_HowTo), 'How To: ', true);

//$addBrowser->setInputField(array('name'=>'Browser_worked', 'type'=>'number', 'placeholder'=>'0', 'required'=>true, 'value'=>$browser->Browser_worked), 'Worked: ', true);
//$addBrowser->setInputField(array('name'=>'Browser_failed', 'type'=>'number', 'placeholder'=>'0', 'required'=>true, 'value'=>$browser->Browser_failed), 'Failed: ', true);

$addBrowser->setInputField(array('name'=>'submit', 'value'=>'Submit', 'type'=>'Submit'));

if($addBrowser->isSent() && $addBrowser->validInput()){
	// It's been sent and it's valid. Do something with the data.
	// Use $_POST['name'] to access data, but you can also use $myForm->getInputValue('name')
	
	if($browser->Browser_ID == false){ // Were adding a new listing;
		$browser = $browser->add($_POST['Browser_Name'], $_POST['Browser_HowTo'], $_POST['Browser_MajorVer'], $_POST['Platform_ID']);
		
		$addBrowser->form_attr['action'] = '?mode=manage-browser&id='.$browser->Browser_ID; // Update the form to go to update.
	
		$notices->add('Browser has been added!');
	}else{
		$browser->Browser_Name = $_POST['Browser_Name'];
		$browser->Browser_HowTo = $_POST['Browser_HowTo'];
		$browser->Browser_MajorVer = $_POST['Browser_MajorVer'];
		$browser->Platform_ID = $_POST['Platform_ID'];
		
		$browser->update();
		
		$notices->add('Browser has been updated!');
	}
}

if(isset($_GET['delete'])){
	$browser->delete();
	$notices->add('Browser has been deleted :/');
	$addBrowser = new form();
}

if(is_array($notices->notices)){ // If there is an notice to display.
	$notices->display();
}

$addBrowser->display();

if($browser->Browser_ID !== false){
	echo '<p id="deleteButton">Or '.$browser->deleteURL().' this Browser</p>';
}
?>