<?php

	Class MPC {
	
		Function __Construct() {
			
			$this->Content();
			
		}
		
		Function Content() {
		
			echo "Welcome to \"MPC\" Main Parts Of item-Set Creator !<br />";
				$this->stager();
		}
		
		Function stager(){
			
			@$stage = $_GET['stage'];
				
				Switch($stage){
					
					case $stage == 1 :
						$this->stageOne();
					Break;
					
					case $stage == 2 :
						$this->stageTwo();
					Break;
					
					case $stage == 3 :
						$this->stageThree();
					Break;
					
					case $stage == 4 :
						$this->stageFour();
					Break;
					
					
				}
			
		}
		
		Function stageOne(){
		
		echo "<form action = 'index.php?id=MPC&stage=2' method = 'post'>";
		
			echo "<p>Required level</p>";
				echo "<input = type = 'text' name = 'reqlvl' placeholder = 'Enter Required level' value = '0'> The level required for equip your items<br />";
			echo "<p>Count of tiers make</p>";
				echo "<input = type = 'text' name = 'count' placeholder = 'Enter Count Of Tears' value = '0'> Count of tiers you wanna mek.<br />";
			echo "<p>Enter Item Set ID</p>";
				echo "<input = type = 'text' name = 'itemset' placeholder = 'Enter Item Set ID' value = '0'> The item_set ID you wanna have for your tiers.<br />";
			echo "<p>Enter Material</p>";
			
				echo "<select name = 'material'>";
					echo "<option value = '0'>Select item Material</option>";
					echo "<option value = '4'>Plate</option>";
					echo "<option value = '3'>Mail</option>";
					echo "<option value = '2'>Leather</option>";
					echo "<option value = '1'>Cloth</option>";
				echo "</select>";
				
					echo "Select Item Material and subclass at the same time";
				
			echo "<p>Enter Name Of Tier</p>";
				echo "<input = type = 'text' name = 'name' placeholder = 'Enter Name'> Enter the name you wanna be generated for your tiers, it will be generated in that order ' your name ' item piece (automated)<br />";
			echo "<p>Enter Entry to start</p>";
				echo "<input = type = 'text' name = 'entry' value = '0' placeholder = 'Enter Entry'>Then entry ID the first item will be (select not usable entry range 8 items for example * 10 tier = 80 items , that means select range with no items in 80 entrys)<br />";
			echo "<p>Enter Armor</p>";
				echo "<input = type = 'text' name = 'armor' value = '0' placeholder = 'Enter Armor'>Armor for each piece Affected by stats multiplier data.<br />";
			echo "<p>Enter The Item Level</p>";
				echo "<input = type = 'text' name = 'ilvl' value = '0' placeholder = 'Enter Item Level'> The first tier item level, affected by formula (1.5^count of tiers) * iLVL<br />";
			echo "<p>Enter The stats multipler</p>";
				echo "<input = type = 'text' name = 'multipler' value = '1' placeholder = 'Enter multipler'> The item stats multiplier , how much the next tier item stats will be better than previous.<br />";
		
		echo "<br />";
		echo "<input type='submit' value ='Next'>";
		echo "</form>";
		
		}
		
		Function stageTwo(){
		
		$_SESSION['req_lvl'] = $_POST['reqlvl'];
		$_SESSION['count'] = $_POST['count'];
		$_SESSION['itemset'] = $_POST['itemset'];
		$_SESSION['material'] = $_POST['material'];
		$_SESSION['name'] = htmlspecialchars(addslashes($_POST['name']));
		$_SESSION['entry'] = $_POST['entry'];
		$_SESSION['armor'] = $_POST['armor'];
		$_SESSION['ilvl'] = $_POST['ilvl'];
		$_SESSION['multipler'] = $_POST['multipler'];
		
		echo "<form action = 'index.php?id=MPC&stage=3' method = 'post'>";
		
					echo "<p>Select the classes able to wear tat tier</p>";
					echo "<p>All Classes <input name = 'all_class' type = 'checkbox' value = '-1'></p>";
					
						echo "<p>";
					echo "Warrior <input name = 'class1' type = 'checkbox' value = '1'>";
					echo "Paladin <input name = 'class2' type = 'checkbox' value = '2'>";
					echo "Hunter <input  name = 'class3' type = 'checkbox' value = '4'>";
					echo "Rogue <input  name = 'class4' type = 'checkbox' value = '8'>";
						echo "</p>";
						
						echo "<p>";
					echo "Priest <input name = 'class5' type = 'checkbox' value = '16'>";
					echo "Druid <input name = 'class6' type = 'checkbox' value = '1024'>";
					echo "Shaman <input name = 'class7' type = 'checkbox' value = '64'>";
					echo "Mage <input name = 'class8' type = 'checkbox' value = '128'>";
						echo "</p>";
						
						echo "<p>";
					echo "Warlock <input name = 'class9' type = 'checkbox' value = '256'>";
					echo "DeathKnight <input name = 'class10' type = 'checkbox' value = '32'>";
						echo "</p>";
						
		echo "<input type='submit' value ='Next'>";	
		echo "</form>";
		
		}
		
		Function stageThree(){
		
		echo "<form action = 'index.php?id=MPC&stage=4' method = 'post'>";
		
			if(!empty($_POST['all_class'])){
				
				$_SESSION['allowableclass'] = -1;
				
				} else {
				
				@$_SESSION['allowableclass'] = $_POST['class1'] + $_POST['class2'] + $_POST['class3'] + $_POST['class4'] + $_POST['class5'] + $_POST['class6'] + $_POST['class7'] + $_POST['class8'] + $_POST['class9'] + $_POST['class10'];
				
				
			}
			
			$p = 0;
				
				while ($p++ < 8){
				
					switch($p){
					
						case $p == 1:
							$piece = "Helmet";
						Break;
						case $p == 2:
							$piece = "Shoulders";
						Break;
						case $p == 3;
							$piece = "Chest";
						Break;
						case $p == 4:
							$piece = "Wrist";
						Break;
						case $p == 5:
							$piece = "Hands";
						Break;
						case $p == 6:
							$piece = "Belt";
						Break;
						case $p == 7:
							$piece = "Legs";
						Break;
						case $p == 8:
							$piece = "Feet";
						Break;
					}
					echo "<p><img src = 'Images/MainPartsIcons/".$p.".png'</p>";
					echo "<h4>$piece</h4>";
					echo "  Select Sockets [1]  ";
						echo "<select name = '".$piece."_socket_color'>";
							echo "<option value = '0'>Select Color</option>";
							echo "<option value = '1'>Meta</option>";
							echo "<option value = '2'>Red</option>";
							echo "<option value = '4'>Yellow</option>";
							echo "<option value = '8'>Blue</option>";
						echo "</select>"; // 1 2 4 8
					echo "<br />";
					
					echo "  Select Sockets [2]  ";
						echo "<select name = '".$piece."_socket_color2'>";
							echo "<option value = '0'>Select Color</option>";
							echo "<option value = '1'>Meta</option>";
							echo "<option value = '2'>Red</option>";
							echo "<option value = '4'>Yellow</option>";
							echo "<option value = '8'>Blue</option>";
						echo "</select>"; // 1 2 4 8
					echo "<br />";
					
					echo "  Select Sockets [3]  ";
						echo "<select name = '".$piece."_socket_color3'>";
							echo "<option value = '0'>Select Color</option>";
							echo "<option value = '1'>Meta</option>";
							echo "<option value = '2'>Red</option>";
							echo "<option value = '4'>Yellow</option>";
							echo "<option value = '8'>Blue</option>";
						echo "</select>"; // 1 2 4 8
					echo "<p></p>";
					
					
					$s = "0";
					while ($s++ < 10) {
					
					echo "  Select Te stat_type  ";
						echo "<select name = '".$piece."_stat_type_$s'>";
							echo "<option value = '0'>Select Value</option>";
								echo "<option value = '0'>MOD MANA</option>";
								echo "<option value = '1'>HEALTH</option>";
								echo "<option value = '3'>AGILITY</option>";
								echo "<option value = '4'>STRENGTH</option>";
								echo "<option value = '5'>INTELECT</option>";
								echo "<option value = '6'>SPIRIT</option>";
								echo "<option value = '7'>STAMINA</option>";
								echo "<option value = '12'>DEFENSE SKILL RATING</option>";
								echo "<option value = '13'>DODGE RATING</option>";
								echo "<option value = '14'>PARRY RATING</option>";
								echo "<option value = '15'>BLOCK RATING</option>";
								echo "<option value = '16'>HIT MELEE RATING</option>";
								echo "<option value = '17'>HIT RANGED RATING</option>";
								echo "<option value = '18'>HIT SPELL RATING</option>";
								echo "<option value = '19'>CRIT MELEE RATING</option>";
								echo "<option value = '20'>CRITT RANGED RATING</option>";
								echo "<option value = '21'>CRIT SPELL RATING</option>";
								echo "<option value = '22'>HIT TAKEN MELEE RATING</option>";
								echo "<option value = '23'>HIT TAKEN RANGED RATING</option>";
								echo "<option value = '24'>HIT TAKEN SPELL RATING</option>";
								echo "<option value = '25'>CRIT TAKEN MELEE RATING</option>";
								echo "<option value = '26'>CRIT TAKEN RANGED RATING</option>";
								echo "<option value = '27'>CRIT TAKEN SPELL RATING</option>";
								echo "<option value = '28'>HASTE MELEE RATING</option>";
								echo "<option value = '29'>HASTE RANGED RATING</option>";
								echo "<option value = '30'>HASTE SPELL RATING</option>";
								echo "<option value = '31'>HIT RATING</option>";
								echo "<option value = '32'>CRIT RATING</option>";
								echo "<option value = '33'>HIT TAKEN RATING</option>";
								echo "<option value = '34'>CRIT TAKEN RATING</option>";
								echo "<option value = '35'>RESILIENCE RATING</option>";
								echo "<option value = '36'>HASTE RATING</option>";
								echo "<option value = '37'>EXPERTISE RATING</option>";
								echo "<option value = '38'>ATTACK POWER</option>";
								echo "<option value = '39'>RANGED ATTACK POWER</option>";
								echo "<option value = '41'>SPELL HEALING DONE</option>";
								echo "<option value = '42'>SPELL DAMAGE DONE</option>";
								echo "<option value = '43'>MANA REGENERATION 5S</option>";
								echo "<option value = '44'>ARMOR PENETRATION RATING</option>";
								echo "<option value = '45'>SPELL POWER</option>";
								echo "<option value = '46'>HEALTH REGENERATION</option>";
								echo "<option value = '47'>SPELL PENETRATION</option>";
								echo "<option value = '48'>BLOCK VALUE</option>";
						echo "<select>";
					echo "  Enter Value of selected Stat  ";
						echo "<input type = 'text' name = '".$piece."_stat_value_$s'  value = '0' placeholder = 'Enter the stat value'/>";	
							echo "<br />";
					}

				}
		
		echo "<br />";
		echo "<input type='submit' value ='Next'>";	
		echo "</form>";
		
		}
		
		Function stageFour(){
		
		// add Helmet stat_type
			$_SESSION['Helmet_stat_type1'] = $_POST['Helmet_stat_type_1'];
			$_SESSION['Helmet_stat_type2'] = $_POST['Helmet_stat_type_2'];
			$_SESSION['Helmet_stat_type3'] = $_POST['Helmet_stat_type_3'];
			$_SESSION['Helmet_stat_type4'] = $_POST['Helmet_stat_type_4'];
			$_SESSION['Helmet_stat_type5'] = $_POST['Helmet_stat_type_5'];
			$_SESSION['Helmet_stat_type6'] = $_POST['Helmet_stat_type_6'];
			$_SESSION['Helmet_stat_type7'] = $_POST['Helmet_stat_type_7'];
			$_SESSION['Helmet_stat_type8'] = $_POST['Helmet_stat_type_8'];
			$_SESSION['Helmet_stat_type9'] = $_POST['Helmet_stat_type_9'];
			$_SESSION['Helmet_stat_type10'] = $_POST['Helmet_stat_type_10'];
			
		// add helmet stat_value
			$_SESSION['Helmet_stat_value1'] = $_POST['Helmet_stat_value_1'];
			$_SESSION['Helmet_stat_value2'] = $_POST['Helmet_stat_value_2'];
			$_SESSION['Helmet_stat_value3'] = $_POST['Helmet_stat_value_3'];
			$_SESSION['Helmet_stat_value4'] = $_POST['Helmet_stat_value_4'];
			$_SESSION['Helmet_stat_value5'] = $_POST['Helmet_stat_value_5'];
			$_SESSION['Helmet_stat_value6'] = $_POST['Helmet_stat_value_6'];
			$_SESSION['Helmet_stat_value7'] = $_POST['Helmet_stat_value_7'];
			$_SESSION['Helmet_stat_value8'] = $_POST['Helmet_stat_value_8'];
			$_SESSION['Helmet_stat_value9'] = $_POST['Helmet_stat_value_9'];
			$_SESSION['Helmet_stat_value10'] = $_POST['Helmet_stat_value_10'];
		
		// add Shoulders stat_type
			$_SESSION['Shoulders_stat_type1'] = $_POST['Shoulders_stat_type_1'];
			$_SESSION['Shoulders_stat_type2'] = $_POST['Shoulders_stat_type_2'];
			$_SESSION['Shoulders_stat_type3'] = $_POST['Shoulders_stat_type_3'];
			$_SESSION['Shoulders_stat_type4'] = $_POST['Shoulders_stat_type_4'];
			$_SESSION['Shoulders_stat_type5'] = $_POST['Shoulders_stat_type_5'];
			$_SESSION['Shoulders_stat_type6'] = $_POST['Shoulders_stat_type_6'];
			$_SESSION['Shoulders_stat_type7'] = $_POST['Shoulders_stat_type_7'];
			$_SESSION['Shoulders_stat_type8'] = $_POST['Shoulders_stat_type_8'];
			$_SESSION['Shoulders_stat_type9'] = $_POST['Shoulders_stat_type_9'];
			$_SESSION['Shoulders_stat_type10'] = $_POST['Shoulders_stat_type_10'];
			
		// add Shoulders stat_value
			$_SESSION['Shoulders_stat_value1'] = $_POST['Shoulders_stat_value_1'];
			$_SESSION['Shoulders_stat_value2'] = $_POST['Shoulders_stat_value_2'];
			$_SESSION['Shoulders_stat_value3'] = $_POST['Shoulders_stat_value_3'];
			$_SESSION['Shoulders_stat_value4'] = $_POST['Shoulders_stat_value_4'];
			$_SESSION['Shoulders_stat_value5'] = $_POST['Shoulders_stat_value_5'];
			$_SESSION['Shoulders_stat_value6'] = $_POST['Shoulders_stat_value_6'];
			$_SESSION['Shoulders_stat_value7'] = $_POST['Shoulders_stat_value_7'];
			$_SESSION['Shoulders_stat_value8'] = $_POST['Shoulders_stat_value_8'];
			$_SESSION['Shoulders_stat_value9'] = $_POST['Shoulders_stat_value_9'];
			$_SESSION['Shoulders_stat_value10'] = $_POST['Shoulders_stat_value_10'];
			
		// add Chest stat_type
			$_SESSION['Chest_stat_type1'] = $_POST['Chest_stat_type_1'];
			$_SESSION['Chest_stat_type2'] = $_POST['Chest_stat_type_2'];
			$_SESSION['Chest_stat_type3'] = $_POST['Chest_stat_type_3'];
			$_SESSION['Chest_stat_type4'] = $_POST['Chest_stat_type_4'];
			$_SESSION['Chest_stat_type5'] = $_POST['Chest_stat_type_5'];
			$_SESSION['Chest_stat_type6'] = $_POST['Chest_stat_type_6'];
			$_SESSION['Chest_stat_type7'] = $_POST['Chest_stat_type_7'];
			$_SESSION['Chest_stat_type8'] = $_POST['Chest_stat_type_8'];
			$_SESSION['Chest_stat_type9'] = $_POST['Chest_stat_type_9'];
			$_SESSION['Chest_stat_type10'] = $_POST['Chest_stat_type_10'];
			
		// add Chest stat_value
			$_SESSION['Chest_stat_value1'] = $_POST['Chest_stat_value_1'];
			$_SESSION['Chest_stat_value2'] = $_POST['Chest_stat_value_2'];
			$_SESSION['Chest_stat_value3'] = $_POST['Chest_stat_value_3'];
			$_SESSION['Chest_stat_value4'] = $_POST['Chest_stat_value_4'];
			$_SESSION['Chest_stat_value5'] = $_POST['Chest_stat_value_5'];
			$_SESSION['Chest_stat_value6'] = $_POST['Chest_stat_value_6'];
			$_SESSION['Chest_stat_value7'] = $_POST['Chest_stat_value_7'];
			$_SESSION['Chest_stat_value8'] = $_POST['Chest_stat_value_8'];
			$_SESSION['Chest_stat_value9'] = $_POST['Chest_stat_value_9'];
			$_SESSION['Chest_stat_value10'] = $_POST['Chest_stat_value_10'];
			
		// add Wrist stat_type
			$_SESSION['Wrist_stat_type1'] = $_POST['Wrist_stat_type_1'];
			$_SESSION['Wrist_stat_type2'] = $_POST['Wrist_stat_type_2'];
			$_SESSION['Wrist_stat_type3'] = $_POST['Wrist_stat_type_3'];
			$_SESSION['Wrist_stat_type4'] = $_POST['Wrist_stat_type_4'];
			$_SESSION['Wrist_stat_type5'] = $_POST['Wrist_stat_type_5'];
			$_SESSION['Wrist_stat_type6'] = $_POST['Wrist_stat_type_6'];
			$_SESSION['Wrist_stat_type7'] = $_POST['Wrist_stat_type_7'];
			$_SESSION['Wrist_stat_type8'] = $_POST['Wrist_stat_type_8'];
			$_SESSION['Wrist_stat_type9'] = $_POST['Wrist_stat_type_9'];
			$_SESSION['Wrist_stat_type10'] = $_POST['Wrist_stat_type_10'];
			
		// add Wrist stat_value
			$_SESSION['Wrist_stat_value1'] = $_POST['Wrist_stat_value_1'];
			$_SESSION['Wrist_stat_value2'] = $_POST['Wrist_stat_value_2'];
			$_SESSION['Wrist_stat_value3'] = $_POST['Wrist_stat_value_3'];
			$_SESSION['Wrist_stat_value4'] = $_POST['Wrist_stat_value_4'];
			$_SESSION['Wrist_stat_value5'] = $_POST['Wrist_stat_value_5'];
			$_SESSION['Wrist_stat_value6'] = $_POST['Wrist_stat_value_6'];
			$_SESSION['Wrist_stat_value7'] = $_POST['Wrist_stat_value_7'];
			$_SESSION['Wrist_stat_value8'] = $_POST['Wrist_stat_value_8'];
			$_SESSION['Wrist_stat_value9'] = $_POST['Wrist_stat_value_9'];
			$_SESSION['Wrist_stat_value10'] = $_POST['Wrist_stat_value_10'];
			
		// add Hands stat_type
			$_SESSION['Hands_stat_type1'] = $_POST['Hands_stat_type_1'];
			$_SESSION['Hands_stat_type2'] = $_POST['Hands_stat_type_2'];
			$_SESSION['Hands_stat_type3'] = $_POST['Hands_stat_type_3'];
			$_SESSION['Hands_stat_type4'] = $_POST['Hands_stat_type_4'];
			$_SESSION['Hands_stat_type5'] = $_POST['Hands_stat_type_5'];
			$_SESSION['Hands_stat_type6'] = $_POST['Hands_stat_type_6'];
			$_SESSION['Hands_stat_type7'] = $_POST['Hands_stat_type_7'];
			$_SESSION['Hands_stat_type8'] = $_POST['Hands_stat_type_8'];
			$_SESSION['Hands_stat_type9'] = $_POST['Hands_stat_type_9'];
			$_SESSION['Hands_stat_type10'] = $_POST['Hands_stat_type_10'];
			
		// add Hands stat_value
			$_SESSION['Hands_stat_value1'] = $_POST['Hands_stat_value_1'];
			$_SESSION['Hands_stat_value2'] = $_POST['Hands_stat_value_2'];
			$_SESSION['Hands_stat_value3'] = $_POST['Hands_stat_value_3'];
			$_SESSION['Hands_stat_value4'] = $_POST['Hands_stat_value_4'];
			$_SESSION['Hands_stat_value5'] = $_POST['Hands_stat_value_5'];
			$_SESSION['Hands_stat_value6'] = $_POST['Hands_stat_value_6'];
			$_SESSION['Hands_stat_value7'] = $_POST['Hands_stat_value_7'];
			$_SESSION['Hands_stat_value8'] = $_POST['Hands_stat_value_8'];
			$_SESSION['Hands_stat_value9'] = $_POST['Hands_stat_value_9'];
			$_SESSION['Hands_stat_value10'] = $_POST['Hands_stat_value_10'];
		
		// add Belt stat_type
			$_SESSION['Belt_stat_type1'] = $_POST['Belt_stat_type_1'];
			$_SESSION['Belt_stat_type2'] = $_POST['Belt_stat_type_2'];
			$_SESSION['Belt_stat_type3'] = $_POST['Belt_stat_type_3'];
			$_SESSION['Belt_stat_type4'] = $_POST['Belt_stat_type_4'];
			$_SESSION['Belt_stat_type5'] = $_POST['Belt_stat_type_5'];
			$_SESSION['Belt_stat_type6'] = $_POST['Belt_stat_type_6'];
			$_SESSION['Belt_stat_type7'] = $_POST['Belt_stat_type_7'];
			$_SESSION['Belt_stat_type8'] = $_POST['Belt_stat_type_8'];
			$_SESSION['Belt_stat_type9'] = $_POST['Belt_stat_type_9'];
			$_SESSION['Belt_stat_type10'] = $_POST['Belt_stat_type_10'];
			
		// add Belt stat_value
			$_SESSION['Belt_stat_value1'] = $_POST['Belt_stat_value_1'];
			$_SESSION['Belt_stat_value2'] = $_POST['Belt_stat_value_2'];
			$_SESSION['Belt_stat_value3'] = $_POST['Belt_stat_value_3'];
			$_SESSION['Belt_stat_value4'] = $_POST['Belt_stat_value_4'];
			$_SESSION['Belt_stat_value5'] = $_POST['Belt_stat_value_5'];
			$_SESSION['Belt_stat_value6'] = $_POST['Belt_stat_value_6'];
			$_SESSION['Belt_stat_value7'] = $_POST['Belt_stat_value_7'];
			$_SESSION['Belt_stat_value8'] = $_POST['Belt_stat_value_8'];
			$_SESSION['Belt_stat_value9'] = $_POST['Belt_stat_value_9'];
			$_SESSION['Belt_stat_value10'] = $_POST['Belt_stat_value_10'];
			
		// add Legs stat_type
			$_SESSION['Legs_stat_type1'] = $_POST['Legs_stat_type_1'];
			$_SESSION['Legs_stat_type2'] = $_POST['Legs_stat_type_2'];
			$_SESSION['Legs_stat_type3'] = $_POST['Legs_stat_type_3'];
			$_SESSION['Legs_stat_type4'] = $_POST['Legs_stat_type_4'];
			$_SESSION['Legs_stat_type5'] = $_POST['Legs_stat_type_5'];
			$_SESSION['Legs_stat_type6'] = $_POST['Legs_stat_type_6'];
			$_SESSION['Legs_stat_type7'] = $_POST['Legs_stat_type_7'];
			$_SESSION['Legs_stat_type8'] = $_POST['Legs_stat_type_8'];
			$_SESSION['Legs_stat_type9'] = $_POST['Legs_stat_type_9'];
			$_SESSION['Legs_stat_type10'] = $_POST['Legs_stat_type_10'];
			
		// add Legs stat_value
			$_SESSION['Legs_stat_value1'] = $_POST['Legs_stat_value_1'];
			$_SESSION['Legs_stat_value2'] = $_POST['Legs_stat_value_2'];
			$_SESSION['Legs_stat_value3'] = $_POST['Legs_stat_value_3'];
			$_SESSION['Legs_stat_value4'] = $_POST['Legs_stat_value_4'];
			$_SESSION['Legs_stat_value5'] = $_POST['Legs_stat_value_5'];
			$_SESSION['Legs_stat_value6'] = $_POST['Legs_stat_value_6'];
			$_SESSION['Legs_stat_value7'] = $_POST['Legs_stat_value_7'];
			$_SESSION['Legs_stat_value8'] = $_POST['Legs_stat_value_8'];
			$_SESSION['Legs_stat_value9'] = $_POST['Legs_stat_value_9'];
			$_SESSION['Legs_stat_value10'] = $_POST['Legs_stat_value_10'];
			
		// add Feet stat_type
			$_SESSION['Feet_stat_type1'] = $_POST['Feet_stat_type_1'];
			$_SESSION['Feet_stat_type2'] = $_POST['Feet_stat_type_2'];
			$_SESSION['Feet_stat_type3'] = $_POST['Feet_stat_type_3'];
			$_SESSION['Feet_stat_type4'] = $_POST['Feet_stat_type_4'];
			$_SESSION['Feet_stat_type5'] = $_POST['Feet_stat_type_5'];
			$_SESSION['Feet_stat_type6'] = $_POST['Feet_stat_type_6'];
			$_SESSION['Feet_stat_type7'] = $_POST['Feet_stat_type_7'];
			$_SESSION['Feet_stat_type8'] = $_POST['Feet_stat_type_8'];
			$_SESSION['Feet_stat_type9'] = $_POST['Feet_stat_type_9'];
			$_SESSION['Feet_stat_type10'] = $_POST['Feet_stat_type_10'];
			
		// add Feet stat_value
			$_SESSION['Feet_stat_value1'] = $_POST['Feet_stat_value_1'];
			$_SESSION['Feet_stat_value2'] = $_POST['Feet_stat_value_2'];
			$_SESSION['Feet_stat_value3'] = $_POST['Feet_stat_value_3'];
			$_SESSION['Feet_stat_value4'] = $_POST['Feet_stat_value_4'];
			$_SESSION['Feet_stat_value5'] = $_POST['Feet_stat_value_5'];
			$_SESSION['Feet_stat_value6'] = $_POST['Feet_stat_value_6'];
			$_SESSION['Feet_stat_value7'] = $_POST['Feet_stat_value_7'];
			$_SESSION['Feet_stat_value8'] = $_POST['Feet_stat_value_8'];
			$_SESSION['Feet_stat_value9'] = $_POST['Feet_stat_value_9'];
			$_SESSION['Feet_stat_value10'] = $_POST['Feet_stat_value_10'];
		
		// Helmet Sockets keeper
		
			$_SESSION['Helmet_socket_color'] = $_POST['Helmet_socket_color'];
			$_SESSION['Helmet_socket_color2'] = $_POST['Helmet_socket_color2'];
			$_SESSION['Helmet_socket_color3'] = $_POST['Helmet_socket_color3'];
			
		// Shoulders Sockets keeper
		
			$_SESSION['Shoulders_socket_color'] = $_POST['Shoulders_socket_color'];
			$_SESSION['Shoulders_socket_color2'] = $_POST['Shoulders_socket_color2'];
			$_SESSION['Shoulders_socket_color3'] = $_POST['Shoulders_socket_color3'];
		
		// Chest Sockets keeper
		
			$_SESSION['Chest_socket_color'] = $_POST['Chest_socket_color'];
			$_SESSION['Chest_socket_color2'] = $_POST['Chest_socket_color2'];
			$_SESSION['Chest_socket_color3'] = $_POST['Chest_socket_color3'];
			
		// Wrist Sockets keeper
		
			$_SESSION['Wrist_socket_color'] = $_POST['Wrist_socket_color'];
			$_SESSION['Wrist_socket_color2'] = $_POST['Wrist_socket_color2'];
			$_SESSION['Wrist_socket_color3'] = $_POST['Wrist_socket_color3'];
			
		// Hands Sockets keeper
		
			$_SESSION['Hands_socket_color'] = $_POST['Hands_socket_color'];
			$_SESSION['Hands_socket_color2'] = $_POST['Hands_socket_color2'];
			$_SESSION['Hands_socket_color3'] = $_POST['Hands_socket_color3'];
			
		// Belt Sockets keeper
		
			$_SESSION['Belt_socket_color'] = $_POST['Belt_socket_color'];
			$_SESSION['Belt_socket_color2'] = $_POST['Belt_socket_color2'];
			$_SESSION['Belt_socket_color3'] = $_POST['Belt_socket_color3'];
			
		// Legs Sockets keeper
		
			$_SESSION['Legs_socket_color'] = $_POST['Legs_socket_color'];
			$_SESSION['Legs_socket_color2'] = $_POST['Legs_socket_color2'];
			$_SESSION['Legs_socket_color3'] = $_POST['Legs_socket_color3'];
			
		// Feet Sockets keeper
		
			$_SESSION['Feet_socket_color'] = $_POST['Feet_socket_color'];
			$_SESSION['Feet_socket_color2'] = $_POST['Feet_socket_color2'];
			$_SESSION['Feet_socket_color3'] = $_POST['Feet_socket_color3'];
			
		$i = -1;
		
		while($i++ < $_SESSION['count']) {
			
			$multipler = pow($_SESSION['multipler'],$i);
			$ilvlmultipler = pow(1.5,$i);
			
						echo "<p>REPLACE INTO `item_template` (`entry`, `class`, `subclass`, `SoundOverrideSubclass`, `name`, `displayid`, `Quality`, `Flags`, `FlagsExtra`, `BuyCount`, `BuyPrice`, `SellPrice`, `InventoryType`, `AllowableClass`, `AllowableRace`, `ItemLevel`, `RequiredLevel`, `RequiredSkill`, `RequiredSkillRank`, `requiredspell`, `requiredhonorrank`, `RequiredCityRank`, `RequiredReputationFaction`, `RequiredReputationRank`, `maxcount`, `stackable`, `ContainerSlots`, `StatsCount`, `stat_type1`, `stat_value1`, `stat_type2`, `stat_value2`, `stat_type3`, `stat_value3`, `stat_type4`, `stat_value4`, `stat_type5`, `stat_value5`, `stat_type6`, `stat_value6`, `stat_type7`, `stat_value7`, `stat_type8`, `stat_value8`, `stat_type9`, `stat_value9`, `stat_type10`, `stat_value10`, `ScalingStatDistribution`, `ScalingStatValue`, `dmg_min1`, `dmg_max1`, `dmg_type1`, `dmg_min2`, `dmg_max2`, `dmg_type2`, `armor`, `holy_res`, `fire_res`, `nature_res`, `frost_res`, `shadow_res`, `arcane_res`, `delay`, `ammo_type`, `RangedModRange`, `spellid_1`, `spelltrigger_1`, `spellcharges_1`, `spellppmRate_1`, `spellcooldown_1`, `spellcategory_1`, `spellcategorycooldown_1`, `spellid_2`, `spelltrigger_2`, `spellcharges_2`, `spellppmRate_2`, `spellcooldown_2`, `spellcategory_2`, `spellcategorycooldown_2`, `spellid_3`, `spelltrigger_3`, `spellcharges_3`, `spellppmRate_3`, `spellcooldown_3`, `spellcategory_3`, `spellcategorycooldown_3`, `spellid_4`, `spelltrigger_4`, `spellcharges_4`, `spellppmRate_4`, `spellcooldown_4`, `spellcategory_4`, `spellcategorycooldown_4`, `spellid_5`, `spelltrigger_5`, `spellcharges_5`, `spellppmRate_5`, `spellcooldown_5`, `spellcategory_5`, `spellcategorycooldown_5`, `bonding`, `description`, `PageText`, `LanguageID`, `PageMaterial`, `startquest`, `lockid`, `Material`, `sheath`, `RandomProperty`, `RandomSuffix`, `block`, `itemset`, `MaxDurability`, `area`, `Map`, `BagFamily`, `TotemCategory`, `socketColor_1`, `socketContent_1`, `socketColor_2`, `socketContent_2`, `socketColor_3`, `socketContent_3`, `socketBonus`, `GemProperties`, `RequiredDisenchantSkill`, `ArmorDamageModifier`, `duration`, `ItemLimitCategory`, `HolidayId`, `ScriptName`, `DisenchantID`, `FoodType`, `minMoneyLoot`, `maxMoneyLoot`, `flagsCustom`, `VerifiedBuild`) VALUES ";
						echo "</p>";
						
						echo "
						(".$_SESSION['entry']++.", 4, ".$_SESSION['material'].", -1, '".$_SESSION['name']." Helmet', 0, 2, 0, 0, 1, 0, 0, 1, ".$_SESSION['allowableclass'].", -1, ".round($_SESSION['ilvl'] * $ilvlmultipler).", 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 10, 
						".$_SESSION['Helmet_stat_type1'].", ".round($_SESSION['Helmet_stat_value1'] * $multipler).",
						".$_SESSION['Helmet_stat_type2'].", ".round($_SESSION['Helmet_stat_value2'] * $multipler).",
						".$_SESSION['Helmet_stat_type3'].", ".round($_SESSION['Helmet_stat_value3'] * $multipler).",
						".$_SESSION['Helmet_stat_type4'].", ".round($_SESSION['Helmet_stat_value4'] * $multipler).",
						".$_SESSION['Helmet_stat_type5'].", ".round($_SESSION['Helmet_stat_value5'] * $multipler).",
						".$_SESSION['Helmet_stat_type6'].", ".round($_SESSION['Helmet_stat_value6'] * $multipler).",
						".$_SESSION['Helmet_stat_type7'].", ".round($_SESSION['Helmet_stat_value7'] * $multipler).",
						".$_SESSION['Helmet_stat_type8'].", ".round($_SESSION['Helmet_stat_value8'] * $multipler).",
						".$_SESSION['Helmet_stat_type9'].", ".round($_SESSION['Helmet_stat_value9'] * $multipler).",
						".$_SESSION['Helmet_stat_type10'].", ".round($_SESSION['Helmet_stat_value10'] * $multipler).",
						0, 0, 0, 0, 0, 0, 0, 0, ".round($_SESSION['armor'] * $multipler).", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, -1, 0, 0, 0, 0, ".$_SESSION['itemset'].", 0, 0, 0, 0, 0, 
						".$_SESSION['Helmet_socket_color'].", 1, ".$_SESSION['Helmet_socket_color2'].", 1, ".$_SESSION['Helmet_socket_color3'].", 1, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 12340),";
						echo "</p>";
						
						echo "
						(".$_SESSION['entry']++.", 4, ".$_SESSION['material'].", -1, '".$_SESSION['name']." Shoulders', 0, 2, 0, 0, 1, 0, 0, 3, ".$_SESSION['allowableclass'].", -1, ".round($_SESSION['ilvl'] * $ilvlmultipler).", 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 10, 
						".$_SESSION['Shoulders_stat_type1'].", ".round($_SESSION['Shoulders_stat_value1'] * $multipler).",
						".$_SESSION['Shoulders_stat_type2'].", ".round($_SESSION['Shoulders_stat_value2'] * $multipler).",
						".$_SESSION['Shoulders_stat_type3'].", ".round($_SESSION['Shoulders_stat_value3'] * $multipler).",
						".$_SESSION['Shoulders_stat_type4'].", ".round($_SESSION['Shoulders_stat_value4'] * $multipler).",
						".$_SESSION['Shoulders_stat_type5'].", ".round($_SESSION['Shoulders_stat_value5'] * $multipler).",
						".$_SESSION['Shoulders_stat_type6'].", ".round($_SESSION['Shoulders_stat_value6'] * $multipler).",
						".$_SESSION['Shoulders_stat_type7'].", ".round($_SESSION['Shoulders_stat_value7'] * $multipler).",
						".$_SESSION['Shoulders_stat_type8'].", ".round($_SESSION['Shoulders_stat_value8'] * $multipler).",
						".$_SESSION['Shoulders_stat_type9'].", ".round($_SESSION['Shoulders_stat_value9'] * $multipler).",
						".$_SESSION['Shoulders_stat_type10'].", ".round($_SESSION['Shoulders_stat_value10'] * $multipler).",
						0, 0, 0, 0, 0, 0, 0, 0, ".round($_SESSION['armor'] * $multipler).", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, -1, 0, 0, 0, 0, ".$_SESSION['itemset'].", 0, 0, 0, 0, 0, 
						".$_SESSION['Shoulders_socket_color'].", 1, ".$_SESSION['Shoulders_socket_color2'].", 1, ".$_SESSION['Shoulders_socket_color3'].", 1, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 12340),";
						echo "</p>";
						
						echo "
						(".$_SESSION['entry']++.", 4, ".$_SESSION['material'].", -1, '".$_SESSION['name']." Chest', 0, 2, 0, 0, 1, 0, 0, 5, ".$_SESSION['allowableclass'].", -1, ".round($_SESSION['ilvl'] * $ilvlmultipler).", 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 10, 
						".$_SESSION['Chest_stat_type1'].", ".round($_SESSION['Chest_stat_value1'] * $multipler).",
						".$_SESSION['Chest_stat_type2'].", ".round($_SESSION['Chest_stat_value2'] * $multipler).",
						".$_SESSION['Chest_stat_type3'].", ".round($_SESSION['Chest_stat_value3'] * $multipler).",
						".$_SESSION['Chest_stat_type4'].", ".round($_SESSION['Chest_stat_value4'] * $multipler).",
						".$_SESSION['Chest_stat_type5'].", ".round($_SESSION['Chest_stat_value5'] * $multipler).",
						".$_SESSION['Chest_stat_type6'].", ".round($_SESSION['Chest_stat_value6'] * $multipler).",
						".$_SESSION['Chest_stat_type7'].", ".round($_SESSION['Chest_stat_value7'] * $multipler).",
						".$_SESSION['Chest_stat_type8'].", ".round($_SESSION['Chest_stat_value8'] * $multipler).",
						".$_SESSION['Chest_stat_type9'].", ".round($_SESSION['Chest_stat_value9'] * $multipler).",
						".$_SESSION['Chest_stat_type10'].", ".round($_SESSION['Chest_stat_value10'] * $multipler).",
						0, 0, 0, 0, 0, 0, 0, 0, ".round($_SESSION['armor'] * $multipler).", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, -1, 0, 0, 0, 0, ".$_SESSION['itemset'].", 0, 0, 0, 0, 0, 
						".$_SESSION['Chest_socket_color'].", 1, ".$_SESSION['Chest_socket_color2'].", 1, ".$_SESSION['Chest_socket_color3'].", 1, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 12340),";
						echo "</p>";
						
						echo "
						(".$_SESSION['entry']++.", 4, ".$_SESSION['material'].", -1, '".$_SESSION['name']." Wrist', 0, 2, 0, 0, 1, 0, 0, 9, ".$_SESSION['allowableclass'].", -1, ".round($_SESSION['ilvl'] * $ilvlmultipler).", 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 10, 
						".$_SESSION['Wrist_stat_type1'].", ".round($_SESSION['Wrist_stat_value1'] * $multipler).",
						".$_SESSION['Wrist_stat_type2'].", ".round($_SESSION['Wrist_stat_value2'] * $multipler).",
						".$_SESSION['Wrist_stat_type3'].", ".round($_SESSION['Wrist_stat_value3'] * $multipler).",
						".$_SESSION['Wrist_stat_type4'].", ".round($_SESSION['Wrist_stat_value4'] * $multipler).",
						".$_SESSION['Wrist_stat_type5'].", ".round($_SESSION['Wrist_stat_value5'] * $multipler).",
						".$_SESSION['Wrist_stat_type6'].", ".round($_SESSION['Wrist_stat_value6'] * $multipler).",
						".$_SESSION['Wrist_stat_type7'].", ".round($_SESSION['Wrist_stat_value7'] * $multipler).",
						".$_SESSION['Wrist_stat_type8'].", ".round($_SESSION['Wrist_stat_value8'] * $multipler).",
						".$_SESSION['Wrist_stat_type9'].", ".round($_SESSION['Wrist_stat_value9'] * $multipler).",
						".$_SESSION['Wrist_stat_type10'].", ".round($_SESSION['Wrist_stat_value10'] * $multipler).",
						0, 0, 0, 0, 0, 0, 0, 0, ".round($_SESSION['armor'] * $multipler).", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, -1, 0, 0, 0, 0, ".$_SESSION['itemset'].", 0, 0, 0, 0, 0, 
						".$_SESSION['Wrist_socket_color'].", 1, ".$_SESSION['Wrist_socket_color2'].", 1, ".$_SESSION['Wrist_socket_color3'].", 1, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 12340),";
						echo "</p>";
						
						echo "
						(".$_SESSION['entry']++.", 4, ".$_SESSION['material'].", -1, '".$_SESSION['name']." Hands', 0, 2, 0, 0, 1, 0, 0, 10, ".$_SESSION['allowableclass'].", -1, ".round($_SESSION['ilvl'] * $ilvlmultipler).", 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 10, 
						".$_SESSION['Hands_stat_type1'].", ".round($_SESSION['Hands_stat_value1'] * $multipler).",
						".$_SESSION['Hands_stat_type2'].", ".round($_SESSION['Hands_stat_value2'] * $multipler).",
						".$_SESSION['Hands_stat_type3'].", ".round($_SESSION['Hands_stat_value3'] * $multipler).",
						".$_SESSION['Hands_stat_type4'].", ".round($_SESSION['Hands_stat_value4'] * $multipler).",
						".$_SESSION['Hands_stat_type5'].", ".round($_SESSION['Hands_stat_value5'] * $multipler).",
						".$_SESSION['Hands_stat_type6'].", ".round($_SESSION['Hands_stat_value6'] * $multipler).",
						".$_SESSION['Hands_stat_type7'].", ".round($_SESSION['Hands_stat_value7'] * $multipler).",
						".$_SESSION['Hands_stat_type8'].", ".round($_SESSION['Hands_stat_value8'] * $multipler).",
						".$_SESSION['Hands_stat_type9'].", ".round($_SESSION['Hands_stat_value9'] * $multipler).",
						".$_SESSION['Hands_stat_type10'].", ".round($_SESSION['Hands_stat_value10'] * $multipler).",
						0, 0, 0, 0, 0, 0, 0, 0, ".round($_SESSION['armor'] * $multipler).", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, -1, 0, 0, 0, 0, ".$_SESSION['itemset'].", 0, 0, 0, 0, 0, 
						".$_SESSION['Hands_socket_color'].", 1, ".$_SESSION['Hands_socket_color2'].", 1, ".$_SESSION['Hands_socket_color3'].", 1, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 12340),";
						echo "</p>";
						
						echo "
						(".$_SESSION['entry']++.", 4, ".$_SESSION['material'].", -1, '".$_SESSION['name']." Belt', 0, 2, 0, 0, 1, 0, 0, 6, ".$_SESSION['allowableclass'].", -1, ".round($_SESSION['ilvl'] * $ilvlmultipler).", 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 10, 
						".$_SESSION['Belt_stat_type1'].", ".round($_SESSION['Belt_stat_value1'] * $multipler).",
						".$_SESSION['Belt_stat_type2'].", ".round($_SESSION['Belt_stat_value2'] * $multipler).",
						".$_SESSION['Belt_stat_type3'].", ".round($_SESSION['Belt_stat_value3'] * $multipler).",
						".$_SESSION['Belt_stat_type4'].", ".round($_SESSION['Belt_stat_value4'] * $multipler).",
						".$_SESSION['Belt_stat_type5'].", ".round($_SESSION['Belt_stat_value5'] * $multipler).",
						".$_SESSION['Belt_stat_type6'].", ".round($_SESSION['Belt_stat_value6'] * $multipler).",
						".$_SESSION['Belt_stat_type7'].", ".round($_SESSION['Belt_stat_value7'] * $multipler).",
						".$_SESSION['Belt_stat_type8'].", ".round($_SESSION['Belt_stat_value8'] * $multipler).",
						".$_SESSION['Belt_stat_type9'].", ".round($_SESSION['Belt_stat_value9'] * $multipler).",
						".$_SESSION['Belt_stat_type10'].", ".round($_SESSION['Belt_stat_value10'] * $multipler).",
						0, 0, 0, 0, 0, 0, 0, 0, ".round($_SESSION['armor'] * $multipler).", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, -1, 0, 0, 0, 0, ".$_SESSION['itemset'].", 0, 0, 0, 0, 0, 
						".$_SESSION['Belt_socket_color'].", 1, ".$_SESSION['Belt_socket_color2'].", 1, ".$_SESSION['Belt_socket_color3'].", 1, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 12340),";
						echo "</p>";
						
						echo "
						(".$_SESSION['entry']++.", 4, ".$_SESSION['material'].", -1, '".$_SESSION['name']." Legs', 0, 2, 0, 0, 1, 0, 0, 7, ".$_SESSION['allowableclass'].", -1, ".round($_SESSION['ilvl'] * $ilvlmultipler).", 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 10, 
						".$_SESSION['Legs_stat_type1'].", ".round($_SESSION['Legs_stat_value1'] * $multipler).",
						".$_SESSION['Legs_stat_type2'].", ".round($_SESSION['Legs_stat_value2'] * $multipler).",
						".$_SESSION['Legs_stat_type3'].", ".round($_SESSION['Legs_stat_value3'] * $multipler).",
						".$_SESSION['Legs_stat_type4'].", ".round($_SESSION['Legs_stat_value4'] * $multipler).",
						".$_SESSION['Legs_stat_type5'].", ".round($_SESSION['Legs_stat_value5'] * $multipler).",
						".$_SESSION['Legs_stat_type6'].", ".round($_SESSION['Legs_stat_value6'] * $multipler).",
						".$_SESSION['Legs_stat_type7'].", ".round($_SESSION['Legs_stat_value7'] * $multipler).",
						".$_SESSION['Legs_stat_type8'].", ".round($_SESSION['Legs_stat_value8'] * $multipler).",
						".$_SESSION['Legs_stat_type9'].", ".round($_SESSION['Legs_stat_value9'] * $multipler).",
						".$_SESSION['Legs_stat_type10'].", ".round($_SESSION['Legs_stat_value10'] * $multipler).",
						0, 0, 0, 0, 0, 0, 0, 0, ".round($_SESSION['armor'] * $multipler).", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, -1, 0, 0, 0, 0, ".$_SESSION['itemset'].", 0, 0, 0, 0, 0, 
						".$_SESSION['Legs_socket_color'].", 1, ".$_SESSION['Legs_socket_color2'].", 1, ".$_SESSION['Legs_socket_color3'].", 1, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 12340),";
						echo "</p>";
						
						echo "
						(".$_SESSION['entry']++.", 4, ".$_SESSION['material'].", -1, '".$_SESSION['name']." Feet', 0, 2, 0, 0, 1, 0, 0, 8, ".$_SESSION['allowableclass'].", -1, ".round($_SESSION['ilvl'] * $ilvlmultipler).", 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 10, 
						".$_SESSION['Feet_stat_type1'].", ".round($_SESSION['Feet_stat_value1'] * $multipler).",
						".$_SESSION['Feet_stat_type2'].", ".round($_SESSION['Feet_stat_value2'] * $multipler).",
						".$_SESSION['Feet_stat_type3'].", ".round($_SESSION['Feet_stat_value3'] * $multipler).",
						".$_SESSION['Feet_stat_type4'].", ".round($_SESSION['Feet_stat_value4'] * $multipler).",
						".$_SESSION['Feet_stat_type5'].", ".round($_SESSION['Feet_stat_value5'] * $multipler).",
						".$_SESSION['Feet_stat_type6'].", ".round($_SESSION['Feet_stat_value6'] * $multipler).",
						".$_SESSION['Feet_stat_type7'].", ".round($_SESSION['Feet_stat_value7'] * $multipler).",
						".$_SESSION['Feet_stat_type8'].", ".round($_SESSION['Feet_stat_value8'] * $multipler).",
						".$_SESSION['Feet_stat_type9'].", ".round($_SESSION['Feet_stat_value9'] * $multipler).",
						".$_SESSION['Feet_stat_type10'].", ".round($_SESSION['Feet_stat_value10'] * $multipler).",
						0, 0, 0, 0, 0, 0, 0, 0, ".round($_SESSION['armor'] * $multipler).", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, -1, 0, 0, 0, 0, ".$_SESSION['itemset'].", 0, 0, 0, 0, 0, 
						".$_SESSION['Feet_socket_color'].", 1, ".$_SESSION['Feet_socket_color2'].", 1, ".$_SESSION['Feet_socket_color3'].", 1, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 12340);";
						echo "</p>";
					
						
			
						
			
		}
		
		}
		
	}

?>