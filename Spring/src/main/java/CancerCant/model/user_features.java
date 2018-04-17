package CancerCant.model;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Table;

@Entity
@Table(name="user_features")
public class user_features {
	//primary key. auto-generated id
	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	@Column(name = "id")
	private long id;
	
	//age, first name, religion
	private int age;
	private String first_name;
	private String religion;
	
	//cancer category, role to cancer
	private String cancer_category;
	private String role_to_cancer;
	
	//distance
	private int distance;

	//treatment stage
	private String treatment_stage;
	
	//gender
	private String gender;
	
	//constructor
	public user_features()
	{
	}

	public int getAge() {
		return age;
	}

	public void setAge(int age) {
		this.age = age;
	}

	public String getFirst_name() {
		return first_name;
	}

	public void setFirst_name(String first_name) {
		this.first_name = first_name;
	}

	public String getReligion() {
		return religion;
	}

	public void setReligion(String religion) {
		this.religion = religion;
	}

	public String getCancer_category() {
		return cancer_category;
	}

	public void setCancer_category(String cancer_category) {
		this.cancer_category = cancer_category;
	}

	public String getRole_to_cancer() {
		return role_to_cancer;
	}

	public void setRole_to_cancer(String role_to_cancer) {
		this.role_to_cancer = role_to_cancer;
	}

	public int getDistance() {
		return distance;
	}

	public void setDistance(int distance) {
		this.distance = distance;
	}

	public String getTreatment_stage() {
		return treatment_stage;
	}

	public void setTreatment_stage(String treatment_stage) {
		this.treatment_stage = treatment_stage;
	}

	public String getGender() {
		return gender;
	}

	public void setGender(String gender) {
		this.gender = gender;
	}

	public long getId() {
		return id;
	}
	//getters and setters
	
}
