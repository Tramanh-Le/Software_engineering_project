<?php
/**
 * Created by PhpStorm.
 * User: mgalle19
 * Date: 5/1/2018
 * Time: 2:58 PM
 */

class NewPerson{

    // variables for new user
    private  $NewcancerType;
    private $Newage;
    private $Newgender ;
    private $Newreligion;
    private $NewTreatmentLocation;
    private $NewphaseTreatment_1;
    private $NewphaseTreatment_2;
    private $Newrole;

    public function __construct($age, $CancerType, $gender, $religion, $TreatmentLocation, $PhaseTreatment_1,
                                $PhaseTreament_2, $Role)
    {
        $this->setNewAge($age);
        $this->setNewCancerType($CancerType);
        $this->setNewGender($gender);
        $this->setNewReligion($religion);
        $this->setNewTreatmentLocation($TreatmentLocation);
        $this->setNewPhaseTreatment_1($PhaseTreatment_1);
        $this->setNewPhaseTreatment_2($PhaseTreament_2);
        $this->setNewRole($Role);
    }

    //getters for all variables in the class
    public function getNewCancerType(){return $this ->  NewcancerType;}
    public function getNewAge(){return $this -> Newage;}
    public function getNewGender(){return $this -> Newgender;}
    public function getNewReligion(){return $this -> Newreligion;}
    public function getNewTreatementLoctation(){return $this -> NewTreatmentLocation;}
    public function getNewphaseTreatment_1(){return $this -> NewphaseTreatment_1;}
    public function getNewphaseTreatment_2(){return $this -> NewphaseTreatment_2;}
    public function getNewRole(){return $this -> Newrole;}

    // setters for all variables in the class
    public function setNewCancerType( $c){ $this ->NewcancerType =$c;}
    public function setNewAge($a){$this -> Newage = $a;}
    public function setNewGender($g){$this ->Newgender = $g;}
    public function setNewReligion($r){$this ->Newreligion = $r;}
    public function setNewTreatmentLocation($TL){$this ->NewTreatmentLocation = $TL;}
    public function setNewPhaseTreatment_1($PT){$this ->NewphaseTreatment_1=$PT;}
    public function setNewPhaseTreatment_2($PT){$this ->NewphaseTreatment_2=$PT;}
    public function setNewRole($r){$this ->Newrole = $r;}

}