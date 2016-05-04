<!DOCTYPE html>
<html>
	<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Mixit.Click - Random Drink Generator</title>
<link href="cntr.css" rel="stylesheet" type="text/css" />
</head>
	<body>
	<div class="container">
	
	<div class="header">
		<h1>Mixit Logo</h1>
	</div> <!-- end header -->
	
	<div class="content">
	      <?php
// ARRAYS - figure out a way to have users add / remove options 
$drink = array('cocktail','sour','fizz','smash','punch','flip','swizzle','rickey');
$spirit = array("rum","tequila","gin","vodka","whiskey","brandy");
$sugar = array('sugar cube','simple syrup','agave','honey','maple syrup','jam');
$liqueur = array('elderflower liqueur','sweet vermouth','almond liqueur','triple sec','creme de cassis','maraschino liqueur');
$citrus = array('lemon','lime','orange','grapefruit','tangerine','kumquat');
$fruit = array("cherry","berry","cucumber","peach","apricot","apple");
$herb = array('mint','rosemary','cilantro','thyme','basil','sage');
$spice = array('nutmeg','clove','ginger','cinnamon','chili','vanilla');
$bitters = array('aromatic','citrus','peach','cherry','chocolate','wild');

// DICE - auto-adjust to new array contents
$drinkLen = count($drink,0) - 1;
$spiritLen = count($spirit,0) - 1;
$sugarLen = count($sugar,0) - 1;
$liqueurLen = count($liqueur,0) - 1;
$citrusLen = count($citrus,0) - 1;
$fruitLen = count($fruit,0) - 1;
$herbLen = count($herb,0) - 1;
$spiceLen = count($spice,0) - 1;
$bittersLen = count($bitters,0) - 1;

// INGREDIENTS - randomly chosen from above arrays, used throughout page
$type_drink = $drink[rand(0,$drinkLen)];
$type_spirit = $spirit[rand(0,$spiritLen)];
$type_sugar = $sugar[rand(0,$sugarLen)];
$type_liqueur = $liqueur[rand(0,$liqueurLen)];
$type_citrus = $citrus[rand(0,$citrusLen)];
$type_fruit = $fruit[rand(0,$fruitLen)];
$type_herb = $herb[rand(0,$herbLen)];
$type_spice = $spice[rand(0,$spiceLen)];
$type_bitters = $bitters[rand(0,$bittersLen)];

switch ($type_drink):
    case 'cocktail': 
    	$name_drink = ucfirst($type_bitters) . " " . ucfirst($type_spirit) . " " . ucfirst($type_drink);
    	break;
    case 'smash':
    	$name_drink  = ucfirst($type_herb) . " " . ucfirst($type_fruit) . " " . ucfirst($type_spirit) . " " . ucfirst($type_drink); // remove fruit?
    	break;
    case 'flip':
    	$name_drink  = ucfirst($type_spice) . " " . ucfirst($type_spirit) . " " . ucfirst($type_drink);
    	break;
    case 'swizzle':
    	$name_drink = ucfirst($type_citrus) . " " . ucfirst($type_bitters) . " " . ucfirst($type_spirit) . " " . ucfirst($type_drink); // remove bitters?
    	break;
    case 'rickey':
    	$name_drink = ucfirst($type_spirit) . " " . ucfirst($type_citrus) . " " . ucfirst($type_drink);
    	break;
    default:
    	$name_drink = ucfirst($type_citrus) . " " . ucfirst($type_spirit) . " " . ucfirst($type_drink);
    	break;
    	
endswitch;

// ------------------------------- edit BELOW this line -------------------------------------------------------

// VARIABLES - other code bits in common usage on page, start of HTML tags
$bonus = "<h2 class='bonus-toggle button highlight'>MixItUp&trade;</h2><ul class='bonus-list' style='display:none;'>";
$method = "<h2>How to MixIt</h2>";
$pro_tip = "<p class='pro-tip'>* For added complexity, combine smaller amounts of both sweeteners.</p>";
// how to add secondary flavor without overcomplicating? it works for now, but do I want to have it in a different order for different drinks, such as Citrus Spirit Punch and Spirit Citrus Rickey, Citrus Spirit Sour, Citrus Spirit Swizzle, Bitters Spirit Cocktail, Citrus Spirit Fizz, Spice Spirit Flip, Herb Spirit Smash
//$type_flavor = "flavor";
//$name_drink = ucfirst($type_spirit) . " " . ucfirst($type_flavor) . " " . ucfirst($type_drink);
$type_sweet = $type_sugar . " / " . $type_liqueur;
// $std_base = "<li>" . $amt_spirit . " fl oz " . $type_spirit . "</li>"; IF BEFORE switch, won't contain AMTs
//
//function sugarSwitch() {
//	switch ($type_sugar):
//		case 'sugar cube':
//			$amt_sweet = "2 sugar cubes ";
//			echo "<li>" . $amt_sweet . " OR 2 fl oz " . $type_liqueur . " *</li>";
//			break;
//		default:
//			$amt_sweet = "2 fl oz " . $type_sugar;
//			echo "<li>" . $amt_sweet . " OR " . $type_liqueur . " *</li>";
//	endswitch;
//}


// CONTENT - start of ECHO; for broad elements (page title, v. common ingredients)  ----------------------------------
echo "<h1>" . $name_drink . "</h1>";
echo "<h2>Base Ingredients</h2>";
echo "<ul>";
//		<li>" . $amt_spirit . " fl oz " . $type_spirit . "</li>"; confirm MUST be in switch b/c punch is dumb
// look at adding "Tool" section - glass, shaker, bar spoon, etc.
// add links to descriptions/photos of glassware

switch ($type_drink):
	case 'punch':
		$amt_spirit = "3";
//		$amt_sweet = "2 fl oz " . $type_sugar;
// 		fixed below for unique case of 'punch' + 'sugar cube'
		echo "<li>" . $amt_spirit . " fl oz <strong>" . $type_spirit . "</strong></li>";
			switch ($type_sugar):
				case 'sugar cube':
					$amt_sweet = "2 <strong>sugar cubes</strong> ";
					echo "<li>" . $amt_sweet . " OR 2 fl oz " . $type_liqueur . " *</li>";
					break;
				default:
					$amt_sweet = "2 fl oz <strong>" . $type_sugar . "</strong>";
					echo "<li>" . $amt_sweet . " OR <strong>" . $type_liqueur . "</strong> *</li>";
			endswitch;
//		echo "<li>" . $amt_sweet . " OR " . $type_liqueur . " liqueur </li>";
		break;
		
	case 'rickey':
		$amt_spirit = "2";
		echo "<li>" . $amt_spirit . " fl oz <strong>" . $type_spirit . "</strong></li>";		
		break;
	default:		
		$amt_spirit = "2";
		echo "<li>" . $amt_spirit . " fl oz <strong>" . $type_spirit . "</strong></li>";
			switch ($type_sugar):
				case 'sugar cube':
					$amt_sweet = "1 <strong>sugar cube</strong> ";
					echo "<li>" . $amt_sweet . " OR 1 fl oz <strong>" . $type_liqueur . "</strong> *</li>";
					break;
				default:
					$amt_sweet = "1 fl oz <strong>" . $type_sugar . "</strong>";
					echo "<li>" . $amt_sweet . " OR <strong>" . $type_liqueur . "</strong> *</li>";
			endswitch;
//		return sugarSwitch();
//		echo "<li>" . $amt_sweet . " OR " . $type_liqueur . " liqueur </li>";
endswitch;
	      
// CONTENT CON'T - bulk of unique copy/HTML will go here ------------------------------------
switch ($type_drink):
    case 'cocktail':    
        // 2 fl oz spirit, 1 fl oz sugar/liqueur
        echo "<li>4 drops <strong>" . $type_bitters . " bitters</strong></li></ul>";
        echo $bonus; // citrus, fruit, herb, spice
        echo "<li>" . $type_citrus . "</li>
        	<li>" . $type_fruit . "</li><li>" . $type_herb . "</li><li>" . $type_spice . "</li></ul>";
        echo $method;
        echo "<p>Place ice in a cocktail shaker or stirring vessel. Add all recipe ingredients. Stir, then strain the drink into the glass. Garnish with " . $type_citrus . " peel.</p>";
        break;
        
        
    case 'sour':
        // 2 fl oz spirit, 1 fl oz sugar/liqueur
        echo "<li>1 fl oz <strong>" . $type_citrus . " juice</strong></li></ul>";
        echo "<h2>Recommended</h2>";
        echo "<ul><li>1 <strong>egg white</strong></li></ul>";
        echo $bonus; // fruit, herb, spice, bitters
        echo "<li>" . $type_fruit . "</li><li>" . $type_herb . "</li>
        <li>" . $type_spice . "</li><li>" . $type_bitters . " bitters</li></ul>";
        echo $method;
        echo "<p>Place ice in a cocktail shaker. Add all recipe ingredients. Shake well and strain the drink into a cocktail glass. Garnish with a fresh [slice of] " . $type_fruit . ".</p>";
        break;
        
        
    case 'fizz':
        // 2 fl oz spirit, 1 fl oz sugar/liqueur
        echo "<li>1 fl oz <strong>" . $type_citrus . " juice</strong></li><li><strong>club soda</strong></li></ul>";
        echo "<h2>Recommended</h2>";
        echo "<ul><li>1 <strong>egg white</strong></li></ul>";
        echo $bonus; // fruit, herb, spice, bitters
        echo "<li>" . $type_fruit . "</li><li>" . $type_herb . "</li>
        <li>" . $type_spice . "</li><li>" . $type_bitters . " bitters</li></ul>";
        echo $method;
        echo "<p>In a large cocktail shaker, combine all ingredients except club soda. Shake vigorously for 25 seconds. Add ice, then shake for additional 30 seconds. Strain mixture into a highball glass. Gently top with club soda, garnish, and serve.</p>";
        break;
        
        
    case 'smash':
        // 2 fl oz spirit, 1 fl oz sugar/liqueur; use more sweetener if NO fruit
        echo "<li><strong>" . $type_herb . "</strong> (to taste)</li></ul>";
        echo "<h2>Recommended</h2>";
        echo "<ul><li>1 fl oz <strong>" . $type_citrus . " juice</strong></li><li><strong>" . $type_fruit . "</strong></li></ul>";
        echo $bonus; // spice, bitters
        echo "<li>" . $type_spice . "</li><li>" . $type_bitters . " bitters</li></ul>";
        echo $method;
        echo "<p>In a large cocktail shaker, muddle " . $type_fruit . ", " . $type_herb . ", and " . $type_sweet . ". Add " . $type_spirit . ", " . $type_citrus . " juice, and crushed ice. Shake well, then pour everything into a rocks glass or julep cup. Garnish with " . $type_herb . " and serve. For a less cloudy drink, strain into glass filled with crushed ice.</p>";
        break;
        
        
    case 'punch':
    	// 3 fl oz spirit, 2 fl oz sugar/liqueur
    	// . $type_spirit . ", " . $type_citrus . ", and " . $type_sweet . 
		echo "<li>1 fl oz <strong>" . $type_citrus . " juice</strong></li></ul>";
		echo $bonus; // fruit, herb, spice, bitters
		echo "<li>" . $type_fruit . "</li><li>" . $type_herb . "</li>
        <li>" . $type_spice . "</li><li>" . $type_bitters . " bitters</li></ul>";
		echo $method;
		echo "<p>Combine all ingredients in a large cocktail shaker. Shake for 30 seconds. Pour into a highball glass. Garnish with " . $type_fruit . " and serve.</p>";
		break;
		
		
	case 'flip':
		// 2 fl oz spirit, 1 fl oz sugar/liqueur
		// . $type_spirit . " and " . $type_sweet .
		echo "<li><strong>" . $type_spice . "</strong> (to taste)</li></ul>";
		echo $bonus; // citrus, fruit, herb, bitters
		echo "<li>" . $type_citrus . "</li><li>" . $type_fruit . "</li><li>" . $type_herb . "</li>
		<li>" . $type_bitters . " bitters</li></ul>";
		echo $method;
		echo "<p>Combine liquid ingredients in a large cocktail shaker. Dry shake (no ice) for 25 seconds, then add ice and shake for 30 seconds. Strain into a cocktail glass. Dust with " . $type_spice . " and serve.</p>";
		break;
		
		
	case 'swizzle':
		// 2 fl oz spirit, 1 fl oz sugar/liqueur
		echo "<li>1 fl oz <strong>" . $type_citrus . " juice</strong></li><li>4 drops <strong>" . $type_bitters . " bitters</strong></li></ul>";
		echo $bonus; // fruit, herb, spice
		echo "<li>" . $type_fruit . "</li><li>" . $type_herb . "</li>
        <li>" . $type_spice . "</li></ul>";
		echo $method;
		echo "<p>Combine all ingredients in a Collins glass. Stir well with a bar spoon. Fill glass all the way with crushed or shaved ice.&dagger; Swizzle until the glass frosts. Top with more ice to fill. Top with another dash of bitters — or enough to cover the top. Garnish with " . $type_fruit . ".</p>";
		echo "<p>&dagger; A Lewis bag works well for crushing ice.</p>";
		break;
		
		
	case 'rickey':
		// 2 fl oz spirit, 0 sugar/liqueur
		echo "<li>1 fl oz <strong>" . $type_citrus . " juice</strong></li><li><strong>club soda</strong></li></ul>";
		echo $bonus; // sugar/liqueur, fruit, herb, spice, bitters
			switch ($type_sugar):
				case 'sugar cube':
					$amt_sweet = "1 sugar cube ";
					echo "<li>" . $amt_sweet . " OR 1 fl oz " . $type_liqueur . " *</li>";
					break;
				default:
					$amt_sweet = "1 fl oz " . $type_sugar;
					echo "<li>" . $amt_sweet . " OR " . $type_liqueur . " *</li>";
			endswitch;
		echo "<li>" . $type_fruit . "</li><li>" . $type_herb . "</li>
        <li>" . $type_spice . "</li><li>" . $type_bitters . " bitters</li></ul>";
		echo $method;
		echo "<p>In a highball glass, combine " . $type_spirit . ", " . $type_citrus . " juice, and " . $type_citrus . " slices. Add ice, top with club soda, and stir. Garnish with a fresh " . $type_citrus . " wedge.</p>";
		break;

    default:
        echo "<br/>We don't have that recipe built yet.";
endswitch;

echo $pro_tip; // put @ end of (each) sweet section, maybe ? OR probably in the bonus
	      

	      
	      
	      
	      ?> <!-- PHP ends ----------------------------------------------------------->
</div><!-- end content -->

</div><!-- end container -->

<div class="footer">
    <p><a href="disclaimer.html">Disclaimer</a> | Site Created by Terry Manning</p>
</div><!-- end .footer -->
    
    <script src="jquery.js"></script>
	<script src="app.js"></script>
    </body>
</html>