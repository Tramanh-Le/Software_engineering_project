<?php
/**
 * Created by PhpStorm.
 * User: mgalle19
 * Date: 5/1/2018
 * Time: 3:01 PM
 */

class Person{

    // variables for comparator
    private $cancerType;
    private $age;
    private $gender;
    private $religion;
    private $TreatmentLocation;
    private $phaseTreatment_1;
    private $phaseTreatment_2;
    private $role;

    // current persons point total
    private $points;

    public function __construct($age, $CancerType, $gender, $religion, $TreatmentLocation, $PhaseTreatment_1,
                                $PhaseTreament_2, $Role)
    {
        $this->setAge($age);
        $this->setCancerType($CancerType);
        $this->setGender($gender);
        $this->setReligion($religion);
        $this->setTreatmentLocation($TreatmentLocation);
        $this->setPhaseTreatment_1($PhaseTreatment_1);
        $this->setPhaseTreatment_2($PhaseTreament_2);
        $this->setRole($Role);
    }

    // assigns the points to each comparator category
    public function getpoints(){return $this -> points;}

    // call the existing list of variables
    public function getCancerType(){return $this -> cancerType;}
    public function getAge(){return $this -> age;}
    public function getGender(){return $this -> gender;}
    public function getReligion(){return $this -> religion;}
    public function getTreatementLoctation(){return $this -> TreatmentLocation;}
    public function getphaseTreatment_1(){return $this -> phaseTreatment_1;}
    public function getphaseTreatment_2(){return $this -> phaseTreatment_2;}
    public function getRole(){return $this -> role;}


    public function setPoints($p){$this ->points = $p;} // assigning the point system
    public function setCancerType($c){$this ->cancerType = $c;}
    public function setAge($a){$this ->age = $a;}
    public function setGender($g){$this ->gender = $g;}
    public function setReligion($r){$this ->religion = $r;}
    // setters for point-system algorithm
    public function setTreatmentLocation($TL){$this ->TreatmentLocation = $TL;}
    // setters for Treatment Phase: The cancer stage in which the applicant is currently experiencing
    // Phase Treatment 1 and 2 are two available options an applicant can select from the application
    public function setPhaseTreatment_1($PT){$this ->phaseTreatment_1=$PT;}
    public function setPhaseTreatment_2($PT){$this ->phaseTreatment_2=$PT;}

    // setter for the Applicant Role when applying: Patient, Spouse, Parent, Sibling, Caregiver, Widower, etc
    public function setRole($r){$this ->role = $r;}
}