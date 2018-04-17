package CancerCant.controller;

import java.util.List;

import javax.validation.Valid;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import CancerCant.model.user_features;
import CancerCant.repository.user_features_repository;

@RestController
@RequestMapping("/UserFeatures")
public class user_features_controller {

	@Autowired
	user_features_repository userFeaturesRepo; 
	
	//get all users
	@GetMapping("/allUsers")
	public List<user_features> getAllUserFeaturesData()
	{
		return userFeaturesRepo.findAll();
	}
	
	//create new user
	@PostMapping("/createUser")
	public user_features createUserContactData(@Valid @RequestBody user_features user)
	{
		return userFeaturesRepo.save(user);
	}
	
	//TODO: implement other relevant controllers. potentially involves coding more on repository
}