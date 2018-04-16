package CancerCant.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import CancerCant.model.UserFeatures;

@Repository
public interface UserFeaturesRepository extends JpaRepository<UserFeatures, Long>{
	
}
