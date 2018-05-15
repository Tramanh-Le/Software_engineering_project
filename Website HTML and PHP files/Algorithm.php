<?php
/**
 * Created by PhpStorm.
 * User: mgalle19
 * Date: 5/1/2018
 * Time: 2:25 PM
 */

class Algorithm
{


    // variables for new user
    private $NewcancerType;
    private $Newage;
    private $Newgender;
    private $Newreligion;
    private $NewTreatmentLocation;
    private $Newrole;
    private $NewId;
    private $NewFirstName;
    private $NewLastName;
    private $NewEmail;
    private $NewTreatmentPhase;
    private $NewMatched;

    // variables for comparator
    private $cancerType;
    private $age;
    private $gender;
    private $religion;
    private $TreatmentLocation;
    private $role;
    private $Id;
    private $FirstName;
    private $LastName;
    private $email;
    private $treatementPahse;
    private $matched;


    private $points;

    public function __construct()
    {
    }

    public function setNewPerson($Id,$age, $CancerType, $gender, $religion, $TreatmentLocation,
                                 $Role,$first,$last,$email,$treatment,$matched)
    {
        $this->setNewId($Id);
        $this->setNewAge($age);
        $this->setNewCancerType($CancerType);
        $this->setNewGender($gender);
        $this->setNewReligion($religion);
        $this->setNewTreatmentLocation($TreatmentLocation);
        $this->setNewRole($Role);
        $this->setNewFirstName($first);
        $this->setNewLastName($last);
        $this->setNewEmail($email);
        $this->setNewTreatmentPhase($treatment);
        $this->setNewMatched($matched);
    }

    public function setPerson($id,$age, $CancerType, $gender, $religion, $TreatmentLocation,$Role,$first,$last,$email,$treatment,$matched)
    {
        $this->setId($id);
        $this->setAge($age);
        $this->setCancerType($CancerType);
        $this->setGender($gender);
        $this->setReligion($religion);
        $this->setTreatmentLocation($TreatmentLocation);
        $this->setRole($Role);
        $this->setFirstName($first);
        $this->setLastName($last);
        $this->setEmail($email);
        $this->setTreatmentPhase($treatment);
        $this->setMatched($matched);
    }


    //getters for all variables in the class
    public function getNewCancerType(){return $this->NewcancerType;}
    public function getNewAge(){return $this->Newage;}
    public function getNewGender(){return $this->Newgender;}
    public function getNewReligion(){return $this->Newreligion;}
    public function getNewTreatementLoctation(){return $this->NewTreatmentLocation;}
    public function getNewRole(){return $this->Newrole;}
    public function getNewId(){return $this ->NewId;}
    public function getNewFirstName(){return $this->NewFirstName;}
    public function getNewLastName(){return $this->NewLastName;}
    public function getNewEmail(){return $this->NewEmail;}
    public function getNewTreatmentPhase(){return $this->NewTreatmentPhase;}
    public function getNewMachted(){return $this->NewMatched;}

    // assigns the points to each comparator category
    public function getpoints(){return $this->points;}

    // call the existing list of variables
    public function getCancerType(){return $this->cancerType;}
    public function getAge(){return $this->age;}
    public function getGender(){return $this->gender;}
    public function getReligion(){return $this->religion;}
    public function getTreatementLoctation(){return $this->TreatmentLocation;}
    public function getRole(){return $this->role;}
    public function getId(){return $this-> Id;}
    public function getFirstName(){return $this->FirstName;}
    public function getLastName(){return $this->LastName;}
    public function getEmail(){return $this->email;}
    public function getTreatmentPhase(){return $this->treatementPahse;}
    public function getMachted(){return $this->matched;}
    // setters for all variables in the class
    public function setNewCancerType($c){$this->NewcancerType = $c;}
    public function setNewAge($a){$this->Newage = $a;}
    public function setNewGender($g){$this->Newgender = $g;}
    public function setNewReligion($r){$this->Newreligion = $r;}
    public function setNewTreatmentLocation($TL){$this->NewTreatmentLocation=$TL;}
    public function setNewRole($r){$this->Newrole = $r;}
    public function setPoints($p){$this->points = $p;}
    public function setNewId($id){$this ->NewId = $id;}
    public function setNewFirstName($name){$this->NewFirstName=$name;}
    public function setNewLastName($name){$this->NewLastName=$name;}
    public function setNewEmail($e){$this->NewEmail=$e;}
    public function setNewTreatmentPhase($T){$this->NewTreatmentPhase=$T;}
    public function setNewMatched($m){$this->NewMatched=$m;}

    // assigning the point system
    public function setCancerType($c){$this->cancerType = $c;}
    public function setAge($a){$this->age = $a;}
    public function setGender($g){$this->gender = $g;}
    public function setReligion($r){$this->religion = $r;}
    public function setId($i){$this->Id = $i;}
    public function setFirstName($name){$this->FirstName=$name;}
    public function setLastName($name){$this->LastName=$name;}
    public function setEmail($e){$this->Email=$e;}
    public function setTreatmentPhase($T){$this->TreatmentPhase=$T;}
    public function setMatched($m){$this->matched=$m;}
    // setters for point-system algorithm
    public function setTreatmentLocation($TL){$this->TreatmentLocation = $TL;}
    // setters for Treatment Phase: The cancer stage in which the applicant is currently experiencing
    // Phase Treatment 1 and 2 are two available options an applicant can select from the application
    // setter for the Applicant Role when applying: Patient, Spouse, Parent, Sibling, Caregiver, Widower, etc
    public function setRole($r){$this->role = $r;}

    // calculating the age to assign points
    public function calulateAge($NewA, $a)
    {
        //$age = abs($NewA - $a); // Assigning age as a new age where the NewA uses the previous age
        //$Newpoints = 0;
        if ($NewA=$a)
           $Newpoints = 50;  // If the age difference between matched pairs is less than 5 years, the algorithm assigns the pair 50 points
        //elseif ($age <= 10)
          //  $Newpoints = 20; // If the age difference between matched pairs is between 6 and 10 years, the algorithm assigns the pair 20 points
        //else if (age <= 15)
          //  $Newpoints = 10; // If the age difference between matched pairs is between 11 and 15 years, the algorithm assigns the pair 10 points
        //else
//            $Newpoints = 0; // If the age is out of range above 15 years, assign no points

        $Newpoints = Algorithm::getpoints() + $Newpoints;
        $this->setPoints($Newpoints);
    }

    // Calculating the point system for the Cancer Type - this is our most important match algorithm
    public function calulateCancerType($newCancerType, $CancerType)
    {
        $Newpoints = 0;
        if ($newCancerType == $CancerType) // If the cancer type between two applicants are a complete match, assign full points: 110
            $Newpoints = 110;
        else
            $Newpoints = 0; // If not, assign no points


        $Newpoints = Algorithm::getpoints() + $Newpoints;
        $this->setPoints($Newpoints);
    }

    // Calculating the point system for Gender - participants should be matched based on like-genders
    public function calulateGender($newGender, $Gender)
    {
        $Newpoints = 0;
        if ($newGender == $Gender) // If the gender are the same, assign 20 points.
            $Newpoints = 20;
        else
            $Newpoints = 0; // If gender do not match, no points assigned.

        $Newpoints = Algorithm::getpoints() + $Newpoints;
        $this->setPoints($Newpoints);
    }

    // Calculating the point system for matching religion
    public function calulateReligion($newReligion, $Religion)
    {
        $Newpoints = 0;
        if ($newReligion == $Religion) // Assign 15 points if the religion matches
            $Newpoints = 15;
        else
            $Newpoints = 0; // If religion do not match, no points are assigned


        $Newpoints = Algorithm::getpoints() + $Newpoints;
        $this->setPoints($Newpoints);
    }

    // Calculating the point system for where participants receive treatments
    public function calulateTreatmentLocation($newTL, $TL)
    {
        $Newpoints = 0;
        if ($newTL == $TL) // Assign 20 points for applicants who receive treatment from the same location
            $Newpoints = 20;
        else
            $Newpoints = 0; // Assign no points if location do not match

        $Newpoints = Algorithm::getpoints() + $Newpoints;
        $this->setPoints($Newpoints);
    }

    // Calculating the point system for the role the applicant is looking for in the matched person
    public function calulateRole($newRole, $Role){
        $Newpoints=0;

        if($newRole == $Role) // Assign 10 points for matched pairs that share the same role
            $Newpoints = 10;
        else
            $Newpoints = 0;

        $Newpoints = Algorithm::getpoints() + $Newpoints;
        $this->setPoints($Newpoints);
}

public function calulateTreatmentphase($newTreat,$treat)
{
    $Newpoints=0;
    if ($newTreat == $treat) // Assign 10 points for matched pairs that share the same treatmentphase
        $Newpoints = 20;
    else
        $Newpoints = 0;

    $Newpoints = Algorithm::getpoints() + $Newpoints;
    $this->setPoints($Newpoints);
}

// Execute all functions and combine points from all categories.
    public function runAlgorithm(){
        Algorithm::calulateTreatmentphase(Algorithm::getNewTreatmentPhase(),Algorithm::getTreatmentPhase());
        Algorithm::calulateCancerType(Algorithm::getNewCancerType(),Algorithm::getCancerType());
        Algorithm::calulateGender(Algorithm::getNewGender(),Algorithm::getGender());
        Algorithm::calulateReligion(Algorithm::getNewReligion(),Algorithm::getReligion());
        Algorithm::calulateTreatmentLocation(Algorithm::getNewTreatementLoctation(),Algorithm::getTreatementLoctation());
        Algorithm::calulateRole(Algorithm::getNewRole(),Algorithm::getRole());

    return  Algorithm::getpoints(); // The highest total points is 225 points - which means that both applicants have everything in common.
}
    public function printNewperson(){
        print("ID: ");
        print($this->getnewId());
        print(" Age: ");
        print($this->getnewAge());
        print(" Cancer Type: ");
        print($this->getNewCancerType());
        print(" Gender: ");
        print($this->getGender());
        print(" Religion: ");
        print($this->getNewReligion());
        print(" Treatement Loctation: ");
        print($this->getNewTreatementLoctation());
        print(" Role: ");
        print($this->getNewRole());
        print("\n");
        print($this->getNewFirstName());
        print( " Phase Treatment 1: ");
        print($this->getNewLastName());
        print( " Phase Treatment 2: ");
        print($this->getNewEmail());
        print(" Role: ");
        print($this->getNewTreatmentPhase());
        print("\n");
    }

    public function printPerson(){
        print("ID: ");
        print($this->getId());
        print(" Age: ");
        print($this->getAge());
        print(" Cancer Type: ");
        print($this->getCancerType());
        print(" Gender: ");
        print($this->getGender());
        print(" Religion: ");
        print($this->getReligion());
        print(" Treatement Loctation: ");
        print($this->getTreatementLoctation());
        print( " Phase Treatment 1: ");
        print(" Role: ");
        print($this->getRole());
        print( " Points: ");
        print($this->getpoints());
        print("\n");
        print($this->getFirstName());
        print( " Phase Treatment 1: ");
        print($this->getLastName());
        print( " Phase Treatment 2: ");
        print($this->getEmail());
        print(" Role: ");
        print($this->getTreatmentPhase());
        print("\n");
    }

}