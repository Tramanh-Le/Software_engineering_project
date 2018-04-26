package CancerCant.repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.stereotype.Repository;
import CancerCant.model.user_contact_data;

@Repository
public interface user_contact_data_repository extends JpaRepository<user_contact_data, Long>{
	@Query("SELECT first_name FROM user_contact_data")
	public List<user_contact_data> returnall();
}
