# This file should contain all the record creation needed to seed the database with its default values.
# The data can then be loaded with the rake db:seed (or created alongside the db with db:setup).
#
# Examples:
#
#   cities = City.create([{ name: 'Chicago' }, { name: 'Copenhagen' }])
#   Mayor.create(name: 'Emanuel', city: cities.first)

Cmcplatform.create([
	{
		name: 'All',
		slug: 'all',
		howto: '',
	},
	{
		name: 'Windows',
		slug: 'windows',
		howto: '<ul>
						<li class="step">
							<h4>Step 1.</h4>
							<div class="details">
								<p>
									Open Terminal<br />
									Press <strong>cmd + shift + backspace</strong> together
								</p>
							</div>
						</li>
						<li class="step">
							<h4>Step 2.</h4>
							<div class="details">
								<p>
									Select time range to <strong>Everything</strong> or desired time range. We also recommend selecting Cookies. And click <strong>Clear Now</strong>.
								</p>
							</div>
						</li>
					</ul>',
	},
	{
		name: 'Mac',
		slug: 'mac',
		howto: '<ul>
	<li class="step">
		<h4>Step 1.</h4>
		<div class="details">
			<p>
				Open Spotlight<br />
				Press <strong>cmd + spacebar</strong> together
			</p>
		</div>
	</li>
	<li class="step">
		<h4>Step 2.</h4>
		<div class="details">
			<p>
				Click the <strong>Terminal</strong> option from the dropdown.
			</p>
			<p>
				<img src="/assets/instructions/os/mac/spotlight.jpg" alt="spotlight" width="290" height="91" />
			</p>
		</div>
	</li>
	<li class="step">
		<h4>Step 3.</h4>
		<div class="details">
			<p>
				Type <strong>dscacheutil -flushcache</strong> &amp; press enter.
			</p>
			<p>
				<img src="/assets/instructions/os/mac/terminal.jpg" alt="terminal" width="290" height="114" />
			</p>
		</div>
	</li>
</ul>',
	},
	{
		name: 'iOS',
		slug: 'ios',
		howto: '<ul>
	<li class="step">
		<h4>Step 1.</h4>
		<div class="details">
			<p>
				Turn device on and off.
			</p>
		</div>
</ul>',
	},
	{
		name: 'Android',
		slug: 'android',
		howto: '<ul>
	<li class="step">
		<h4>Step 1.</h4>
		<div class="details">
			<p>
				Turn device on and off.
			</p>
		</div>
</ul>',
	}
]);

Cmcbrowser.create([
	{
		name: 'Chrome',
		slug: 'chrome',
		version: '1',
		howto: '<ul>
	<li class="step">
		<h4>Step 1.</h4>
		<div class="details">
			<p>
				Open Chrome<br />
				Press <strong>cmd + shift + backspace</strong> together
			</p>
		</div>
	</li>
	<li class="step">
		<h4>Step 2.</h4>
		<div class="details">
			<p>
				Select <strong>the beginning of time</strong> in the select box<br />
				Make sure the <strong>Empty the cache</strong> box is checked
			</p>
			<p>
				<img src="/assets/instructions/browser/mac/chrome/clear-cache-box.jpg" alt="clear-cache-box" width="290" height="162" />
			</p>
		</div>
	</li>
	<li class="step">
		<h4>Step 3.</h4>
		<div class="details">
			<p>
				Press the button labeled <strong>Clear Browsing Data</strong>
			</p>
		</div>
	</li>
</ul>',
		cmcplatform_id: 1,
	},
	{
		name: 'Firefox',
		slug: 'firefox',
		version: '1',
		howto: '<ul>
	<li class="step">
		<h4>Step 1.</h4>
		<div class="details">
			<p>
				Open Firefox<br />
				Press <strong>cmd + shift + backspace</strong> together
			</p>
		</div>
	</li>
	<li class="step">
		<h4>Step 2.</h4>
		<div class="details">
			<p>
				A box will pop up titled <strong>Clear All History</strong><br />
				Select <strong>Everything</strong> from the <strong>Time range to clear</strong> dropbox
			</p>
			<p>
				<img src="/assets/instructions/browser/mac/firefox/clear-all-history.jpg" alt="clear-all-history" width="290" height="296" />
			</p>
		</div>
	</li>
	<li class="step">
		<h4>Step 2.</h4>
		<div class="details">
			<p>
				Make sure the <strong>Cache</strong> checkbox is ticked<br />
				Press <strong>Clear Now</strong>
			</p>
		</div>
	</li>
</ul>',
		cmcplatform_id: 1,
	},
	{
		name: 'Opera',
		slug: 'opera',
		version: '1',
		howto: '<ul>
	<li class="step">
		<h4>Step 1.</h4>
		<div class="details">
			<p>
				Open Opera<br />
				Click on the <strong>Opera</strong> tab in the top left corner of the screen
			</p>
            <p>
				<img src="/assets/instructions/browser/windows/opera/open_menu.jpg" alt="open-options-menu" width="171" height="118" />
			</p>
		</div>
	</li>
	<li class="step">
		<h4>Step 2.</h4>
		<div class="details">
			<p>
				Under <strong>Settings</strong><br />
				Click on the option for <strong>Delete Private Data</strong>
			</p>
			<p>
				<img src="/assets/instructions/browser/windows/opera/open_menu_select.jpg" alt="open-menu-select" width="383" height="446" />
			</p>
		</div>
	</li>
    <li class="step">
		<h4>Step 3.</h4>
		<div class="details">
			<p>
				In the pop up window that is displayed click on the label <strong>Detailed Options</strong> to expand it<br />
				Then make sure that the <strong>Delete Entire Cache</strong> option is selected<br/>
                Click on the <strong>Delete</strong> button
			</p>
			<p>
				<img src="/assets/instructions/browser/windows/opera/delete_private_data.jpg" alt="delete-private-data" width="385" height="539" />
			</p>
		</div>
	</li>
</ul>',
		cmcplatform_id: 1,
	},
	{
		name: 'Safari',
		slug: 'safari',
		version: '1',
		howto: '<ul>
	<li class="step">
		<h4>Step 1.</h4>
		<div class="details">
			<p>
				Open Safari<br />
				Press <strong>alt + cmd + E</strong> together
			</p>
		</div>
	</li>
	<li class="step">
		<h4>Step 2.</h4>
		<div class="details">
			<p>
				A box will pop up with the title <strong>Are you sure you want to empty the cache?</strong><br />
				Click the button labeled <strong>Empty</strong>
			</p>
			<p>
				<img src="/assets/instructions/browser/mac/safari/are-you-sure.jpg" alt="are-you-sure" width="290" height="126" />
			</p>
		</div>
	</li>
</ul>',
		cmcplatform_id: 1,
	},
	{
		name: 'IE',
		slug: 'ie',
		version: '6',
		howto: '<ul>
	<li class="step">
		<h4>Step 1.</h4>
		<div class="details">
			<p>
				Open Internet Explorer<br />
				Click on the <strong>Tools</strong> option and then select <strong>Internet Options</strong>
			</p>
            <p>
				<img src="/assets/instructions/browser/windows/ie/internet-options.jpg" alt="internet-options" width="218" height="227" />
			</p>
		</div>
	</li>
	<li class="step">
		<h4>Step 2.</h4>
		<div class="details">
			<p>
				Under <strong>Browsing History</strong><br />
				Click on the <strong>Delete</strong> button
			</p>
			<p>
				<img src="/assets/instructions/browser/windows/ie/browsing-history.jpg" alt="browsing-history" width="382" height="125" />
			</p>
		</div>
	</li>
    <li class="step">
		<h4>Step 3.</h4>
		<div class="details">
			<p>
				To then delete your cache click on the <strong>Delete Files...</strong> button<br />
				Then you can click on the <strong>Close</strong> button followed by the <strong>OK</strong> button to exit
			</p>
			<p>
				<img src="/assets/instructions/browser/windows/ie/delete-files.jpg" alt="delete-files" width="392" height="374" />
			</p>
		</div>
	</li>
</ul>',
		cmcplatform_id: 2,
	},
	{
		name: 'IE',
		slug: 'ie',
		version: '1',
		howto: '<ul>
	<li class="step">
		<h4>Step 1.</h4>
		<div class="details">
			<p>
				Open Internet Explorer<br />
				Click on the <strong>Safety</strong> option in the top right of the window<br/>
                Select <strong>Delete Browsing History</strong>
			</p>
            <p>
				<img src="/assets/instructions/browser/windows/ie/safety-menu.jpg" alt="safety-menu" width="317" height="246" />
			</p>
		</div>
	</li>
	<li class="step">
		<h4>Step 2.</h4>
		<div class="details">
			<p>
				Make sure that only the <strong>Temporary Internet files</strong> option is selected<br />
				Click on the <strong>Delete</strong> button
			</p>
			<p>
				<img src="/assets/instructions/browser/windows/ie/delete-browsing-history.jpg" alt="delete-browsing-history" width="392" height="472" />
			</p>
		</div>
	</li>
</ul>',
		cmcplatform_id: 2,
	},
]);