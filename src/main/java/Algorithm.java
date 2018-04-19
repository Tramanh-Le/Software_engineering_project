import CancerCant.controller.*;


public class Algorithm {
	//new users information
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
	String getCancerType(){return cancerType;}
	int getAge(){return age;}
	char getGender(){return gender;}
	String getReligion(){return religion;}
	String getTreatementLoctation(){return TreatmentLocation;}
	String getphaseTreatment_1(){return phaseTreatment_1;}
	String getphaseTreatment_2(){return phaseTreatment_2;}
	String getRole(){return role;}
	int getpoints(){return points;}
	
	// setters for all variables in the class
	void setCancerType(String c){cancerType =c;}
	void setAge(int a){age = a;}
	void setGender(char g){gender = g;}
	void setReligion(String r){religion = r;}
	void setTreatmentLocation(String TL){TreatmentLocation = TL;}
	void setPhaseTreatment_1(String PT){phaseTreatment_1=PT;}
	void setPhaseTreatment_2(String PT){phaseTreatment_2=PT;}
	void setRole(String r){role = r;}
	void setPoints(int p){points = p;}
	
	
}
