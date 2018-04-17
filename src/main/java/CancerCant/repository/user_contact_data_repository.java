package CancerCant.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;
import CancerCant.model.user_contact_data;

@Repository
public interface user_contact_data_repository extends JpaRepository<user_contact_data, Long>{
	
}
