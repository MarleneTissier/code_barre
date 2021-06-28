<?php
class CodeCrea
{
    private $number;
    private $element = array(0 => "AAAAAA", 1 => "AABABB", 2 => "AABBAB", 3 => "AABBBA", 4 => "ABAABB", 5 => "ABBAAB", 6 => "ABBBAA", 7 => "ABABAB",
        8 => "ABABBA", 9 => "ABBABA");
    private $elementAC = array(0 => 3211, 1 => 2221, 2 => 2122, 3 => 1411, 4 => 1132, 5 => 1231, 6 => 1114, 7 => 1312,
        8 => 1213, 9 => 3112);
    private $elementB = array(0 => 1123, 1 => 1222, 2 => 2212, 3 => 1141, 4 => 2311, 5 => 1321, 6 => 4111, 7 => 2131,
        8 => 3121, 9 => 2113);
    private $stack;
    private $tableau;
    private $elementA;
    private $colorB;
    private $colorW;
    private $widht;
    private $chiffre1;
    private $chiffre2_7;
    private $chiffre8_13;
    private $stackElement;
    private $i;
    private $n;
    private $temporaire;

    public function __construct($barreCode) {
        if (is_numeric($barreCode)) {
            $this->number = $barreCode;
        } else {
            throw new Exception('MÉ DÉ CHIFFR DUKON', 12);
        }
    }
    public function codeBarre(){
        $this->colorW = " white ";
        $this->colorB = " black ";

        $this->stack = str_split($this->number);
        if (count($this->stack)==8){
            for ($this->i=0; $this->i<8; $this->i++)
            {
                $this->tableau[$this->i] = $this->elementAC[$this->stack[$this->i]];
            }
            ?>
            <div class="codeBarre">
                <div class="frame_left"></div>
                <?php
                for ($this->i=0; $this->i<4; $this->i++){
                    $this->elementA = str_split($this->tableau[$this->i]);
                    for ($this->n=0; $this->n<4; $this->n++){
                        if(is_float($this->n/2)){
                            $this->widht = $this->elementA[$this->n];
                            echo '<div class="'.$this->colorB.'" style="width: '.$this->widht.'px"></div>';
                        }else{
                            $this->widht = $this->elementA[$this->n];
                            echo '<div class="'.$this->colorW.'" style="width: '.$this->widht.'px"></div>';
                        }
                    }
                }
                ?>
                <div>
                    <div class="frame_center"></div>
                </div>
                <?php
                for ($this->i=4; $this->i<8; $this->i++){
                    $this->elementA = str_split($this->tableau[$this->i]);
                    for ($this->n=0; $this->n<4; $this->n++){
                        if(is_float($this->n/2)){
                            $this->widht = $this->elementA[$this->n];
                            echo '<div class="'.$this->colorW.'" style="width: '.$this->widht.'px"></div>';
                        }else{
                            $this->widht = $this->elementA[$this->n];
                            echo '<div class="'.$this->colorB.'" style="width: '.$this->widht.'px"></div>';
                        }
                    }
                }
                ?>
                <div class="frame_right"></div> <! frame fin -->
            </div>
            <?php

            //xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

        } else if (count($this->stack)==13){

            $this->chiffre1 = $this->stack[0];
            for ($this->i=0; $this->i<6; $this->i++)
            {
                $this->chiffre2_7[$this->i] = $this->stack[$this->i+1];
            }
            $this->n = 0;
            for ($this->i=6; $this->i<12; $this->i++)
            {
                $this->chiffre8_13[$this->n] = $this->stack[$this->i + 1];
                $this->n += 1;
            }
            $this->stackElement = str_split($this->element[$this->chiffre1[0]]);

            //commencer code barre
            ?>
            <div class="codeBarre">
                <div class="frame_left"></div>
                <?php

                for($this->i=0; $this->i<count($this->chiffre2_7); $this->i++){
                    if ($this->stackElement[$this->i]=="A"){
                        $this->temporaire = $this->chiffre2_7[$this->i];
                        $this->chiffre2_7[$this->i] = $this->elementAC[$this->temporaire];
                    }else{
                        $this->temporaire = $this->chiffre2_7[$this->i];
                        $this->chiffre2_7[$this->i] = $this->elementB[$this->temporaire];
                    }
                }
                //echo "<p style='color : white'>var_dumb de chiffre2_7 : </p>";
                //var_dump($chiffre2_7);

                for ($this->i=0; $this->i<6; $this->i++){
                    $this->elementA = str_split($this->chiffre2_7[$this->i]);
                    for ($this->n=0; $this->n<4; $this->n++){
                        if(is_float($this->n/2)){
                            $this->widht = $this->elementA[$this->n];
                            echo '<div class="'.$this->colorB.'" style="width: '.$this->widht.'px"></div>';
                        }else{
                            $this->widht = $this->elementA[$this->n];
                            echo '<div class="'.$this->colorW.'" style="width: '.$this->widht.'px"></div>';
                        }
                    }
                }

                ?>
                <div>
                    <div class="frame_center"></div>
                </div>
                <?php
                //milieu code barre


                for($this->i=0; $this->i<count($this->chiffre8_13); $this->i++){
                    $this->temporaire = $this->chiffre8_13[$this->i];
                    $this->chiffre8_13[$this->i] = $this->elementAC[$this->temporaire];
                }
                //echo "<p style='color : white'>var_dumb de chiffre8_13 : </p>";
                //var_dump($chiffre8_13);
                for ($this->i=0; $this->i<count($this->chiffre8_13); $this->i++){
                    $this->elementA = str_split($this->chiffre8_13[$this->i]);
                    for ($this->n=0; $this->n<4; $this->n++){
                        if(is_float($this->n/2)){
                            $this->widht = $this->elementA[$this->n];
                            echo '<div class="'.$this->colorW.'" style="width: '.$this->widht.'px"></div>';
                        }else{
                            $this->widht = $this->elementA[$this->n];
                            echo '<div class="'.$this->colorB.'" style="width: '.$this->widht.'px"></div>';
                        }
                    }
                }
                ?>
                <div class="frame_right"></div> <! frame fin -->
            </div>
            <?php
            //fin code barre
            //echo "<p style='color : white'>code a 13</p>";
            //xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
        }else{
            echo "<p style='color : white'>pas bon</p>";
        }

    }

}

?>
