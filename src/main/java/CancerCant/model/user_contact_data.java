package CancerCant.model;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Table;

@Entity
@Table(name="user_contact_data")
public class user_contact_data {
		//primary key. auto-generated id
		@Id
		@GeneratedValue(strategy = GenerationType.IDENTITY)
		@Column(name = "id")
		private long id;
		
		//first and last name
		private String first_name;
		private String last_name;
		
		//other personal details
		private String city;
		private String state;
		private String phone;
		private String email;
		
		//has the person been matched yet?
		private boolean matched_flag;

		//constructor
		public user_contact_data()
		{
		}

		//getters and setters
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

		public String getCity() {
			return city;
		}

		public void setCity(String city) {
			this.city = city;
		}

		public String getState() {
			return state;
		}

		public void setState(String state) {
			this.state = state;
		}

		public String getPhone() {
			return phone;
		}

		public void setPhone(String phone) {
			this.phone = phone;
		}

		public String getEmail() {
			return email;
		}

		public void setEmail(String email) {
			this.email = email;
		}

		public boolean isMatched_flag() {
			return matched_flag;
		}

		public void setMatched_flag(boolean matched_flag) {
			this.matched_flag = matched_flag;
		}

		public long getId() {
			return id;
		}
		
		
}
