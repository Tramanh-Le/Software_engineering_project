package Algorithm;
import java.util.ArrayList;
import java.util.List;

public class Algorithm {
	//Default constructor
	public Algorithm(){	}
	
	//constructor for new user
	Algorithm(int age, String CancerType, char gender,String religion,String TreatmentLocation,String phaseTreatment_1,
			  String PhaseTreament_2,String Role)
	{
		setNewCancerType(CancerType);
		setNewAge(age);
		setNewGender(gender);
		setNewReligion(religion);
		setNewTreatmentLocation(TreatmentLocation);
		setNewPhaseTreatment_1(phaseTreatment_1);
		setNewPhaseTreatment_2(PhaseTreament_2);
		setNewRole(Role);
	}
	
	//constructor for user from database
	Algorithm(int age, String CancerType, char gender,String religion,String TreatmentLocation,String phaseTreatment_1,
			  String PhaseTreament_2,String Role, int points)
	{
		setCancerType(CancerType);
		setAge(age);
		setGender(gender);
		setReligion(religion);
		setTreatmentLocation(TreatmentLocation);
		setPhaseTreatment_1(phaseTreatment_1);
		setPhaseTreatment_2(PhaseTreament_2);
		setRole(Role);
		setPoints(points);
	}
	
	// variables for new user
	private String NewcancerType;
	private int Newage;
	private char Newgender;
	private String Newreligion;
	private String NewTreatmentLocation;
	private String NewphaseTreatment_1;
	private String NewphaseTreatment_2;
	private String Newrole;
	
	// variables for comparator
	private String cancerType;
	private int age;
	private char gender;
	private String religion;
	private String TreatmentLocation;
	private String phaseTreatment_1;
	private String phaseTreatment_2;
	private String role;
	
	// current persons point total
	int points;
	
	//getters for all variables in the class
	String getNewCancerType(){return NewcancerType;}
	int getNewAge(){return Newage;}
	char getNewGender(){return Newgender;}
	String getNewReligion(){return Newreligion;}
	String getNewTreatementLoctation(){return NewTreatmentLocation;}
	String getNewphaseTreatment_1(){return NewphaseTreatment_1;}
	String getNewphaseTreatment_2(){return NewphaseTreatment_2;}
	String getNewRole(){return Newrole;}
	
	// assigns the points to each comparator category
	int getpoints(){return points;}
	
	// call the existing list of variables 
	String getCancerType(){return cancerType;}
	int getAge(){return age;}
	char getGender(){return gender;}
	String getReligion(){return religion;}
	String getTreatementLoctation(){return TreatmentLocation;}
	String getphaseTreatment_1(){return phaseTreatment_1;}
	String getphaseTreatment_2(){return phaseTreatment_2;}
	String getRole(){return role;}
	
	
	
	// setters for all variables in the class
	void setNewCancerType(String c){NewcancerType =c;}
	void setNewAge(int a){Newage = a;}
	void setNewGender(char g){Newgender = g;}
	void setNewReligion(String r){Newreligion = r;}
	void setNewTreatmentLocation(String TL){NewTreatmentLocation = TL;}
	void setNewPhaseTreatment_1(String PT){NewphaseTreatment_1=PT;}
	void setNewPhaseTreatment_2(String PT){NewphaseTreatment_2=PT;}
	void setNewRole(String r){Newrole = r;}
	
	void setPoints(int p){points = p;} // assigning the point system 
	void setCancerType(String c){cancerType = c;}
	void setAge(int a){age = a;}
	void setGender(char g){gender = g;}
	void setReligion(String r){religion = r;}
	// setters for point-system algorithm
	void setTreatmentLocation(String TL){TreatmentLocation = TL;}
	// setters for Treatment Phase: The cancer stage in which the applicant is currently experiencing
		// Phase Treatment 1 and 2 are two available options an applicant can select from the application
	void setPhaseTreatment_1(String PT){phaseTreatment_1=PT;}
	void setPhaseTreatment_2(String PT){phaseTreatment_2=PT;}
	
	// setter for the Applicant Role when applying: Patient, Spouse, Parent, Sibling, Caregiver, Widower, etc
	void setRole(String r){role = r;}
	
	// calculating the age to assign points
	void calulateAge(int NewA, int a){ 
		int age = Math.abs(NewA-a); // Assigning age as a new age where the NewA uses the previous age
		int points;
		if(age <= 5) // If the age difference between matched pairs is less than 5 years, the algorithm assigns the pair 30 points
			points= 30;
		
		else if(age <= 10) // If the age difference between matched pairs is between 6 and 10 years, the algorithm assigns the pair 20 points
			points = 20;
		
		else if(age <= 15) // If the age difference between matched pairs is between 11 and 15 years, the algorithm assigns the pair 10 points
			points =10;
		
		else 				// If the age is out of range above 15 years, assign no points
			points = 0;
		points = getpoints() + points;
		setPoints(points);
	}
	
	// Calculating the point system for the Cancer Type - this is our most important match algorithm
	void calulateCancerType(String newCancerType, String CancerType){
		int points;
		if(newCancerType == CancerType) // If the cancer type between two applicants are a complete match, assign full points: 110
			points = 110;
		else
			points = 0; // If not, assign no points
		points = getpoints() + points; // Total the points from the previous matching algorithms
		setPoints(points);
	}
	
	// Calculating the point system for Gender - participants should be matched based on like-genders
	void calulateGender(char newGender, char Gender){
		int points;
		if(newGender == Gender) // If the gender are the same, assign 20 points. 
			points = 20;
		else 
			points = 0; // If gender do not match, no points assigned.
		points = getpoints() + points;
		setPoints(points);			
	}
	
	// Calculating the point system for matching religion
	void calulateReligion(String newReligion, String Religion){
		int points;	
		if(newReligion == Religion) // Assign 15 points if the religion matches
			points = 15;
		else
			points = 0; // If religion do not match, no points are assigned
		points = getpoints() + points;
		setPoints(points);
	}
	
	// Calculating the point system for where participants receive treatments
	void calulateTreatmentLocation(String newTL, String TL){
		int points;
		if(newTL == TL) // Assign 20 points for applicants who receive treatment from the same location
			points = 20;
		else 
			points = 0; // Assign no points if location do not match
		points = getpoints() + points;
		setPoints(points);
	}
	
	// Phase Treatment is the matching between applicants and the other person already in the system
	void calulatePhaseTreament(String newPT_1, String newPT_2, String PT_1,String PT_2){
		int points;
		// Assign 20 points for applicants who are looking for the same TWO types of treatment phase the other person is in
		if((newPT_1 == PT_1 & newPT_2 == PT_2) || (newPT_1 == PT_2 & newPT_2 == PT_1))
			points = 20; 
		// Assign 10 points for applicants who matched in ONE types of treatment phase the other person is in
		else if(newPT_1 == PT_1 || newPT_1==PT_2 || newPT_2 == PT_2 || newPT_2 == PT_2)
			points = 10;
		else // Assign zero points for those who do not have Phase of Treatment in common
			points = 0;
		points = getpoints() + points;
		setPoints(points);
	}
	
	// Calculating the point system for the role the applicant is looking for in the matched person
	void calulateRole(String newRole, String Role){
		int points;
		if(newRole == Role) // Assign 10 points for matched pairs that share the same role 
			points = 10;
		else
			points = 0;
		points = getpoints() + points;
		setPoints(points);
	}
	
	// Execute all functions and combine points from all categories.
	int runAlgorithm(){
		calulateAge(getNewAge(),getAge());
		calulateCancerType(getNewCancerType(),getCancerType());
		calulateGender(getNewGender(),getGender());
		calulateReligion(getNewReligion(),getReligion());
		calulateTreatmentLocation(getNewTreatementLoctation(),getTreatementLoctation());
		calulatePhaseTreament(getNewphaseTreatment_1(),getNewphaseTreatment_2(),getphaseTreatment_1(),getNewphaseTreatment_2());
		calulateRole(getNewRole(),getRole());
		return getpoints(); // The highest total points is 240 points - which means that both applicants have everything in common.
	}
	
	
}
