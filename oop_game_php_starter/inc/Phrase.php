<?php
 class Phrase
 {

public $currentPhrase;
public $selected = array();
public $phrases =
[
  'Boldness be my friend',
  'Leave no stone unturned',
  'Broken crayons still color',
  'The adventure begins',
  'Dream without fear',
  'Love without limits',
  'Propane and Propane Accessories',
  'The Quick Brown Fox Jumps Over the Lazy Dog'
];

public function __construct($phrase=null, $selected= null )
{
    if (!empty($phrase)) {
              $this->currentPhrase = $phrase;
    }
    if (!empty($selected)){
      $this->selected = $selected;
    }
    if (!isset($phrase)) {
        $random = rand(0, 8);
        $this->currentPhrase = $this->phrases[$random];
    }
}

public function addPhraseToDisplay()
{
    $characters = str_split(strtolower($this->currentPhrase));
    $output = "<div class='section' id='phrase' >";
    $output .= "<ul>";
    foreach ($characters as $character) {
    if (in_array($character, $this->selected)) {
        $output .= "<li class='show letter'>" . $character . "</li>";
    } else if ($character == " ") {
        $output .= "<li class='space'>" . $character . "</li>";
    } else {
      $output .= "<li class='hide letter'>" . $character . "</li>";
      }

    }
    $output .= "</ul>";
    $output .= "</div>";
    return $output;
    //echo $phrase->addPhraseToDisplay();

}

public function getLetterArray() {
      return array_unique(str_split(str_replace(' ', '', strtolower($this->currentPhrase))));
  }

public function checkLetter($letter)
{
      if (in_array($letter, $this->getLetterArray())) {
          return true;
      } else {
          return false;
      }
  }

public function numberLost()
{
  return count(array_diff($this->selected, $this->getLetterArray()));
  }

}
//$Phrase = new Phrase;

?>
