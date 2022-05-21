<style>
<?php

include '../style1.css';
include "../translate.php";

?>
</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<script>
var name1 = prompt('Are you experience any of these symptoms?\n\na) Fever, Cough, Headache, Abdominal pain, \n Yellow-eye, Vomiting, Constipation,\nLoose-motion,Burning chest, Itching, Skin-Lashion\n\n b) Chest pain, Breathlesness, Palpitation,\nVirtigo, Swelling leg, Senseless, Headache, Neck-pain\n\n c) Pregnency , P/V bleeding during pregnency,\nLess fatal movement, ecxcessive whitish discharge P/V, Severe lower abdominal pain puring menestrition, Lower abdominal pain\n \nd) Fractures, Dislocation, \nJoint pain, Swelling of joint, Bone Pain\n \ne) bleeding gum, gum-swelling,\n toothache, carries teeth');
//-------------If chose single option-----------------
if(name1=='a'){
 alert('Contact with our Medicine specialist...');
 }
		else if(name1=='b'){
		 alert('Contact with our Cardilogist...');
		 }
		else if(name1=='c'){
		 alert('Contact with our Gynocologist...');
		 }
		else if(name1=='d'){
	 alert('Contact with our Orthopedic ...');
 			}
				else if(name1=='e'){
	 alert('Contact with our Dentist...');
 			}
			//-------------If chose double options-----------------
						else if(name1=='ab'){
 			var name2= prompt('Are you experience any of these symptoms?\n\na) Fever, Cough, Abdominal pain, \n Yellow-eye, Vomiting, Constipation,\nLoose-motion,Burning chest, Itching, Skin-Lashion\n\n b) Chest pain, Breathlesness, Palpitation,\nVirtigo, Swelling leg, Senseless,  Neck-pain\n\n ');
		if(name2=='a'){
 alert('Contact with our Medicine specialist...');
			}
			else if(name2=='b')
 alert('Contact with our Cardilogist...');
			
			}
				else if(name1=='ac'){
	 alert('Contact with our Medicine specialist or  Gynocologist...');
 			}
			
				else if(name1=='ad'){
	 alert('Contact with our Medicine specialist or Orthopedic ...');
 			}
			
				else if(name1=='ae'){
	 alert('Contact with our Medicine specialist or  Dentist...');
 			}
							else if(name1=='bc'){
	 alert('Contact with our Cardilogist or  Gynocologist...');
 			}
			
				else if(name1=='bd'){
	 alert('Contact with our Cardilogist or Orthopedic ...');
 			}
			
				else if(name1=='be'){
	 alert('Contact with our Cardilogist or  Dentist...');
	
 			}
	else if(name1=='cd'){
	 alert('Contact with our Gynocologist or Orthopedic specialist ...');
 			}
			
				else if(name1=='ce'){
	 alert('Contact with our Gynocologist or  Dentist...');
	 }
				else if(name1=='de'){
	 alert('Contact with our Orthopedic specialist or  Dentist...');	
	 }
///------- finish c----------------

</script>
<div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
doctors name;
</body>
</html>
