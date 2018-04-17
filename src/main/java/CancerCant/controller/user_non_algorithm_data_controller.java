package CancerCant.controller;

import java.util.List;

import javax.validation.Valid;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import CancerCant.model.user_non_algorithm_data;
import CancerCant.repository.user_non_algorithm_data_repository;

@RestController
@RequestMapping("/UserNonAlgorithm")
public class user_non_algorithm_data_controller {

	@Autowired
	user_non_algorithm_data_repository userNonAlgoRepo; 
	
	//get all users
	@GetMapping("/allUsers")
	public List<user_non_algorithm_data> getAllUserFeaturesData()
	{
		return userNonAlgoRepo.findAll();
	}
	
	//create new user
	@PostMapping("/createUser")
	public user_non_algorithm_data createUserContactData(@Valid @RequestBody user_non_algorithm_data user)
	{
		return userNonAlgoRepo.save(user);
	}
	
	//TODO: implement other relevant controllers. potentially involves coding more on repository
}
