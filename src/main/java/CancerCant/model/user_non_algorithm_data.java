package CancerCant.model;

import javax.persistence.CascadeType;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.OneToOne;
import javax.persistence.Table;

@Entity
@Table(name = "non_algorithm_user_data")
public class user_non_algorithm_data {
	//primary key. auto-generated id
	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	@Column(name = "ID")
	private long id;
	
	//foreign key.
	@OneToOne
	@JoinColumn(name="id")
	private user_contact_data userContactData;
	
	
	//first and last names
	private String first_name;
	private String last_name;
	
	
	//constructor
	public user_non_algorithm_data()
	{
	}

	//setters and getters
	
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

	public long getId() {
		return id;
	}

	

}
