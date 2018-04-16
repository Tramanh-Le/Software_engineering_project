package CancerCant.controller;

import java.util.List;
import java.util.Optional;

import javax.validation.Valid;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import CancerCant.model.UserFeatures;
import CancerCant.repository.UserFeaturesRepository;

@RestController
@RequestMapping("/UserFeatures")
public class UserFeaturesController {
	
	@Autowired
	UserFeaturesRepository userRepository;
	
	//get all user
	@GetMapping("/allUsers")
	public List<UserFeatures> getAllUserFeatures()
	{
		return userRepository.findAll();
	}
	
	//create a new user
	@PostMapping("/createUser")
	public UserFeatures createUserFeatures(@Valid @RequestBody UserFeatures user)
	{
		return userRepository.save(user);
	}
	
	//get a specific user
	@GetMapping("/getUser/{id}")
	public UserFeatures getUserFeatures(@PathVariable(value="id") Long id)
	{
		return userRepository.findById(id).get();
	}
	
	//update a user
	@PutMapping("/updateUser/{id}")
	public UserFeatures updateUser(@PathVariable(value="id") Long id, @Valid @RequestBody UserFeatures userDetails)
	{
		Optional<UserFeatures> user = userRepository.findById(id);
		user.get().setAge(userDetails.getAge());
		user.get().setFirstName(userDetails.getFirstName());
		return user.get();
	}
	//delete a user
	@DeleteMapping("/user/delete/{id}")
	public ResponseEntity<?> deleteUserFeatures(@PathVariable(value = "id") Long id) {
		Optional<UserFeatures> user = userRepository.findById(id);

		userRepository.delete(user.get());

	    return ResponseEntity.ok().build();
	}
}
