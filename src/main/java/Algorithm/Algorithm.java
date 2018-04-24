package Algorithm;
import java.util.ArrayList;
import java.util.List;

import CancerCant.controller.*;
import CancerCant.model.user_contact_data;
import CancerCant.model.user_contact_data;
import CancerCant.repository.user_contact_data_repository;

public class Algorithm {
	//new users information
	public Algorithm(){
		
	}
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
	
	public void testing(){
		List<user_features_controller> list = new ArrayList<user_features_controller>();
		user_contact_data_controller user = new user_contact_data_controller();
		user.getAllUserContactData();
		
		for(int i = 0; i < list.size(); i++){
			System.out.println(user.getAllUserContactData().get(i));
		}
	}
	
}
