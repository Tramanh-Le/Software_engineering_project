package CancerCant.controller;

import java.util.ArrayList;
import java.util.List;

import javax.sql.DataSource;
import javax.validation.Valid;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.Bean;
import org.springframework.jdbc.datasource.embedded.EmbeddedDatabaseBuilder;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import CancerCant.model.user_contact_data;
import CancerCant.repository.user_contact_data_repository;
@RestController
@RequestMapping("/UserContactData")
public class user_contact_data_controller {

	@Autowired
	user_contact_data_repository userContactDataRepo; 

	//get all users
	@GetMapping("/allUsers")
	public List<user_contact_data> getAllUserContactData()
	{
		return userContactDataRepo.findAll();
	}
	
	//create new user
	@PostMapping("/createUser")
	public user_contact_data createUserContactData(@Valid @RequestBody user_contact_data user)
	{
		return userContactDataRepo.save(user);
	}
	
	@GetMapping("/test")
	public List<user_contact_data> returnAllUser(){
		return userContactDataRepo.returnall();
	}
	//TODO: implement other relevant controllers. potentially involves coding more on repository
}
