package CancerCant.model;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Table;

@Entity
@Table(name = "user_non_algorithm_data")
public class user_non_algorithm_data {
	//primary key. auto-generated id
	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	@Column(name = "id")
	private long id;
	
	//foreign key.
	private long user_contact_data_id;
	
	//misc
	private String misc_about_data;
	
	//first and last names
	private String first_name;
	private String last_name;
	
	//?
	private String looking_to_get_program;
	
	//constructor
	public user_non_algorithm_data()
	{
	}

	//setters and getters
	public long getUser_contact_data_id() {
		return user_contact_data_id;
	}

	public void setUser_contact_data_id(long user_contact_data_id) {
		this.user_contact_data_id = user_contact_data_id;
	}

	public String getMisc_about_data() {
		return misc_about_data;
	}

	public void setMisc_about_data(String misc_about_data) {
		this.misc_about_data = misc_about_data;
	}

	public String getFirst_name() {
		return first_name;
	}

	public void setFirst_name(String first_name) {
		this.first_name = first_name;
	}

	public String getLast_name() {
		return last_name;
	}

	public void setLast_name(String last_name) {
		this.last_name = last_name;
	}

	public String getLooking_to_get_program() {
		return looking_to_get_program;
	}

	public void setLooking_to_get_program(String looking_to_get_program) {
		this.looking_to_get_program = looking_to_get_program;
	}

	public long getId() {
		return id;
	}
	

}
