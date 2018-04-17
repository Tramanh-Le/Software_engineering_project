package CancerCant.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import CancerCant.model.user_non_algorithm_data;

@Repository
public interface user_non_algorithm_data_repository extends JpaRepository<user_non_algorithm_data, Long>{
	
}
