
  <div class="wrap">

  	<div class="sh_tabwrapper">
  		
  		<ul class="sh_tabs_list">
  			<li><a class="active" href="#sh_settings">Settings</a></li>
  			<li><a href="#sh_shortcodes">JSON-Generator</a></li>
  		</ul>

  		<div class="sh_tabs_contents">

  			<div class="sh_tab active" id="sh_settings">

  				<form method="post" action="options.php"> 
        
			        <?php @settings_fields('wp-shortcode-helper-group'); ?>
			        <?php @do_settings_fields('wp-shortcode-helper-group'); ?>

			        <?php do_settings_sections( 'wp_shortcode_helper_settings'); ?>

			        <?php @submit_button(); ?>
			    </form>
  				
  			</div>


  			<div class="sh_tab" id="sh_shortcodes">

  				<h3>Edit Shortcodes</h3>

  				<div class="sh_input_defaults">

  					<div class="sh_card_default">
  						<div class="shortcode card">

  							<a href="#" class="delete_card">Delete Shortcode</a>

					    		<div class="sh_input">
					    			<label>Title:</label>
					    			<input type="text" name="text" value="" />
					    		</div>

					    		<div class="sh_input">
					    			<label>Name:</label>
					    			<input type="text" name="value" value="" />
					    		</div>

					    		<div class="sh_input">
					    			<label>Content:</label>
					    			<select name="content">
					    				<option value="true">Yes</option>
					    				<option value="false">No</option>
					    			</select>
					    		</div>

					    		<div class="sh_input">
					    			<label>Hide Content-input:</label>
					    			<select name="hideContentInput">
					    				<option value="true">Yes</option>
					    				<option value="false">No</option>
					    			</select>
					    		</div>

					    		<div class="sh_input">
					    			<label>Show Description:</label>
					    			<select name="description">
					    				<option value="true">Yes</option>
					    				<option value="false">No</option>
					    			</select>
					    		</div>

					    		<div class="sh_input">
					    			<label>Description:</label>
					    			<textarea name="description_text"></textarea>
					    		</div>

					    		<div class="sh_input">
					    			<label>Inputs:</label>
					    			<div class="add_input_wrapper">
					    				<select class="options_select">
						    				<option value="textbox">Textbox</option>
						    				<option value="select">Select</option>
						    				<option value="textarea">Textarea</option>
						    				<option value="media">Media</option>
						    			</select>
						    			<a href="#" class="add_input">Add input</a>
						    		</div>
						    		<div class="inputs"></div>
						    	</div>
						    </div>
  					</div>


  					<div class="sh_textbox_default">

  						<div class="sh_option">
							<div class="title">Textbox <a href="#" class="remove_input_option">Remove</a></div>
							<input type="hidden" name="type" value="textbox" />
							<div class="sh_input">
								<label>Name:</label>
								<input type="text" name="name" value="" />
							</div>
							<div class="sh_input">
								<label>Label:</label>
								<input type="text" name="label" value="" />
							</div>
						</div>

  					</div>

  					<div class="sh_media_default">

  						<div class="sh_option">
							<div class="title">Media <a href="#" class="remove_input_option">Remove</a></div>
							<input type="hidden" name="type" value="media" />
							<div class="sh_input">
								<label>Name:</label>
								<input type="text" name="name" value="" />
							</div>
							<div class="sh_input">
								<label>Label:</label>
								<input type="text" name="label" value="" />
							</div>
						</div>

  					</div>

  					<div class="sh_textarea_default">

  						<div class="sh_option">
							<div class="title">Textarea <a href="#" class="remove_input_option">Remove</a></div>
							<input type="hidden" name="type" value="textarea" />
							<div class="sh_input">
								<label>Name:</label>
								<input type="text" name="name" value="" />
							</div>
							<div class="sh_input">
								<label>Label:</label>
								<input type="text" name="label" value="" />
							</div>
						</div>

  					</div>

  					<div class="sh_select_default">

  						<div class="sh_option">
	  						<div class="title">Select <a href="#" class="remove_input_option">Remove</a></div>
							<input type="hidden" name="type" value="select" />
							<div class="sh_input">
								<label>Name:</label>
								<input type="text" name="name" value="" />
							</div>
							<div class="sh_input">
								<label>Label:</label>
								<input type="text" name="label" value="" />
							</div>
							<div class="sh_input">
								<label>Options: (text : value)</label>
								<a href="#" class="add_select_option">Add select-option</a>
							</div>
						</div>

  					</div>


  					<div class="sh_select_option_default">
  						<div class="sh_select_option">
							<input type="text" name="select_option_text" value="" />
							:
							<input type="text" name="select_option_value" value="" />
							<a href="#" class="remove_select_option">Remove</a>
						</div>
  					</div>


  				</div>

  				<textarea id="sh_jsonResult"></textarea>

  				<form id="sh_shortcode_form" action="#">

  					<input type="submit" value="Create JSON" class="button button-primary" />

  					<div class="card">
  						<h3><a href="#" class="add_new_card">Add new shortcode</a></h3>
  					</div>

	  				<?php
	  					$value = esc_attr(get_option('wp_shortcode_helper_path'));
					    if($value == 'plugin_path') {
					      $json = plugins_url().'/wp-shortcode-helper/shortcodes.json';
					    } else {
					      $json = get_stylesheet_directory_uri().'/shortcodes.json';
					    }
					    $json_str = file_get_contents($json);
					    $shortcodes = json_decode($json_str);



					    foreach($shortcodes as $code) { ?>
					    	<div class="shortcode card">

					    		<a href="#" class="delete_card">Delete Shortcode</a>

					    		<div class="sh_input">
					    			<label>Title:</label>
					    			<input type="text" name="text" value="<?php echo $code->text; ?>" />
					    		</div>

					    		<div class="sh_input">
					    			<label>Name:</label>
					    			<input type="text" name="value" value="<?php echo $code->value; ?>" />
					    		</div>

					    		<div class="sh_input">
					    			<label>Content:</label>
					    			<select name="content">
					    				<option <?php echo ($code->content == true) ? 'selected' : ''; ?> value="true">Yes</option>
					    				<option <?php echo ($code->content == false) ? 'selected' : ''; ?> value="false">No</option>
					    			</select>
					    		</div>

					    		<div class="sh_input">
					    			<label>Hide Content-input:</label>
					    			<select name="hideContentInput">
					    				<option <?php echo ($code->hideContentInput == true) ? 'selected' : ''; ?> value="true">Yes</option>
					    				<option <?php echo ($code->hideContentInput == false) ? 'selected' : ''; ?> value="false">No</option>
					    			</select>
					    		</div>

					    		<div class="sh_input">
					    			<label>Show Description:</label>
					    			<select name="description">
					    				<option <?php echo ($code->description == true) ? 'selected' : ''; ?> value="true">Yes</option>
					    				<option <?php echo ($code->description == false) ? 'selected' : ''; ?> value="false">No</option>
					    			</select>
					    		</div>

					    		<div class="sh_input">
					    			<label>Description:</label>
					    			<textarea name="description_text"><?php echo $code->description_text; ?></textarea>
					    		</div>

					    		<div class="sh_input">
					    			<label>Inputs:</label>
					    			<div class="add_input_wrapper">
					    				<select class="options_select">
						    				<option value="textbox">Textbox</option>
						    				<option value="select">Select</option>
						    				<option value="textarea">Textarea</option>
						    				<option value="media">Media</option>
						    			</select>
						    			<a href="#" class="add_input">Add input</a>
						    		</div>

						    		<div class="inputs">
						    			<?php foreach($code->options as $option) { ?>
						    				<div class="sh_option">
						    					<?php 

						    						switch($option->type) {
						    							case "textbox": ?>

						    								<div class="title">Textbox <a href="#" class="remove_input_option">Remove</a></div>
						    								<input type="hidden" name="type" value="textbox" />
						    								<div class="sh_input">
						    									<label>Name:</label>
						    									<input type="text" name="name" value="<?php echo $option->name; ?>" />
						    								</div>
						    								<div class="sh_input">
						    									<label>Label:</label>
						    									<input type="text" name="label" value="<?php echo $option->label; ?>" />
						    								</div>

						    								<?php
						    								break;

						    							case 'media':?>

						    								<div class="title">Media <a href="#" class="remove_input_option">Remove</a></div>
						    								<input type="hidden" name="type" value="media" />
						    								<div class="sh_input">
						    									<label>Name:</label>
						    									<input type="text" name="name" value="<?php echo $option->name; ?>" />
						    								</div>
						    								<div class="sh_input">
						    									<label>Label:</label>
						    									<input type="text" name="label" value="<?php echo $option->label; ?>" />
						    								</div>

						    								<?php
						    								break;

						    							case 'textarea':?>

						    								<div class="title">Textarea <a href="#" class="remove_input_option">Remove</a></div>
						    								<input type="hidden" name="type" value="textarea" />
						    								<div class="sh_input">
						    									<label>Name:</label>
						    									<input type="text" name="name" value="<?php echo $option->name; ?>" />
						    								</div>
						    								<div class="sh_input">
						    									<label>Label:</label>
						    									<input type="text" name="label" value="<?php echo $option->label; ?>" />
						    								</div>

						    								<?php
						    								break;

						    							case 'select':?>

						    								<div class="title">Select <a href="#" class="remove_input_option">Remove</a></div>
						    								<input type="hidden" name="type" value="select" />
						    								<div class="sh_input">
						    									<label>Name:</label>
						    									<input type="text" name="name" value="<?php echo $option->name; ?>" />
						    								</div>
						    								<div class="sh_input">
						    									<label>Label:</label>
						    									<input type="text" name="label" value="<?php echo $option->label; ?>" />
						    								</div>
						    								<div class="sh_input">
						    									<label>Options: (text : value)</label>
						    									<a href="#" class="add_select_option">Add select-option</a>
						    									<?php
						    										foreach($option->options as $select_option) { ?>

						    											<div class="sh_select_option">
						    												<input type="text" name="select_option_text" value="<?php echo $select_option->text; ?>" />
						    												:
						    												<input type="text" name="select_option_value" value="<?php echo $select_option->value; ?>" />
						    												<a href="#" class="remove_select_option">Remove</a>
						    											</div>

						    										<?php }
						    									?>
						    								</div>

						    								<?php
						    								break;

						    						}

						    					?>
						    				</div>
						    			<?php } ?>
						    		</div>
					    		</div>

					    	</div>
					    <?php }

					    // echo '<pre>'.print_r(json_decode($json_str),true).'</pre>';

	  				?>

	  				<input type="submit" value="Create JSON" class="button button-primary" />

  				</form>
  				
  			</div>

  		</div>

  	</div>

    
</div>