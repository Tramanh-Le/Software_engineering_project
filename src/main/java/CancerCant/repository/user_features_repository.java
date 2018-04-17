package CancerCant.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import CancerCant.model.user_features;

@Repository
public interface user_features_repository extends JpaRepository<user_features, Long>{
	
}
