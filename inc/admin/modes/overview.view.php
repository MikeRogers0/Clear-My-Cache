 <h2>Platform Overview</h2>
    
    	<table>
    		<thead>
    			<tr>
    				<th>Platform</td>
    				<th>Last Updated</th>
    				<th class="manage">Edit</th>
    			</tr>
    		</thead>
    		<tbody>
    			<?php
	    		// Do a quick query to pull up the data.
	    		$platforms = platform::getPlatforms();
	    		
	    		foreach($platforms as $platform){ ?>
    			 <tr>
    			 	<td><?php echo $platform->Platform_Name; ?></td>
    			 	<td><?php echo $platform->Platform_lastUpdated; ?></td>
    			 	<td><?php echo $platform->editURL(); ?></td>
    			 </tr>
				<?php	} ?>
    		</tbody>
    	</table>
    
    <h2>Browser Overview</h2>
    
    	<table>
    		<thead>
    			<tr>
    				<th>Browser</td>
    				<th>Major Version</th>
    				<th>Platform</th>
    				<th>Last Updated</th>
    				<th class="manage">Edit</th>
    			</tr>
    		</thead>
    		<tbody>
    
    	<?php
    		// Do a quick query to pull up the data.
    		$browsers = browser::getBrowsers();
    		
    		foreach($browsers as $browser){ ?>
    			 <tr>
    			 	<td><?php echo $browser->Browser_Name; ?></td>
    			 	<td><?php echo $browser->Browser_MajorVer; ?></td>
    			 	<td><?php echo $browser->Platform_Name; ?></td>
    			 	<td><?php echo $browser->Browser_lastUpdated; ?></td>
    			 	<td><?php echo $browser->editURL(); ?></td>
    			 </tr>
		<?php	} ?>
    </tbody>
    </table>
    
    <h2>Extra Notes</h2>
    <ul>
    	<li>If browser major version == 0, it means default. This will be used if a more accurate browser can't be found.</li>
    </ul>